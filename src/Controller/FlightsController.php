<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Flights Controller
 *
 * @property \App\Model\Table\FlightsTable $Flights
 */
class FlightsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Authentication.Authentication');
        $this->Authentication->allowUnauthenticated(['index']);
    }


    public function index()
    {
        $search = $this->request->getQueryParams();
        $query = $this->Flights->find();

        if (isset($search['arrival_airport']) &&!empty($search['arrival_airport'])) {
            $query->where(['Flights.arrival_airport' => $search['arrival_airport']]);
        }

        if (isset($search['Flights']['departure_date']) &&!empty($search['Flights']['departure_date'])) {
            $query->where(['Flights.departure_date' => $search['Flights']['departure_date']]);
        }

        $flights = $this->paginate($query);

        $this->set(compact('flights'));
    }



    /**
     * View method
     *
     * @param string|null $id Flight id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $flight = $this->Flights->get($id, contain: ['Bookings', 'TravelDeals']);
        $this->set(compact('flight'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $flight = $this->Flights->newEmptyEntity();
        if ($this->request->is('post')) {
            $flight = $this->Flights->patchEntity($flight, $this->request->getData());
            if ($this->Flights->save($flight)) {
                $this->Flash->success(__('The flight has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The flight could not be saved. Please, try again.'));
        }
        $bookings = $this->Flights->Bookings->find('list', limit: 200)->all();
        $this->set(compact('flight', 'bookings'));
        $this->viewBuilder()->setLayout('defaultadmin');
    }

    /**
     * Edit method
     *
     * @param string|null $id Flight id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $flight = $this->Flights->get($id, contain: ['Bookings']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $flight = $this->Flights->patchEntity($flight, $this->request->getData());
            if ($this->Flights->save($flight)) {
                $this->Flash->success(__('The flight has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The flight could not be saved. Please, try again.'));
        }
        $bookings = $this->Flights->Bookings->find('list', limit: 200)->all();
        $this->set(compact('flight', 'bookings'));
        $this->viewBuilder()->setLayout('defaultadmin');
    }

    /**
     * Delete method
     *
     * @param string|null $id Flight id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $flight = $this->Flights->get($id);
        if ($this->Flights->delete($flight)) {
            $this->Flash->success(__('The flight has been deleted.'));
        } else {
            $this->Flash->error(__('The flight could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
        $this->viewBuilder()->setLayout('defaultadmin');
    }
}
