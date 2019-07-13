<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Routing\Router;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;

/**
 * Videos Controller
 *
 * @property \App\Model\Table\VideosTable $Videos
 *
 * @method \App\Model\Entity\Video[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VideosController extends AppController
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
        $this->set('title_for_layout', "Videos-".Configure::read('nombre_portal'));
        $this->viewBuilder()->setLayout('backend');
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $videos = $this->paginate($this->Videos);

        $this->set(compact('videos'));
    }

    /**
     * View method
     *
     * @param string|null $id Video id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $video = $this->Videos->get($id, [
            'contain' => []
        ]);

        $this->set('video', $video);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $video = $this->Videos->newEntity();
        if ($this->request->is('post')) {
            $video = $this->Videos->patchEntity($video, $this->request->getData());
            $video->creado = date("Y-m-d H:i:s");
            $parsed = date_parse_from_format('d/m/Y H:i', $this->request->getData('datetimepicker1'));
            $video->publicado = date("Y-m-d H:i:s", mktime($parsed['hour'],$parsed['minute'],$parsed['second'],$parsed['month'],$parsed['day'],$parsed['year']));
            $video->tipo = 'NOTICIA';
            
            if(!empty($this->request->data['file']['name'])){
                $fileName = time().'_'.$this->String->cleanStringToImage($this->request->data['file']['name']);
                $uploadPath = Configure::read('path_video_subida');
                $uploadFile = $uploadPath.$fileName;
                
                if(move_uploaded_file($this->request->data['file']['tmp_name'],WWW_ROOT.$uploadFile)){
                    //$uploadData = $this->Videos->newEntity();
                    $video->nombre = $fileName;
                    $this->Videos->save($video);
                }
                else{
                    $this->Flash->error(__('No se pudo crear el video. Intente nuevamente.'));
                }
            }
            
            if(!empty($this->request->data['file2']['name'])){
                $fileName = time().'_'.$this->String->cleanStringToImage($this->request->data['file2']['name']);
                $uploadPath = Configure::read('path_video_subida');
                $uploadFile = $uploadPath.$fileName;
                
                if(move_uploaded_file($this->request->data['file2']['tmp_name'],WWW_ROOT.$uploadFile)){
                    //$uploadData = $this->Videos->newEntity();
                    $video->nombre_publicidad = $fileName;
                    $this->Videos->save($video);
                }
                else{
                    $this->Flash->error(__('No se pudo crear el video. Intente nuevamente.'));
                }
            }
            return $this->redirect(['action' => 'index']);
            /*else{
                $this->Flash->error(__('Debe seleccionar un archivo.'));
            }*/
        }
        $this->set(compact('video'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Video id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $video = $this->Videos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $video = $this->Videos->patchEntity($video, $this->request->getData());
            $video->modificado = date("Y-m-d H:i:s");
            
            //Ingresó un archivo
            if(!empty($this->request->data['file']['name'])){
                $fileName = time().'_'.$this->String->cleanStringToImage($this->request->data['file']['name']);
                $uploadPath = Configure::read('path_video_subida');
                $uploadFile = $uploadPath.$fileName;
                
                if(move_uploaded_file($this->request->data['file']['tmp_name'],WWW_ROOT.$uploadFile)){
                    // Elimino el adjunto anterior
                    if (file_exists(WWW_ROOT.$uploadPath.$video->nombre)) {
                        unlink(WWW_ROOT.$uploadPath.$video->nombre);
                    }
                    
                    $video->nombre = $fileName;
                    
                    if ($this->Videos->save($video)) {
                        $this->Flash->success(__('El video ha sido guardado.'));
                        return $this->redirect(['action' => 'index']);
                    }else{
                        $this->Flash->error(__('No se pudo crear el video. Intente nuevamente.'));
                    }
                }else{
                    $this->Flash->error(__('No se pudo crear el video. Intente nuevamente.'));
                }
            }else{
                if($this->Videos->save($video)){
                    $this->Flash->success(__('El video ha sido guardado.'));
                    return $this->redirect(['action' => 'index']);
                }
                else{
                    $this->Flash->error(__('No se pudo crear el video. Intente nuevamente.'));
                }
                
            }
        }
        $this->set(compact('video', 'base_video'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Video id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $video = $this->Videos->get($id);
        if ($this->Videos->delete($video)) {
            $uploadPath = Configure::read('path_video_subida');
            $uploadFile = $uploadPath.$video->nombre;
            
            if (file_exists(WWW_ROOT.$uploadFile)) {
                unlink(WWW_ROOT.$uploadFile);
            }
            
            $this->Flash->success(__('El video ha sido borrado.'));
        } else {
            $this->Flash->error(__('El video no pudo ser borrado. Intente nuevamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
