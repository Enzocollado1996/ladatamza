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
        $this->Auth->allow(['index', 'verArticulo', 'verSeccion']);
        $this->set('title_for_layout', "Diario digital");
        $this->viewBuilder()->setLayout('frontend');
    }
    
    private function insert($array, $index, $val) { //function decleration
        $temp = array(); // this temp array will hold the value 
        $size = count($array); //because I am going to use this more than one time
        // Validation -- validate if index value is proper (you can omit this part)       
            if (!is_int($index) || $index < 0 || $index > $size) {
                echo "Error: Wrong index at Insert. Index: " . $index . " Current Size: " . $size;
                echo "<br/>";
                return false;
            }    
        //here is the actual insertion code
        //slice part of the array from 0 to insertion index
        $temp = array_slice($array, 0, $index);//e.g index=5, then slice will result elements [0-4]
        //add the value at the end of the temp array// at the insertion index e.g 5
        array_push($temp, $val);
        //reconnect the remaining part of the array to the current temp
        $temp = array_merge($temp, array_slice($array, $index, $size)); 
        $array = $temp;//swap// no need for this if you pass the array cuz you can simply return $temp, but, if u r using a class array for example, this is useful. 

         return $array; // you can return $temp instead if you don't use class array
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
                ->select(['Articulos.id', 'Articulos.titulo', 'Articulos.publicado', 'Articulos.palabras_claves','Articulos.slug'])
                ->where(['zona' => 'CENTRO', 'habilitado' => true])
                ->toArray();
        
        $publicidades_centro = $this->Publicidades->find('all',[
                'order' => ['orden' => 'asc'],
                'limit' => 100
                ])
                ->contain(['Imagenes'])
                ->where(['zona' => 'CENTRO', 'habilitado' => true])
                ->toArray();
        
        //Completo los articulos con publicidades
        foreach($publicidades_centro as $publicidad_centro){
            $articulos_centro = $this->insert($articulos_centro, $publicidad_centro->orden - 1, $publicidad_centro);            
        }
        
        $articulos_norte = $this->Articulos->find('all', [
                            'order' => ['publicado' => 'asc'],
                            'limit' => 100
                        ])
                ->select(['Articulos.id', 'Articulos.titulo', 'Articulos.publicado', 'Articulos.palabras_claves','Articulos.slug'])
                ->where(['zona' => 'NORTE', 'habilitado' => true])
                ->toArray();
        
        $publicidades_norte = $this->Publicidades->find('all',[
                'order' => ['orden' => 'asc'],
                'limit' => 100
                ])
                ->contain(['Imagenes'])
                ->where(['zona' => 'NORTE', 'habilitado' => true])
                ->toArray();
        
        //Completo los articulos con publicidades
        foreach($publicidades_norte as $publicidad_norte){
            $articulos_norte = $this->insert($articulos_norte, $publicidad_norte->orden - 1, $publicidad_norte);            
        }
        
        $articulos_sur = $this->Articulos->find('all', [
                            'order' => ['publicado' => 'asc'],
                            'limit' => 100
                        ])
                ->select(['Articulos.id', 'Articulos.titulo', 'Articulos.publicado', 'Articulos.palabras_claves','Articulos.slug'])
                ->where(['zona' => 'SUR', 'habilitado' => true])
                ->toArray();
        
        $publicidades_sur = $this->Publicidades->find('all',[
                'order' => ['orden' => 'asc'],
                'limit' => 100
                ])
                ->contain(['Imagenes'])
                ->where(['zona' => 'SUR', 'habilitado' => true])
                ->toArray();
        
        //Completo los articulos con publicidades
        foreach($publicidades_sur as $publicidad_sur){
            $articulos_sur = $this->insert($articulos_sur, $publicidad_sur->orden - 1, $publicidad_sur);            
        }
        
        $articulos_general = $this->Articulos->find('all', [
                            'order' => ['publicado' => 'asc'],
                            'limit' => 10
                        ])
                ->select(['Articulos.id', 'Articulos.titulo', 'Articulos.publicado','Articulos.slug'])
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
                'articulos_norte','articulos_general', 'publicidad_inicial'));
    }
    
    /**
     * View method
     *
     * @param string|null $id Backend id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function verArticulo($slug = null)
    {        
        $articulo = $this->Articulos->findBySlug($slug, [
            'contain' => ['Imagenes']
        ])->first();
        //$this->Articulos->recursive = 1;
        $articulos = $this->Articulos->find('all', [
                            'order' => ['publicado' => 'asc'],
                            'limit' => 100
                        ])
                //->select(['Articulos.id', 'Articulos.titulo', 'Articulos.publicado', 'Articulos.palabras_claves','Articulos.slug'])
                ->contain(['Imagenes'])
                ->where(['Articulos.zona' => $articulo->zona, 'Articulos.habilitado' => true, 'Articulos.id !=' =>$articulo->id])
                ->toArray();
        array_unshift($articulos,$articulo);
        $this->set('articulos', $articulos);
    }
    
    /**
     * View method
     *
     * @param string|null $id Backend id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function verSeccion($seccion = null)
    {
        /*$articulo = $this->Articulos->findBySlug($slug, [
            'contain' => ['Imagenes']
        ])->first();*/
        $articulos = $this->Articulos->find('all', [
                            'order' => ['publicado' => 'asc'],
                            'limit' => 100
                        ])
                //->select(['Articulos.id', 'Articulos.titulo', 'Articulos.publicado', 'Articulos.palabras_claves','Articulos.slug'])
                ->contain(['Imagenes'])
                ->where(['zona' => $seccion, 'habilitado' => true])
                ->toArray();
        $this->set('articulos', $articulos);
        //echo '<pre>';
        //var_dump($articulos);
        //exit;
        $this->render('ver-articulo');
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
