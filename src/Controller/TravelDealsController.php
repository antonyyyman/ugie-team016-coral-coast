<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * TravelDeals Controller
 *
 * @property \App\Model\Table\TravelDealsTable $TravelDeals
 */
class TravelDealsController extends AppController
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
        $query = $this->TravelDeals->find()
            ->contain(['Insurances', 'Hotels', 'CarRentals', 'Translations', 'Flights', 'Cruises']);
        $travelDeals = $this->paginate($query);

        $this->set(compact('travelDeals'));
    }

    /**
     * View method
     *
     * @param string|null $id Travel Deal id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $travelDeal = $this->TravelDeals->get($id, contain: ['Insurances', 'Hotels', 'CarRentals', 'Translations', 'Flights', 'Cruises']);
        $this->set(compact('travelDeal'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $travelDeal = $this->TravelDeals->newEmptyEntity();
        if ($this->request->is('post')) {
            $travelDeal = $this->TravelDeals->patchEntity($travelDeal, $this->request->getData());
            if ($this->TravelDeals->save($travelDeal)) {
                $this->Flash->success(__('The travel deal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The travel deal could not be saved. Please, try again.'));
        }
        $insurances = $this->TravelDeals->Insurances->find('list', limit: 200)->all();
        $hotels = $this->TravelDeals->Hotels->find('list', limit: 200)->all();
        $carRentals = $this->TravelDeals->CarRentals->find('list', limit: 200)->all();
        $translations = $this->TravelDeals->Translations->find('list', limit: 200)->all();
        $flights = $this->TravelDeals->Flights->find('list', limit: 200)->all();
        $cruises = $this->TravelDeals->Cruises->find('list', limit: 200)->all();
        $this->set(compact('travelDeal', 'insurances', 'hotels', 'carRentals', 'translations', 'flights', 'cruises'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Travel Deal id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $travelDeal = $this->TravelDeals->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $travelDeal = $this->TravelDeals->patchEntity($travelDeal, $this->request->getData());
            if ($this->TravelDeals->save($travelDeal)) {
                $this->Flash->success(__('The travel deal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The travel deal could not be saved. Please, try again.'));
        }
        $insurances = $this->TravelDeals->Insurances->find('list', limit: 200)->all();
        $hotels = $this->TravelDeals->Hotels->find('list', limit: 200)->all();
        $carRentals = $this->TravelDeals->CarRentals->find('list', limit: 200)->all();
        $translations = $this->TravelDeals->Translations->find('list', limit: 200)->all();
        $flights = $this->TravelDeals->Flights->find('list', limit: 200)->all();
        $cruises = $this->TravelDeals->Flights->find('list', limit: 200)->all();
        $this->set(compact('travelDeal', 'insurances', 'hotels', 'carRentals', 'translations', 'flights', 'cuirses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Travel Deal id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $travelDeal = $this->TravelDeals->get($id);
        if ($this->TravelDeals->delete($travelDeal)) {
            $this->Flash->success(__('The travel deal has been deleted.'));
        } else {
            $this->Flash->error(__('The travel deal could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
