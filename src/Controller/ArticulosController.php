<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
/**
 * Articulos Controller
 *
 * @property \App\Model\Table\ArticulosTable $Articulos
 *
 * @method \App\Model\Entity\Articulo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArticulosController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->set('Auth', $this->Auth);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        //$this->Auth->allow(['add', 'logout']);
        $this->set('title_for_layout', "Articulos-".Configure::read('nombre_portal'));
        $this->viewBuilder()->setLayout('backend');
    }
    
    private function getZonas(){        
        $options = [
            'SUR' => 'SUR',
            'CENTRO' => 'CENTRO',
            'NORTE' => 'NORTE',
            'GENERAL' => 'GENERAL'
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
        $articulos = $this->paginate($this->Articulos);
        $this->set(compact('articulos'));
    }

    /**
     * View method
     *
     * @param string|null $id Articulo id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $articulo = $this->Articulos->get($id, [
            'contain' => ['Imagenes']
        ]);

        $this->set('articulo', $articulo);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $articulo = $this->Articulos->newEntity();
        if ($this->request->is('post')) {
            $articulo = $this->Articulos->patchEntity($articulo, $this->request->getData());
            $articulo->creado = date("Y-m-d H:i:s");
            $parsed = date_parse_from_format('d/m/Y H:i', $this->request->getData('datetimepicker1'));
            $articulo->publicado = date("Y-m-d H:i:s", mktime($parsed['hour'],$parsed['minute'],$parsed['second'],$parsed['month'],$parsed['day'],$parsed['year']));
            
            if ($this->Articulos->save($articulo)) {
                $array_imagenes = [];
                if(!empty($this->request->data['filename'])){
                    foreach($this->request->data['filename'] as $imagen_a_guardar){
                        $imagen = TableRegistry::get('Imagenes')->newEntity();
                        $imagen = TableRegistry::get('Imagenes')->patchEntity($imagen, $this->request->data);
                        $filename = [
                            'error' => $imagen_a_guardar['error'],
                            'name' => $imagen_a_guardar['name'],
                            'size' => $imagen_a_guardar['size'],
                            'tmp_name' => $imagen_a_guardar['tmp_name'],
                            'type' => $imagen_a_guardar['type']
                        ];                          
                        $imagen->filename = $filename;                        
                        $imagen->creado = date("Y-m-d H:i:s");                        
                        array_push($array_imagenes, $imagen);
                    }
                }
                $this->Articulos->afterDelete(new Event('Model.Articulos'),$articulo, new \ArrayObject());
                $articulo->imagenes = $array_imagenes;
                if ($this->Articulos->save($articulo)) {  
                }
                else{
                    $this->Flash->error(__('La imágen no pudo ser guardada.'));
                }
                /*if(!empty($this->request->data['palabras_claves'])){
                    $array_palabras_claves = [];
                    $tags = explode(',',$this->request->data['palabras_claves']);
                    foreach($tags as $tag){                        
                        $palabra_clave_existente = TableRegistry::get('PalabrasClaves')->findByTexto($tag)->first();
                        if($palabra_clave_existente){
                            $palabra_clave = $palabra_clave_existente;
                        }
                        else{
                            $palabra_clave = TableRegistry::get('PalabrasClaves')->newEntity();
                            $palabra_clave->texto = $tag;
                            $palabra_clave->creado = date("Y-m-d H:i:s");
                        }

                        array_push($array_palabras_claves,$palabra_clave);
                    }
                    $articulo = $this->Articulos->get($articulo->id);
                    $articulo->palabras_claves = $array_palabras_claves;
                    $this->Articulos->save($articulo);
                }
                */
                $this->Flash->success(__('El artículo ha sido guardado.'));
                return $this->redirect(['action' => 'index']);
            }
            else{
                $this->Flash->error(__('El no fue guardado. Intente nuevamente.'));   
            }
            
        }
        $zonas = $this->getZonas();
        $this->set(compact('articulo','zonas'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Articulo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $articulo = $this->Articulos->get($id, [
            'contain' => ['Imagenes']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $articulo = $this->Articulos->patchEntity($articulo, $this->request->data);
            $articulo->modificado = date("Y-m-d H:i:s");
            if ($this->Articulos->save($articulo)) {                                
                $array_imagenes = [];
                if(!empty($this->request->data['filename'])){
                    foreach($this->request->data['filename'] as $imagen_a_guardar){
                        $imagen = TableRegistry::get('Imagenes')->newEntity();
                        $imagen = TableRegistry::get('Imagenes')->patchEntity($imagen, $this->request->data);
                        $filename = [
                            'error' => $imagen_a_guardar['error'],
                            'name' => $imagen_a_guardar['name'],
                            'size' => $imagen_a_guardar['size'],
                            'tmp_name' => $imagen_a_guardar['tmp_name'],
                            'type' => $imagen_a_guardar['type']
                        ];                          
                        $imagen->filename = $filename;                        
                        $imagen->creado = date("Y-m-d H:i:s");                        
                        array_push($array_imagenes, $imagen);
                    } 
                }
                $this->Articulos->afterDelete(new Event('Model.Articulos'),$articulo, new \ArrayObject());
                $articulo->imagenes = $array_imagenes;
                $this->Articulos->save($articulo);
                
                /*$array_palabras_claves = [];
                if(!empty($this->request->data['palabras_claves_'])){                    
                    $tags = explode(',',$this->request->data['palabras_claves_']);
                    foreach($tags as $tag){                        
                        $palabra_clave_existente = TableRegistry::get('PalabrasClaves')->findByTexto($tag)->first();
                        if($palabra_clave_existente){
                            $palabra_clave = $palabra_clave_existente;
                        }
                        else{
                            $palabra_clave = TableRegistry::get('PalabrasClaves')->newEntity();
                            $palabra_clave->texto = $tag;
                            $palabra_clave->creado = date("Y-m-d H:i:s");
                        }

                        array_push($array_palabras_claves,$palabra_clave);
                    }
                }
                $articulo = $this->Articulos->get($articulo->id);
                $articulo->palabras_claves = $array_palabras_claves;
                $this->Articulos->save($articulo);*/
                
                $this->Flash->success(__('El artículo ha sido guardado.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('El artículo no pudo ser guardado. Intente nuevamente.'));
            }
        }
        //$categorias = $this->Articulos->Categorias->find('list', ['limit' => 200]);
        //$portales = $this->Articulos->Portales->find('list', ['limit' => 200]);
        $imagenes = $this->Articulos->Imagenes->find('list', ['limit' => 200]);
        $zonas = $this->getZonas();
        $this->set(compact('articulo','zonas'));
        $this->set('_serialize', ['articulo']);
    }


    /**
     * Delete method
     *
     * @param string|null $id Articulo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $articulo = $this->Articulos->get($id, [
            'contain' => ['Imagenes']
        ]);
        if ($this->Articulos->delete($articulo)) {
            $this->Flash->success(__('El artículo ha sido borrado.'));
        } else {
            $this->Flash->error(__('El artículo no pudo ser borrado. Intente nuevamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
