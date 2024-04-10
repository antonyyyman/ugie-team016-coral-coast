<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Cruises Controller
 *
 * @property \App\Model\Table\CruisesTable $Cruises
 */
class CruisesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Cruises->find()
            ->contain(['Hotels']);
        $cruises = $this->paginate($query);

        $this->set(compact('cruises'));
    }

    /**
     * View method
     *
     * @param string|null $id Cruise id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cruise = $this->Cruises->get($id, contain: ['Hotels']);
        $this->set(compact('cruise'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cruise = $this->Cruises->newEmptyEntity();
        if ($this->request->is('post')) {
            $cruise = $this->Cruises->patchEntity($cruise, $this->request->getData());
            if ($this->Cruises->save($cruise)) {
                $this->Flash->success(__('The cruise has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cruise could not be saved. Please, try again.'));
        }
        $hotels = $this->Cruises->Hotels->find('list', limit: 200)->all();
        $this->set(compact('cruise', 'hotels'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cruise id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cruise = $this->Cruises->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cruise = $this->Cruises->patchEntity($cruise, $this->request->getData());
            if ($this->Cruises->save($cruise)) {
                $this->Flash->success(__('The cruise has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cruise could not be saved. Please, try again.'));
        }
        $hotels = $this->Cruises->Hotels->find('list', limit: 200)->all();
        $this->set(compact('cruise', 'hotels'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cruise id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cruise = $this->Cruises->get($id);
        if ($this->Cruises->delete($cruise)) {
            $this->Flash->success(__('The cruise has been deleted.'));
        } else {
            $this->Flash->error(__('The cruise could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}