<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Mailer\Mailer;
use DateTime;

/**
 * Bookings Controller
 *
 * @property \App\Model\Table\BookingsTable $Bookings
 */
class BookingsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $result = $this->Authentication->getResult();

        $user = $result->getData();
        $is_staff = $user->is_staff;

        $query = $this->Bookings->find()
            ->contain(['Users', 'Hotels', 'CarRentals', 'Insurances', 'Translations', 'Payments', 'Flights', 'TravelDeals']);

        if (!$is_staff) {
            $query = $query->where(['Bookings.user_id' => $user->id]);
        }

        if (!empty($this->request->getQuery('id'))) {
//            $query->where(['Bookings.id LIKE' => '%' . $this->request->getQuery('id') . '%']);
            $id = $this->request->getQuery('id');
            $query->where(['Bookings.id' => $id]);
        }
        //retrive username from user refered by user_id in $this
        if (!empty($this->request->getQuery('username'))) {
            $userName = $this->request->getQuery('username');
            $usersTable = $this->fetchTable('Users');
            $user = $usersTable->find()
                ->select(['id'])
                ->where(['Users.username LIKE' => '%' . $userName . '%'])
                ->first();

            if ($user) {
                // query the Bookings table according to user id
                $bookingsTable = $this->fetchTable('Bookings');
                $query = $bookingsTable->find()
                    ->contain(['Users', 'Hotels', 'CarRentals', 'Insurances', 'Translations', 'Payments', 'TravelDeals', 'Flights'])
                    ->where(['Bookings.user_id' => $user->id]);
            } else {
                // if the user does not exist, return an empty result set
                $query = $this->Bookings->find()->where(['Bookings.id' => 0]);
            }
        }

        $bookings = $this->paginate($query);

        // ********** auto-calculating price for each booking **********
        // so the price set for each booking in database becomes rubbish
        foreach ($bookings as $booking) {
            $total_price = 0;
            $flights_price = 0;
            $translation_price = 0;
            $insurance_price = 0;
            $car_rental_price = 0;
            $hotel_price = 0;

//            debug($booking);
//            exit;
            $flights = $booking->flights;
            if ($flights && count($flights)) {
                foreach ($flights as $flight) {
                    $flights_price = $flights_price + $flight->price;
                }
            }
            if (!empty($booking->translation)) {
                $translation_price = $booking->translation->price;
            }
            if (!empty($booking->insurance)) {
                $insurance_price = $booking->insurance->price;
            }
            if (!empty($booking->car_rental)) {
                $car_rental_price = $booking->car_rental->price;
            }
            if (!empty($booking->hotel)) {
                $hotel_price = $booking->hotel->price;
            }
            $total_price = $flights_price + $translation_price + $insurance_price + $car_rental_price + $hotel_price;
            $booking->total_price = $total_price;
        }
        // ********** auto-calculating price for each booking **********

        $this->set(compact('bookings'));
        $this->viewBuilder()->setLayout('defaultadmin');

        //for removing booking search by username function
        $this->set('is_staff', $is_staff);
    }

    /**
     * View method
     *
     * @param string|null $id Booking id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view(?string $id = null)
    {
        $booking = $this->Bookings->get($id, contain: ['Users', 'Payments', 'Insurances', 'Hotels', 'CarRentals', 'Translations', 'Flights']);

        // ********** auto-calculating price for each booking **********
        // so the price set for each booking in database becomes rubbish
//        foreach ($bookings as $booking) {
        $total_price = 0;
        $flights_price = 0;
        $translation_price = 0;
        $insurance_price = 0;
        $car_rental_price = 0;
        $hotel_price = 0;

//            debug($booking);
//            exit;
        $flights = $booking->flights;
        if ($flights && count($flights)) {
            foreach ($flights as $flight) {
                $flights_price = $flights_price + $flight->price;
            }
        }
        if (!empty($booking->translation)) {
            $translation_price = $booking->translation->price;
        }
        if (!empty($booking->insurance)) {
            $insurance_price = $booking->insurance->price;
        }
        if (!empty($booking->car_rental)) {
            $car_rental_price = $booking->car_rental->price;
        }
        if (!empty($booking->hotel)) {
            $hotel_price = $booking->hotel->price;
        }
        $total_price = $flights_price + $translation_price + $insurance_price + $car_rental_price + $hotel_price;
        $booking->total_price = $total_price;
//        }
        // ********** auto-calculating price for each booking **********


        $this->set(compact('booking'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $booking = $this->Bookings->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();

            $unpaid_status = 'unpaid';

            foreach (['hotel_id', 'car_rental_id', 'insurance_id', 'translation_id', 'payment_id', 'travel_deal_id', 'travel_deal_id'] as $field) {
                if (empty($data[$field])) {
                    $data[$field] = null;
                }
//                if ($field == 'payment_id')
            }

            $booking = $this->Bookings->patchEntity($booking, $this->request->getData(), [
                'associated' => ['Flights']
            ]);
            if ($this->Bookings->save($booking)) {
                $this->Flash->success(__('The booking has been saved. Reference: ' . $booking->id));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The booking could not be saved. Please, try again.'));
        }
        $users = $this->Bookings->Users->find('list', limit: 200)->all();
        $payments = $this->Bookings->Payments->find('list', limit: 200)->all();
        $insurances = $this->Bookings->Insurances->find('list', limit: 200)->all();
        $hotels = $this->Bookings->Hotels->find('list', limit: 200)->all();
        $carRentals = $this->Bookings->CarRentals->find('list', limit: 200)->all();
        $translations = $this->Bookings->Translations->find('list', limit: 200)->all();
        $travelDeals = $this->Bookings->TravelDeals->find('list', limit: 200)->all();

//        $flights = $this->Bookings->Flights->find('list', limit: 200)->all();
        $flights = [];
//        debug($this->Bookings->Flights->find()->all());
//        exit;
        foreach ($this->Bookings->Flights->find()->all() as $flight) {
            $flights[$flight->id] = $flight->number;
        }

        $this->set(compact('booking', 'users', 'payments', 'insurances', 'hotels', 'carRentals', 'translations', 'flights', 'travelDeals'));

        //get user id
//        $user_id = $this->Bookings->get($user_id);
        $result = $this->Authentication->getResult();
        $user = $result->getData();
        $user_id = $user->id;

//        debug ($user_id);
//        exit;
        $this->set('user_id', $user_id);

    }

    /**
     * Edit method
     *
     * @param string|null $id Booking id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit(?string $id = null)
    {
        $booking = $this->Bookings->get($id, contain: ['Users', 'Hotels', 'CarRentals', 'Insurances', 'Translations', 'Payments', 'Flights', 'TravelDeals']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $booking = $this->Bookings->patchEntity($booking, $this->request->getData());
            if ($this->Bookings->save($booking)) {
                $this->Flash->success(__('The booking has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The booking could not be saved. Please, try again.'));
        }
        $users = $this->Bookings->Users->find('list', limit: 200)->all();
        $payments = $this->Bookings->Payments->find('list', limit: 200)->all();
        $insurances = $this->Bookings->Insurances->find('list', limit: 200)->all();
        $hotels = $this->Bookings->Hotels->find('list', limit: 200)->all();
        $carRentals = $this->Bookings->CarRentals->find('list', limit: 200)->all();
        $translations = $this->Bookings->Translations->find('list', limit: 200)->all();
        $travelDeals = $this->Bookings->TravelDeals->find('list', limit: 200)->all();
        $flights_pnt_detail = [];
//        debug($this->Bookings->Flights->find()->all());
//        exit;
        foreach ($this->Bookings->Flights->find()->all() as $flight) {
            $flights_pnt_detail[$flight->id] = $flight->number;
        }
        $this->set('flight_pnt_detail', $flights_pnt_detail);

        // ********** auto-calculating price for each booking **********
        // so the price set for each booking in database becomes rubbish
//        foreach ($bookings as $booking) {
        $total_price = 0;
        $flights_price = 0;
        $translation_price = 0;
        $insurance_price = 0;
        $car_rental_price = 0;
        $hotel_price = 0;

//            debug($booking);
//            exit;
        $flights = $booking->flights;
        if ($flights && count($flights)) {
            foreach ($flights as $flight) {
                $flights_price = $flights_price + $flight->price;
            }
        }
        if (!empty($booking->translation)) {
            $translation_price = $booking->translation->price;
        }
        if (!empty($booking->insurance)) {
            $insurance_price = $booking->insurance->price;
        }
        if (!empty($booking->car_rental)) {
            $car_rental_price = $booking->car_rental->price;
        }
        if (!empty($booking->hotel)) {
            $hotel_price = $booking->hotel->price;
        }
        $total_price = $flights_price + $translation_price + $insurance_price + $car_rental_price + $hotel_price;
        $booking->total_price = $total_price;
//        }
        // ********** auto-calculating price for each booking **********

        $this->set(compact('booking', 'users', 'payments', 'insurances', 'hotels', 'carRentals', 'translations', 'flights', 'travelDeals'));


        //get user id
//        $user_id = $this->Bookings->get($user_id);
        $result = $this->Authentication->getResult();
        $user = $result->getData();
        $user_id = $user->id;
//        debug ($user_id);
//        exit;
        $this->set('user_id', $user_id);

    }

    /**
     * Delete method
     *
     * @param string|null $id Booking id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete(?string $id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $booking = $this->Bookings->get($id);
        if ($this->Bookings->delete($booking)) {
            $this->Flash->success(__('The booking has been deleted.'));
        } else {
            $this->Flash->error(__('The booking could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
        $this->viewBuilder()->setLayout("defaultadmin");
    }

    public function cancel($id = null)
    {
        $this->request->allowMethod(['post', 'get']);

//        $booking = $this->Bookings->get($id, [
//            'contain' => ['Users'],
//            'fields' => ['id', 'start_date', 'Users.email', 'booking_status']
//        ]);
        $booking = $this->Bookings->get($id, contain: ['Users'], fields: ['id', 'start_date', 'Users.email', 'booking_status']);

        if ($this->request->is('post')) {
            $cancelReason = $this->request->getData('cancel_reason');
            $customReason = $this->request->getData('custom_reason');
            $actualReason = $cancelReason === 'Others' ? $customReason : $cancelReason;

            if ($booking->start_date) {
                $cancelLimit = new DateTime($booking->start_date->format('Y-m-d'));
                $cancelLimit->modify('-2 weeks');
                if (new DateTime() < $cancelLimit) {
                    $booking->booking_status = false;
                    if ($this->Bookings->save($booking)) {
                        $mailer = new Mailer('default');
                        $mailer->setTo($booking->user->email)
                            ->setSubject('Booking Cancellation Notice')
                            ->setEmailFormat('text')
                            ->deliver('Your booking on ' . $booking->start_date->format('Y-m-d') . ' has been cancelled. Reason: ' . $actualReason);

                        $this->Flash->success(__('Your booking has been cancelled.'));

                        return $this->redirect(['action' => 'index']);
                    } else {
                        $this->Flash->error(__('Unable to cancel your booking.'));
                        return $this->redirect(['action' => 'index']);
                    }
                } else {
                    $this->Flash->error(__('Bookings can only be cancelled up to 2 weeks in advance.'));
                    return $this->redirect(['action' => 'index']);
                }
            } else {
                $this->Flash->error(__('Cannot cancel the booking as the start date is missing.'));
                return $this->redirect(['action' => 'index']);
            }
        } else {

            $this->set(compact('booking'));
            $this->set('_serialize', ['booking']);
        }
        $this->viewBuilder()->setLayout("defaultadmin");
    }

    /**
     * PaymentView method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function paymentview($id = null)
    {
        // display all the information
        // the same as above
        $booking = $this->Bookings->get($id, contain: ['Users', 'Payments', 'Insurances', 'Hotels', 'CarRentals', 'Translations', 'Flights']);
        $total_price = 0;
        $flights_price = 0;
        $translation_price = 0;
        $insurance_price = 0;
        $car_rental_price = 0;
        $hotel_price = 0;

        $flights = $booking->flights;
        if ($flights && count($flights)) {
            foreach ($flights as $flight) {
                $flights_price = $flights_price + $flight->price;
            }
        }
        if (!empty($booking->translation)) {
            $translation_price = $booking->translation->price;
        }
        if (!empty($booking->insurance)) {
            $insurance_price = $booking->insurance->price;
        }
        if (!empty($booking->car_rental)) {
            $car_rental_price = $booking->car_rental->price;
        }
        if (!empty($booking->hotel)) {
            $hotel_price = $booking->hotel->price;
        }

        $total_price = $flights_price + $translation_price + $insurance_price + $car_rental_price + $hotel_price;
        $booking->total_price = $total_price;
//        $this->set(compact('booking'));
        //all the information displayed

        //******* start to create a payment record, and store its id into bookings.payment_id
        $payment = $this->Bookings->Payments->newEmptyEntity();
        $payment->amount = $total_price;
        $payment->status = 'unpaid';
//        $payment->payment_method = 'Credit Card';

        $paymentMethods = [
            'credit_card' => 'Credit Card',
            'paypal' => 'PayPal',
            'bank_transfer' => 'Bank Transfer'
        ];


        if ($this->Bookings->Payments->save($payment)) {
            $booking->payment_id = $payment->id;
            if ($this->Bookings->save($booking)) {
//                $this->Flash->success('Payment record created and booking updated successfully.');
            } else {
                $this->Flash->error('Failed to update booking.');
            }
        } else {
            $this->Flash->error('Failed to create payment record.');
        }
        //ready for change payment status

        $this->set(compact('booking'));
        $this->set('payment', $payment);
        $this->set('paymentMethods', $paymentMethods);
    }

    //change bookingpayment status from unpaid to paid action
    public function changestatus($bookingId)
    {
        $booking = $this->Bookings->get($bookingId, [
            'contain' => ['Payments']
        ]);

//        debug($booking);
//        exit;

        if (!$booking) {
            $this->Flash->error('Booking not found.');
            return $this->redirect(['action' => 'index']);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $payment = $booking->payment;//real entity
            $paymentMethod = $this->request->getData('payment_method');

//            debug($this);

            // Update payment method if provided
            if ($paymentMethod) {
                $payment->payment_method = $paymentMethod;
            }

//            debug($payment);
//            debug($paymentMethod);
//            exit;
            // Check if payment is unpaid and update status
            if ($payment && $payment->status == 'unpaid') {
                $payment->status = 'paid';

                if ($this->Bookings->Payments->save($payment)) {
                    $this->Flash->success('Payment updated successfully. Pay ID: ' . $payment->id);
                } else {
                    $this->Flash->error('Failed to update payment.');
                }
            } else {
                if ($payment) {
                    $this->Flash->error('Payment is already paid or not available.');
                } else {
                    $this->Flash->error('No payment associated with this booking.');
                }
            }
        }

        return $this->redirect(['action' => 'index', $bookingId]);
    }


}
