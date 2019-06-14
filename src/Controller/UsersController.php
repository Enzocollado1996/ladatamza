<?php
// src/Controller/UsersController.php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
// Prior to 3.6 use Cake\Network\Exception\NotFoundException
use Cake\Http\Exception\NotFoundException;

class UsersController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->set('Auth', $this->Auth);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['add', 'logout']);
    }

    public function login()
    {
        if ($this->Auth->user()) {
            return $this->redirect(['controller' => 'backend','action' => 'index']);
        }
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Usuario o contraseña incorrecta, intente de nuevo.'));
        }
        $this->set('title_for_layout', "CMS - MDZ Federal");
        $this->viewBuilder()->setLayout('');
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
    
    public function index()
    {
        if($this->Auth->user('role') == 'admin'){
            $this->set('title_for_layout', "Usuarios - MDZ Federal");
            $this->viewBuilder()->setLayout('backend');
            $this->set('users', $this->Users->find('all'));
        }
        else{
            //pagina prohibido
            return $this->redirect(['controller' => 'backend','action' => 'forbidden']);
        }
    }

//    public function view($id)
//    {
//        if (!$id) {
//            throw new NotFoundException(__('Invalid user'));
//        }
//
//        $user = $this->Users->get($id);
//        $this->set(compact('user'));
//    }

    public function add()
    {
        //if($this->Auth->user('id') == $id || $this->Auth->user('role') == 'admin'){
        if(true){
            $user = $this->Users->newEntity();
            if ($this->request->is('post')) {
                $user = $this->Users->patchEntity($user, $this->request->getData());
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('El usuario ha sido guardado.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Unable to add the user.'));
            }
            $this->set('title_for_layout', "Usuarios - MDZ Federal");
            $this->viewBuilder()->setLayout('backend');
            $this->set('user', $user);
        }
        else{
            //pagina prohibido
            return $this->redirect(['controller' => 'backend','action' => 'forbidden']);
        }
    }
    
    public function edit($id = null)
    {
        if($this->Auth->user('id') == $id || $this->Auth->user('role') == 'admin'){
            $user = $this->Users->get($id, [
                'contain' => []
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $data = $this->request->getData();
                if(empty($data['password'])){
                    unset($data['password']);
                }
                $user = $this->Users->patchEntity($user, $data);

                if ($this->Users->save($user)) {
                    $this->Flash->success(__('El usuario ha sido actualizado.'));
                    if($this->Auth->user('role') != 'admin'){
                        return $this->redirect(['controller' => 'backend','action' => 'index']);
                    }
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('El usuario no pudo ser guardado. Intente más tarde.'));                
            }            
            $this->set('title_for_layout', "Usuarios - MDZ Federal");
            $this->viewBuilder()->setLayout('backend');
            $this->set(compact('user'));            
        }
        else{
            //pagina prohibido
            return $this->redirect(['controller' => 'backend','action' => 'forbidden']);
        }
    }
    
    public function delete($id = null)
    {
        if($this->Auth->user('role') == 'admin'){
            $user = $this->Users->get($id);
            if ($this->Users->delete($user)) {
                $this->Flash->success(__('El usuario ha sido borrado.'));
            } else {
                $this->Flash->error(__('El usuario no pudo ser borrado. Intente más tarde.'));
            }
            return $this->redirect(['action' => 'index']);
        }
        else{
            //pagina prohibido
            return $this->redirect(['controller' => 'backend','action' => 'forbidden']);
        }
    }
}
?>