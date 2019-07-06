<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;

/**
 * Backend Controller
 *
 *
 * @method \App\Model\Entity\Backend[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FrontendController extends AppController
{
    public function initialize(){
        parent::initialize();
        $this->Articulos = TableRegistry::get('Articulos');
        $this->Publicidades = TableRegistry::get('Publicidades');
    }
    
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        //$this->Auth->allow(['add', 'logout']);
        $this->Auth->allow(['index']);
        $this->set('title_for_layout', "Frontend");
        $this->viewBuilder()->setLayout('frontend');
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $articulos_centro = $this->Articulos->find('all', [
                            'order' => ['publicado' => 'asc'],
                            'limit' => 100
                        ])
                ->select(['Articulos.id', 'Articulos.titulo', 'Articulos.publicado', 'Articulos.palabras_claves'])
                ->where(['zona' => 'CENTRO', 'habilitado' => true])
                ->toArray();
        
        $articulos_norte = $this->Articulos->find('all', [
                            'order' => ['publicado' => 'asc'],
                            'limit' => 100
                        ])
                ->select(['Articulos.id', 'Articulos.titulo', 'Articulos.publicado', 'Articulos.palabras_claves'])
                ->where(['zona' => 'NORTE', 'habilitado' => true])
                ->toArray();
        
        $articulos_sur = $this->Articulos->find('all', [
                            'order' => ['publicado' => 'asc'],
                            'limit' => 100
                        ])
                ->select(['Articulos.id', 'Articulos.titulo', 'Articulos.publicado', 'Articulos.palabras_claves'])
                ->where(['zona' => 'SUR', 'habilitado' => true])
                ->toArray();
        
        $articulos_general = $this->Articulos->find('all', [
                            'order' => ['publicado' => 'asc'],
                            'limit' => 10
                        ])
                ->select(['Articulos.id', 'Articulos.titulo', 'Articulos.publicado'])
                ->contain(['Imagenes'])
                ->where(['zona' => 'GENERAL', 'habilitado' => true])
                ->toArray();
        
        $publicidad_inicial = $this->Publicidades->find('all')
                ->contain(['Imagenes', 'Videos'])
                ->where(['Publicidades.tipo' => 'INICIAL', 'Publicidades.habilitado' => true])
                ->first();
        
        $publicidad_centro = $this->Publicidades->find('all', [
                            'order' => ['orden' => 'asc'],
                            'limit' => 10
                        ])
                ->select(['Publicidades.id', 'Publicidades.nombre', 'Imagenes.id', 'Imagenes.filename', 'Imagenes.file_url'])
                ->contain(['Imagenes'])
                ->where(['Publicidades.tipo' => 'RULETA', 'Publicidades.habilitado' => true, 'zona' => 'CENTRO'])
                ->toArray();
        
        $publicidad_norte = $this->Publicidades->find('all', [
                            'order' => ['orden' => 'asc'],
                            'limit' => 10
                        ])
                ->select(['Publicidades.id', 'Publicidades.nombre', 'Imagenes.id', 'Imagenes.filename', 'Imagenes.file_url'])
                ->contain(['Imagenes'])
                ->where(['Publicidades.tipo' => 'RULETA', 'Publicidades.habilitado' => true, 'zona' => 'NORTE'])
                ->toArray();
        
        $publicidad_sur = $this->Publicidades->find('all', [
                            'order' => ['orden' => 'asc'],
                            'limit' => 10
                        ])
                ->select(['Publicidades.id', 'Publicidades.nombre', 'Imagenes.id', 'Imagenes.filename', 'Imagenes.file_url'])
                ->contain(['Imagenes'])
                ->where(['Publicidades.tipo' => 'RULETA', 'Publicidades.habilitado' => true, 'zona' => 'SUR'])
                ->toArray();
        
        //echo '<pre>';
        //var_dump($articulos_centro);
        //var_dump($articulos_norte);
        //var_dump($articulos_sur);
        //var_dump($articulos_general);
        //var_dump($publicidad_inicial);
        //var_dump($publicidad_centro);
        //var_dump($publicidad_norte);
        //var_dump($publicidad_sur);
        //exit;
        
        $this->set(compact('articulos_centro','articulos_sur', 
                'articulos_norte','articulos_general', 
                'publicidad_centro', 'publicidad_inicial', 
                'publicidad_norte', 'publicidad_sur'));
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
