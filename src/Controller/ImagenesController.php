<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;

/**
 * Imagenes Controller
 *
 * @property \App\Model\Table\ImagenesTable $Imagenes
 *
 * @method \App\Model\Entity\Imagen[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ImagenesController extends AppController
{
    public function initialize(){
        parent::initialize();
        $this->loadComponent('String');
    }
        
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->set('Auth', $this->Auth);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        //$this->Auth->allow(['add', 'logout']);
        $this->set('title_for_layout', "Imágenes-".Configure::read('nombre_portal'));
        $this->viewBuilder()->setLayout('backend');
    }
    
    private function getTipos(){        
        $options = [
            'NOTICIA' => 'NOTICIA',
            'PUBLICIDAD' => 'PUBLICIDAD'
        ];
        return $options;
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $imagenes = $this->paginate($this->Imagenes);

        $this->set(compact('imagenes'));
    }

    /**
     * View method
     *
     * @param string|null $id Imagen id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $imagen = $this->Imagenes->get($id, [
            'contain' => ['ArticuloImagen']
        ]);

        $this->set('imagen', $imagen);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $imagen = $this->Imagenes->newEntity();
        if ($this->request->is('post')) {
            $imagen = $this->Imagenes->patchEntity($imagen, $this->request->getData());
            
            if(!empty($this->request->data['filename']) && !empty($this->request->data['filename'][0]["tmp_name"])){
                foreach($this->request->data['filename'] as $imagen_a_guardar){
                    $filename = [
                        'error' => $imagen_a_guardar['error'],
                        'name' => $this->String->cleanStringToImage($imagen_a_guardar['name']),
                        'size' => $imagen_a_guardar['size'],
                        'tmp_name' => $imagen_a_guardar['tmp_name'],
                        'type' => $imagen_a_guardar['type']
                    ];
                    $imagen->filename = $filename;                        
                    $imagen->creado = date("Y-m-d H:i:s");
                    
                    $this->Imagenes->save($imagen);
                    $this->Flash->success(__('La imágen ha sido guardada.'));
                    return $this->redirect(['action' => 'index']);
                }
            }
            else{
                $this->Flash->error(__('La imagen no fue guardado. Intente nuevamente.'));
            }            
        }
        $tipos = $this->getTipos();
        $this->set(compact('imagen', 'tipos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Imagen id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $imagen = $this->Imagenes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $imagen = $this->Imagenes->patchEntity($imagen, $this->request->getData());
            $imagen->modificado = date("Y-m-d H:i:s");
            
            if(!empty($this->request->data['filename']) && !empty($this->request->data['filename'][0]["tmp_name"])){
                foreach($this->request->data['filename'] as $imagen_a_guardar){
                    $filename = [
                        'error' => $imagen_a_guardar['error'],
                        'name' => $this->String->cleanStringToImage($imagen_a_guardar['name']),
                        'size' => $imagen_a_guardar['size'],
                        'tmp_name' => $imagen_a_guardar['tmp_name'],
                        'type' => $imagen_a_guardar['type']
                    ];
                    $imagen->filename = $filename; 
                    
                    $this->Imagenes->save($imagen);
                    
                    $this->Flash->success(__('La imágen ha sido guardada.'));
                    return $this->redirect(['action' => 'index']);
                }
            }
            else{
                $this->Flash->error(__('La imagen no fue guardado. Intente nuevamente.'));
            }  
        }
        $tipos = $this->getTipos();
        $this->set(compact('imagen', 'tipos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Imagen id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $imagen = $this->Imagenes->get($id);
        if ($this->Imagenes->delete($imagen)) {
            $this->Flash->success(__('La imágen fue eliminada.'));
        } else {
            $this->Flash->error(__('La imagen no pudo ser eliminada. Intente nuevamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
