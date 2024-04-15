<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * CarRentals Controller
 *
 * @property \App\Model\Table\CarRentalsTable $CarRentals
 */
class CarRentalsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        debug($this->ContactForms);

        $query = $this->CarRentals->find();
        $carRentals = $this->paginate($query);

        $this->set(compact('carRentals'));
    }

    /**
     * View method
     *
     * @param string|null $id Car Rental id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $carRental = $this->CarRentals->get($id, contain: ['Bookings', 'TravelDeals']);
        $this->set(compact('carRental'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $carRental = $this->CarRentals->newEmptyEntity();
        if ($this->request->is('post')) {
            $carRental = $this->CarRentals->patchEntity($carRental, $this->request->getData());
            if ($this->CarRentals->save($carRental)) {
                $this->Flash->success(__('The car rental has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The car rental could not be saved. Please, try again.'));
        }
        $this->set(compact('carRental'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Car Rental id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $carRental = $this->CarRentals->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $carRental = $this->CarRentals->patchEntity($carRental, $this->request->getData());
            if ($this->CarRentals->save($carRental)) {
                $this->Flash->success(__('The car rental has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The car rental could not be saved. Please, try again.'));
        }
        $this->set(compact('carRental'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Car Rental id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $carRental = $this->CarRentals->get($id);
        if ($this->CarRentals->delete($carRental)) {
            $this->Flash->success(__('The car rental has been deleted.'));
        } else {
            $this->Flash->error(__('The car rental could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
