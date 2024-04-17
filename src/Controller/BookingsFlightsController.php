<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * BookingsFlights Controller
 *
 * @property \App\Model\Table\BookingsFlightsTable $BookingsFlights
 */
class BookingsFlightsController extends AppController
{


    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Authentication.Authentication');
        $this->Authentication->allowUnauthenticated(['index']);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->BookingsFlights->find()
            ->contain(['Bookings', 'Flights']);
        $bookingsFlights = $this->paginate($query);

        $this->set(compact('bookingsFlights'));
    }

    /**
     * View method
     *
     * @param string|null $id Bookings Flight id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bookingsFlight = $this->BookingsFlights->get($id, contain: ['Bookings', 'Flights']);
        $this->set(compact('bookingsFlight'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bookingsFlight = $this->BookingsFlights->newEmptyEntity();
        if ($this->request->is('post')) {
            $bookingsFlight = $this->BookingsFlights->patchEntity($bookingsFlight, $this->request->getData());
            if ($this->BookingsFlights->save($bookingsFlight)) {
                $this->Flash->success(__('The bookings flight has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bookings flight could not be saved. Please, try again.'));
        }
        $bookings = $this->BookingsFlights->Bookings->find('list', limit: 200)->all();
        $flights = $this->BookingsFlights->Flights->find('list', limit: 200)->all();
        $this->set(compact('bookingsFlight', 'bookings', 'flights'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Bookings Flight id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bookingsFlight = $this->BookingsFlights->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bookingsFlight = $this->BookingsFlights->patchEntity($bookingsFlight, $this->request->getData());
            if ($this->BookingsFlights->save($bookingsFlight)) {
                $this->Flash->success(__('The bookings flight has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bookings flight could not be saved. Please, try again.'));
        }
        $bookings = $this->BookingsFlights->Bookings->find('list', limit: 200)->all();
        $flights = $this->BookingsFlights->Flights->find('list', limit: 200)->all();
        $this->set(compact('bookingsFlight', 'bookings', 'flights'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Bookings Flight id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bookingsFlight = $this->BookingsFlights->get($id);
        if ($this->BookingsFlights->delete($bookingsFlight)) {
            $this->Flash->success(__('The bookings flight has been deleted.'));
        } else {
            $this->Flash->error(__('The bookings flight could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
