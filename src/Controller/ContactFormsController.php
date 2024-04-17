<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Mailer\Mailer;

/**
 * ContactForms Controller
 *
 * @property \App\Model\Table\ContactFormsTable $ContactForms
 */
class ContactFormsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function initialize(): void{

        parent::initialize();        
        $this->loadComponent('Authentication.Authentication');      
        $this->Authentication->allowUnauthenticated(['add']);

    }

    public function index()
    {
        $query = $this->ContactForms->find();
        $contactForms = $this->paginate($query);

        $this->set(compact('contactForms'));
    }

    /**
     * View method
     *
     * @param string|null $id Contact Form id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contactForm = $this->ContactForms->get($id, contain: []);
        $this->set(compact('contactForm'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contactForm = $this->ContactForms->newEmptyEntity();
        $requestNatureOptions = $this->ContactForms->getRequestNatureOptions();
        if ($this->request->is('post')) {
            $contactForm = $this->ContactForms->patchEntity($contactForm, $this->request->getData());
            if ($this->ContactForms->save($contactForm)) {
                // $mailer = new Mailer('default');
                // $mailer
                // ->setEmailFormat('html')
                // ->setTo($contactForm->email)
                // ->setFrom(Configure::read('ContactFormMail.from'))
                // ->viewBuilder()
                //     ->setTemplate('contact_forms');

                // $mailer->setViewVars([
                //     'query' => $contactForm->query,
                //     'first_name' => $contactForm->first_name,
                //     'email' => $contactForm->email,
                //     'created' => $contactForm->created,
                //     'id' => $contactForm->id
                // ]);

                // $mailer->deliver();
    
                $this->Flash->success(__('The contact form has been saved.'));
                return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
            }
            $this->Flash->error(__('The contact form could not be saved. Please, try again.'));
        }
        $this->set(compact('contactForm', 'requestNatureOptions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Contact Form id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contactForm = $this->ContactForms->get($id, contain: []);
        $requestNatureOptions = $this->ContactForms->getRequestNatureOptions();
        $this->set(compact('contactForm'));
        $this->set(compact('contactForm', 'requestNatureOptions'));
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contactForm = $this->ContactForms->patchEntity($contactForm, $this->request->getData());
            if ($this->ContactForms->save($contactForm)) {
                $this->Flash->success(__('The contact form has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contact form could not be saved. Please, try again.'));
        }

    }

    /**
     * Delete method
     *
     * @param string|null $id Contact Form id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contactForm = $this->ContactForms->get($id);
        if ($this->ContactForms->delete($contactForm)) {
            $this->Flash->success(__('The contact form has been deleted.'));
        } else {
            $this->Flash->error(__('The contact form could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
