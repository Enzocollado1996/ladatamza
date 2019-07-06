<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
/**
 * Publicidades Controller
 *
 * @property \App\Model\Table\PublicidadesTable $Publicidades
 *
 * @method \App\Model\Entity\Publicidad[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PublicidadesController extends AppController
{
    public function initialize(){
        parent::initialize();
        $this->Imagenes = TableRegistry::get('Imagenes');
        $this->Videos = TableRegistry::get('Videos');
        $this->loadComponent('String');
    }
    
    private function getZonas(){        
        $options = [
            'SUR' => 'SUR',
            'CENTRO' => 'CENTRO',
            'NORTE' => 'NORTE'
        ];
        return $options;
    }
    
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->set('Auth', $this->Auth);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        //$this->Auth->allow(['add', 'logout']);
        $this->set('title_for_layout', "Publicidad-".Configure::read('nombre_portal'));
        $this->viewBuilder()->setLayout('backend');
    }
    
    /*private function getTipos(){        
        $options = [
            'INI' => 'PRINCIPAL'
        ];
        return $options;
    }*/
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function ruedanotas()
    {
        $this->paginate = [
            'conditions' => ['Publicidades.tipo' => 'RULETA'],
            'contain' => ['Imagenes'],
            'order' => [
                'Publicidades.creado' => 'desc'
            ]
        ];
        $publicidades = $this->paginate($this->Publicidades);

        $this->set(compact('publicidades'));
    }
    
    public function principal()
    {
        $this->paginate = [
            'conditions' => ['Publicidades.tipo' => 'INICIAL'],
            'contain' => ['Imagenes', 'Videos'],
            'order' => [
                'Publicidades.creado' => 'desc'
            ]
        ];
        $publicidades = $this->paginate($this->Publicidades);

        $this->set(compact('publicidades'));
    }

    /**
     * View method
     *
     * @param string|null $id Publicidad id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $publicidad = $this->Publicidades->get($id, [
            'contain' => ['Imagenes', 'Videos']
        ]);

        $this->set('publicidad', $publicidad);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $publicidad = $this->Publicidades->newEntity();
        if ($this->request->is('post')) {
            $publicidad = $this->Publicidades->patchEntity($publicidad, $this->request->getData());
            $publicidad->tipo = 'RULETA';
            $publicidad->creado = date("Y-m-d H:i:s");
            
            if ($this->Publicidades->save($publicidad)) {
                // Proceso imagen de publicidad si fue cagada
                if(!empty($this->request->data['filename']) && !empty($this->request->data['filename']["tmp_name"])){
                    $imagen_a_guardar = $this->request->data['filename'];
                    $imagen = TableRegistry::get('Imagenes')->newEntity();
                    $filename = [
                        'error' => $imagen_a_guardar['error'],
                        'name' => $this->String->cleanStringToImage($imagen_a_guardar['name']),
                        'size' => $imagen_a_guardar['size'],
                        'tmp_name' => $imagen_a_guardar['tmp_name'],
                        'type' => $imagen_a_guardar['type']
                    ];
                    $imagen->descripcion = '';
                    $imagen->filename = $filename;                        
                    $imagen->creado = date("Y-m-d H:i:s");
                    $imagen->tipo = 'PUBLICIDAD';
                    
                    $publicidad->imagen = $imagen;
                    $this->Publicidades->save($publicidad);
                }
                
                $this->Flash->success(__('La publicidad ha sido guardada.'));
                return $this->redirect(['action' => 'ruedanotas']);
            }
            $this->Flash->error(__('La publicidad no fue guardada. Intente nuevamente.'));   
        }
        //$imagenes = $this->Publicidades->Imagenes->find('list', ['limit' => 200]);
        //$videos = $this->Publicidades->Videos->find('list', ['limit' => 200]);
        $zonas = $this->getZonas();
        $this->set('zonas', $zonas);
        $this->set(compact('publicidad'/*, 'imagenes', 'videos'*/));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function principalAdd()
    {
        $publicidad = $this->Publicidades->newEntity();
        if ($this->request->is('post')) {
            $publicidad = $this->Publicidades->patchEntity($publicidad, $this->request->getData());
            $publicidad->tipo = 'INICIAL';
            $publicidad->zona = 'NINGUNA';
            $publicidad->creado = date("Y-m-d H:i:s");
            
            if ($this->Publicidades->save($publicidad)) {
                
                // Proceso imagen de publicidad si fue cagada
                if(!empty($this->request->data['filename']) && !empty($this->request->data['filename']["tmp_name"])){
                    $imagen_a_guardar = $this->request->data['filename'];
                    $imagen = TableRegistry::get('Imagenes')->newEntity();
                    $filename = [
                        'error' => $imagen_a_guardar['error'],
                        'name' => $this->String->cleanStringToImage($imagen_a_guardar['name']),
                        'size' => $imagen_a_guardar['size'],
                        'tmp_name' => $imagen_a_guardar['tmp_name'],
                        'type' => $imagen_a_guardar['type']
                    ];
                    $imagen->descripcion = '';
                    $imagen->filename = $filename;                        
                    $imagen->creado = date("Y-m-d H:i:s");
                    $imagen->tipo = 'PUBLICIDAD';
                    
                    $publicidad->imagen = $imagen;
                    $this->Publicidades->save($publicidad);
                }
                
                // Proceso video de publicidad si fue cagado
                if(!empty($this->request->data['file']['name'])){
                    $fileName = time().'_'.$this->String->cleanStringToImage($this->request->data['file']['name']);
                    $uploadPath = Configure::read('path_video_subida');
                    $uploadFile = $uploadPath.$fileName;

                    if(move_uploaded_file($this->request->data['file']['tmp_name'],WWW_ROOT.$uploadFile)){
                        $video = $this->Videos->newEntity();
                        $video->titulo = $publicidad->nombre;
                        $video->nombre = $fileName;
                        $video->creado = date("Y-m-d H:i:s");
                        $video->publicado = date("Y-m-d H:i:s");
                        $video->tipo = 'PUBLICIDAD';
                        $publicidad->video = $video;
                        $this->Publicidades->save($publicidad);
                        return $this->redirect(['action' => 'principal']);
                    }else{
                        $this->Flash->error(__('No se pudo crear el video. Intente nuevamente.'));
                    }
                }
                
                $this->Flash->success(__('La publicidad ha sido guardada.'));
                return $this->redirect(['action' => 'principal']);
            }
            $this->Flash->error(__('La publicidad no fue guardada. Intente nuevamente.'));   
        }
        //$imagenes = $this->Publicidades->Imagenes->find('list', ['limit' => 200]);
        //$videos = $this->Publicidades->Videos->find('list', ['limit' => 200]);
        $this->set(compact('publicidad'/*, 'imagenes', 'videos'*/));
    }
    
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function principalEdit($id = null)
    {
        $publicidad = $this->Publicidades->get($id, [
            'contain' => ['Imagenes', 'Videos']
        ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $publicidad = $this->Publicidades->patchEntity($publicidad, $this->request->getData());
            $publicidad->modificado = date("Y-m-d H:i:s");
            if ($this->Publicidades->save($publicidad)) {
                // Proceso imagen de publicidad si fue cagada
                if(!empty($this->request->data['filename']) && !empty($this->request->data['filename']["tmp_name"])){
                    $imagen_a_guardar = $this->request->data['filename'];
                    $imagen = TableRegistry::get('Imagenes')->newEntity();
                    $filename = [
                        'error' => $imagen_a_guardar['error'],
                        'name' => $this->String->cleanStringToImage($imagen_a_guardar['name']),
                        'size' => $imagen_a_guardar['size'],
                        'tmp_name' => $imagen_a_guardar['tmp_name'],
                        'type' => $imagen_a_guardar['type']
                    ];
                    $imagen->descripcion = '';
                    $imagen->filename = $filename;                        
                    $imagen->creado = date("Y-m-d H:i:s");
                    $imagen->tipo = 'PUBLICIDAD';
                    
                    if ($publicidad->has('imagen')) {
                        $this->Imagenes->delete($publicidad->imagen);
                    }
                    
                    $publicidad->imagen = $imagen;
                    $this->Publicidades->save($publicidad);                    
                }
                
                if(!empty($this->request->data['file']['name'])){
                    $fileName = time().'_'.$this->String->cleanStringToImage($this->request->data['file']['name']);
                    $uploadPath = Configure::read('path_video_subida');
                    $uploadFile = $uploadPath.$fileName;

                    if(move_uploaded_file($this->request->data['file']['tmp_name'],WWW_ROOT.$uploadFile)){
                        // Elimino el adjunto anterior
                        if ($publicidad->has('video') && file_exists(WWW_ROOT.$uploadPath.$publicidad->video->nombre)) {
                            unlink(WWW_ROOT.$uploadPath.$publicidad->video->nombre);
                            $this->Videos->delete($publicidad->video);
                        }
                        $video = $this->Videos->newEntity();
                        $video->titulo = $publicidad->nombre;
                        $video->nombre = $fileName;
                        $video->creado = date("Y-m-d H:i:s");
                        $video->publicado = date("Y-m-d H:i:s");
                        $video->tipo = 'PUBLICIDAD';
                        $publicidad->video = $video;
                        $this->Publicidades->save($publicidad);
                        return $this->redirect(['action' => 'principal']);
                    }else{
                        $this->Flash->error(__('No se pudo crear el video. Intente nuevamente.'));
                    }
                }
                
                $this->Flash->success(__('La publicidad ha sido guardada.'));
                return $this->redirect(['action' => 'principal']);
            }
            $this->Flash->error(__('La publicidad no fue guardada. Intente nuevamente.'));   
        }        
        $this->set(compact('publicidad'));
    }
    
    /**
     * Edit method
     *
     * @param string|null $id Publicidad id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $publicidad = $this->Publicidades->get($id, [
            'contain' => ['Imagenes']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $publicidad = $this->Publicidades->patchEntity($publicidad, $this->request->getData());
            $publicidad->modificado = date("Y-m-d H:i:s");
            if ($this->Publicidades->save($publicidad)) {
                // Proceso imagen de publicidad si fue cagada
                if(!empty($this->request->data['filename']) && !empty($this->request->data['filename']["tmp_name"])){
                    $imagen_a_guardar = $this->request->data['filename'];
                    $imagen = TableRegistry::get('Imagenes')->newEntity();
                    $filename = [
                        'error' => $imagen_a_guardar['error'],
                        'name' => $this->String->cleanStringToImage($imagen_a_guardar['name']),
                        'size' => $imagen_a_guardar['size'],
                        'tmp_name' => $imagen_a_guardar['tmp_name'],
                        'type' => $imagen_a_guardar['type']
                    ];
                    $imagen->descripcion = '';
                    $imagen->filename = $filename;                        
                    $imagen->creado = date("Y-m-d H:i:s");
                    $imagen->tipo = 'PUBLICIDAD';
                    
                    if ($publicidad->has('imagen')) {
                        $this->Imagenes->delete($publicidad->imagen);
                    }
                    
                    $publicidad->imagen = $imagen;
                    $this->Publicidades->save($publicidad);                    
                }
                
                $this->Flash->success(__('La publicidad ha sido guardada.'));
                return $this->redirect(['action' => 'ruedanotas']);
            }
            $this->Flash->error(__('La publicidad no fue guardada. Intente nuevamente.'));   
        }
        $zonas = $this->getZonas();
        $this->set('zonas', $zonas);
        $this->set(compact('publicidad'));
    }
    
    /**
     * Delete method
     *
     * @param string|null $id Publicidad id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function principalDelete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $publicidad = $this->Publicidades->get($id, [
            'contain' => ['Imagenes', 'Videos']
        ]);
        if ($publicidad->has('imagen')) {
            $this->Imagenes->delete($publicidad->imagen);
        }
        if ($publicidad->has('video')) {
            $uploadPath = Configure::read('path_video_subida');
            $uploadFile = $uploadPath.$publicidad->nombre;
            if (file_exists(WWW_ROOT.$uploadFile)) {
                unlink(WWW_ROOT.$uploadFile);
            }
            $this->Videos->delete($publicidad->video);
        }
        if ($this->Publicidades->delete($publicidad)) {
            $this->Flash->success(__('La publicidad ha sido borrada.'));
        } else {
            $this->Flash->error(__('La publicidad no pudo ser borada. Intente nuevamente.'));
        }

        return $this->redirect(['action' => 'principal']);
    }
    
    /**
     * Delete method
     *
     * @param string|null $id Publicidad id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $publicidad = $this->Publicidades->get($id, [
            'contain' => ['Imagenes']
        ]);
        if ($publicidad->has('imagen')) {
            $this->Imagenes->delete($publicidad->imagen);
        }
        if ($this->Publicidades->delete($publicidad)) {            
            $this->Flash->success(__('La publicidad ha sido borrada.'));
        } else {
            $this->Flash->error(__('La publicidad no pudo ser borada. Intente nuevamente.'));
        }

        return $this->redirect(['action' => 'ruedanotas']);
    }
}
