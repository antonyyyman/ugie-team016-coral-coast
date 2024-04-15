<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * FlightTravelDeals Controller
 *
 * @property \App\Model\Table\FlightTravelDealsTable $FlightTravelDeals
 */
class FlightTravelDealsController extends AppController
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
         $this->Authentication->allowUnauthenticated(['add']);
     }
    public function index()
    {
        $query = $this->FlightTravelDeals->find()
            ->contain(['Flights', 'TravelDeals']);
        $flightTravelDeals = $this->paginate($query);

        $this->set(compact('flightTravelDeals'));
    }

    /**
     * View method
     *
     * @param string|null $id Flight Travel Deal id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $flightTravelDeal = $this->FlightTravelDeals->get($id, contain: ['Flights', 'TravelDeals']);
        $this->set(compact('flightTravelDeal'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $flightTravelDeal = $this->FlightTravelDeals->newEmptyEntity();
        if ($this->request->is('post')) {
            $flightTravelDeal = $this->FlightTravelDeals->patchEntity($flightTravelDeal, $this->request->getData());
            if ($this->FlightTravelDeals->save($flightTravelDeal)) {
                $this->Flash->success(__('The flight travel deal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The flight travel deal could not be saved. Please, try again.'));
        }
        $flights = $this->FlightTravelDeals->Flights->find('list', limit: 200)->all();
        $travelDeals = $this->FlightTravelDeals->TravelDeals->find('list', limit: 200)->all();
        $this->set(compact('flightTravelDeal', 'flights', 'travelDeals'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Flight Travel Deal id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $flightTravelDeal = $this->FlightTravelDeals->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $flightTravelDeal = $this->FlightTravelDeals->patchEntity($flightTravelDeal, $this->request->getData());
            if ($this->FlightTravelDeals->save($flightTravelDeal)) {
                $this->Flash->success(__('The flight travel deal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The flight travel deal could not be saved. Please, try again.'));
        }
        $flights = $this->FlightTravelDeals->Flights->find('list', limit: 200)->all();
        $travelDeals = $this->FlightTravelDeals->TravelDeals->find('list', limit: 200)->all();
        $this->set(compact('flightTravelDeal', 'flights', 'travelDeals'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Flight Travel Deal id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $flightTravelDeal = $this->FlightTravelDeals->get($id);
        if ($this->FlightTravelDeals->delete($flightTravelDeal)) {
            $this->Flash->success(__('The flight travel deal has been deleted.'));
        } else {
            $this->Flash->error(__('The flight travel deal could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
