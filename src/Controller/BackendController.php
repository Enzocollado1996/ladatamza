<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
/**
 * Backend Controller
 *
 *
 * @method \App\Model\Entity\Backend[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BackendController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        //$this->Auth->allow(['add', 'logout']);
        $this->set('Auth', $this->Auth);
        $this->set('title_for_layout', "CMS - MDZ Federal");
        $this->viewBuilder()->setLayout('backend');
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
//        $faqs_count = TableRegistry::get('Faqs')->find()->count();
//        $banners_count = TableRegistry::get('Banners')->find()->count();
        if($this->Auth->user('role') == 'admin'){
            $users_count = TableRegistry::get('Users')->find()->count();
            $this->set('users_count', $users_count);
        }
//        $this->set(compact('faqs_count', 'banners_count'));
    }
    
    public function forbidden()
    {        
    }

    /**
     * View method
     *
     * @param string|null $id Backend id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    /*public function view($id = null)
    {
        $backend = $this->Backend->get($id, [
            'contain' => []
        ]);

        $this->set('backend', $backend);
    }/

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    /*public function add()
    {
        $backend = $this->Backend->newEntity();
        if ($this->request->is('post')) {
            $backend = $this->Backend->patchEntity($backend, $this->request->getData());
            if ($this->Backend->save($backend)) {
                $this->Flash->success(__('The backend has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The backend could not be saved. Please, try again.'));
        }
        $this->set(compact('backend'));
    }*/

    /**
     * Edit method
     *
     * @param string|null $id Backend id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    /*public function edit($id = null)
    {
        $backend = $this->Backend->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $backend = $this->Backend->patchEntity($backend, $this->request->getData());
            if ($this->Backend->save($backend)) {
                $this->Flash->success(__('The backend has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The backend could not be saved. Please, try again.'));
        }
        $this->set(compact('backend'));
    }*/

    /**
     * Delete method
     *
     * @param string|null $id Backend id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    /*public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $backend = $this->Backend->get($id);
        if ($this->Backend->delete($backend)) {
            $this->Flash->success(__('The backend has been deleted.'));
        } else {
            $this->Flash->error(__('The backend could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }*/
}
