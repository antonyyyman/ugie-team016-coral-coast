<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Mailer\Mailer;

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
            $query = $query->where(["Bookings.user_id"=>$user->id]);
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

        //auto-calculating price for each booking
        // so the price set for each booking in database becomes rubbish
        $total_price = 0;
        $flights_price = 0;
        $translation_price = 0;
        $insurance_price = 0;
        $hotel_price = 0;

        $flights = $bookings->flights;

        $this->set(compact('bookings'));
        $this->viewBuilder()->setLayout("defaultadmin");
    }

    /**
     * View method
     *
     * @param string|null $id Booking id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $booking = $this->Bookings->get($id, contain: ['Users', 'Payments', 'Insurances', 'Hotels', 'CarRentals', 'Translations', 'Flights']);
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

            foreach (['hotel_id', 'car_rental_id', 'insurance_id', 'translation_id', 'payment_id', 'travel_deal_id'] as $field) {
                if (empty($data[$field])) {
                    $data[$field] = null;
                }
            }

            $booking = $this->Bookings->patchEntity($booking, $this->request->getData());
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
        $flights = $this->Bookings->Flights->find('list', limit: 200)->all();
        $this->set(compact('booking', 'users', 'payments', 'insurances', 'hotels', 'carRentals', 'translations', 'flights'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Booking id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $booking = $this->Bookings->get($id, contain: ['Flights']);
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
        $flights = $this->Bookings->Flights->find('list', limit: 200)->all();
        $this->set(compact('booking', 'users', 'payments', 'insurances', 'hotels', 'carRentals', 'translations', 'flights'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Booking id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $booking = $this->Bookings->get($id);
        if ($this->Bookings->delete($booking)) {
            $this->Flash->success(__('The booking has been deleted.'));
        } else {
            $this->Flash->error(__('The booking could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function cancel($id = null)
    {
        $this->request->allowMethod(['post', 'get']); // 允许GET来显示表单，POST用于处理表单提交

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
                $cancelLimit = new \DateTime($booking->start_date->format('Y-m-d'));
                $cancelLimit->modify('-2 weeks');
                if (new \DateTime() < $cancelLimit) {
                    $booking->booking_status = false;
                    if ($this->Bookings->save($booking)) {
                        $mailer = new Mailer('default');
                        $mailer->setTo($booking->user->email)
                            ->setSubject('Booking Cancellation Notice')
                            ->setEmailFormat('text')
                            ->deliver("Your booking on " . $booking->start_date->format('Y-m-d') . " has been cancelled. Reason: " . $actualReason);

                        $this->Flash->success(__('Your booking has been cancelled.'));
                        return $this->redirect(['action' => 'index']);
                    } else {
                        $this->Flash->error(__('Unable to cancel your booking.'));
                    }
                } else {
                    $this->Flash->error(__('Bookings can only be cancelled up to 2 weeks in advance.'));
                }
            } else {
                $this->Flash->error(__('Cannot cancel the booking as the start date is missing.'));
            }
        } else {
            // GET 请求时，渲染表单
            $this->set(compact('booking'));
            $this->set('_serialize', ['booking']);
        }
    }


}
