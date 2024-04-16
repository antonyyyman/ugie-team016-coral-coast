<?php
declare(strict_types=1);

namespace App\Controller;

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
        $query = $this->Bookings->find();
//            ->contain(['Users', 'Hotels', 'CarRentals', 'Insurances', 'Translations', 'Payments', 'TravelDeals']);

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
                    ->where(['Bookings.user_id' => $user->id]);
            } else {
                // if the user does not exist, return an empty result set
                $query = $this->Bookings->find()->where(['Bookings.id' => 0]);
            }
        }


        $bookings = $this->paginate($query);

        $this->set(compact('bookings'));
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
        $booking = $this->Bookings->get($id, contain: ['Users', 'Insurances', 'Hotels', 'CarRentals', 'Translations', 'Flights', 'Payments']);
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
                $this->Flash->success(__('The booking has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The booking could not be saved. Please, try again.'));
        }
        $users = $this->Bookings->Users->find('list', limit: 200)->all();
        $insurances = $this->Bookings->Insurances->find('list', limit: 200)->all();
        $hotels = $this->Bookings->Hotels->find('list', limit: 200)->all();
        $carRentals = $this->Bookings->CarRentals->find('list', limit: 200)->all();
        $translations = $this->Bookings->Translations->find('list', limit: 200)->all();
        $flights = $this->Bookings->Flights->find('list', limit: 200)->all();
        $this->set(compact('booking', 'users', 'insurances', 'hotels', 'carRentals', 'translations', 'flights'));
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
        $booking = $this->Bookings->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $booking = $this->Bookings->patchEntity($booking, $this->request->getData());
            if ($this->Bookings->save($booking)) {
                $this->Flash->success(__('The booking has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The booking could not be saved. Please, try again.'));
        }
        $users = $this->Bookings->Users->find('list', limit: 200)->all();
        $insurances = $this->Bookings->Insurances->find('list', limit: 200)->all();
        $hotels = $this->Bookings->Hotels->find('list', limit: 200)->all();
        $carRentals = $this->Bookings->CarRentals->find('list', limit: 200)->all();
        $translations = $this->Bookings->Translations->find('list', limit: 200)->all();
        $flights = $this->Bookings->Flights->find('list', limit: 200)->all();
        $this->set(compact('booking', 'users', 'insurances', 'hotels', 'carRentals', 'translations', 'flights'));
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
}
