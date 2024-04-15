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
        $query = $this->Bookings->find()
            ->contain(['Users', 'Payments', 'Insurances', 'Hotels', 'CarRentals', 'Translations']);
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
}
