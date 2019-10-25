<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
use Cake\Http\Response;
use Cake\Datasource\ConnectionManager;
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
        $this->Videos = TableRegistry::get('Videos');
    }
    
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        //$this->Auth->allow(['add', 'logout']);
        $this->Auth->allow(['index', 'verArticulo', 'verSeccion', 'buscarNota', 'buscarVideo','categoria','sendmail']);
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
        $connection = ConnectionManager::get('default');
        $gifsociales = $connection->execute('SELECT * FROM imagenes where tipo = :tipo order by id DESC LIMIT 1', ['tipo' => 'GIF SOCIALES'])->fetchAll('assoc');

        $articulos_sociales = $this->Articulos->find('all', [
            'order' => ['publicado' => 'desc'],
            'limit' => 10
        ])
            ->contain(['Imagenes'])
            ->select(['Articulos.id', 'Articulos.titulo','Articulos.texto', 'Articulos.publicado', 'Articulos.palabras_claves','Articulos.slug'])
            ->where(['zona' => 'SOCIALES', 'habilitado' => true])
            ->toArray();

            $publicidades_sociales = $this->Publicidades->find('all',[
            'order' => ['orden' => 'asc'],
            'limit' => 0
            ])
            ->contain(['Imagenes'])
            ->where(['Publicidades.zona' => 'SOCIALES', 'Publicidades.habilitado' => true,'Publicidades.tipo'=>'RULETA'])
            ->toArray();
            if(count($publicidades_sociales) > 0){
                foreach($publicidades_sociales as $publicidad_sociales){
                    $publicidades_sociales = $this->insert($articulos_centro, $publicidad_sociales->orden - 1, $publicidad_sociales);            
                }
            }

        $articulos_centro = $this->Articulos->find('all', [
                            'order' => ['publicado' => 'desc'],
                            'limit' => 10
                        ])
                ->contain(['Imagenes'])
                ->select(['Articulos.id', 'Articulos.titulo','Articulos.texto', 'Articulos.publicado', 'Articulos.palabras_claves','Articulos.slug'])
                ->where(['zona' => 'CENTRO', 'habilitado' => true])
                ->toArray();
        
        $publicidades_centro = $this->Publicidades->find('all',[
                'order' => ['orden' => 'asc'],
                'limit' => 0
                ])
                ->contain(['Imagenes'])
                ->where(['Publicidades.zona' => 'CENTRO', 'Publicidades.habilitado' => true,'Publicidades.tipo'=>'RULETA'])
                ->toArray();
        
        //Completo los articulos con publicidades
        if(count($articulos_centro) > 0){
            foreach($publicidades_centro as $publicidad_centro){
                $articulos_centro = $this->insert($articulos_centro, $publicidad_centro->orden - 1, $publicidad_centro);            
            }
        }
        
        $articulos_norte = $this->Articulos->find('all', [
                            'order' => ['publicado' => 'desc'],
                            'limit' => 10
                        ])
                ->contain(['Imagenes'])
                ->select(['Articulos.id', 'Articulos.titulo', 'Articulos.texto', 'Articulos.publicado', 'Articulos.palabras_claves','Articulos.slug'])
                ->where(['zona' => 'NORTE', 'habilitado' => true])
                ->toArray();
        
        $publicidades_norte = $this->Publicidades->find('all',[
                'order' => ['orden' => 'asc'],
                'limit' => 0
                ])
                ->contain(['Imagenes'])
                ->where(['Publicidades.zona' => 'NORTE', 'Publicidades.habilitado' => true,'Publicidades.tipo'=>'RULETA'])
                ->toArray();
        
        //Completo los articulos con publicidades
        if(count($articulos_norte) > 0){
            foreach($publicidades_norte as $publicidad_norte){
                $articulos_norte = $this->insert($articulos_norte, $publicidad_norte->orden - 1, $publicidad_norte);            
            }
        }
        
        $articulos_sur = $this->Articulos->find('all', [
                            'order' => ['publicado' => 'desc'],
                            'limit' => 10
                        ])
                ->contain(['Imagenes'])
                ->select(['Articulos.id', 'Articulos.titulo', 'Articulos.texto', 'Articulos.publicado', 'Articulos.palabras_claves','Articulos.slug'])
                ->where(['zona' => 'SUR', 'habilitado' => true])
                ->toArray();
        
        $publicidades_sur = $this->Publicidades->find('all',[
                'order' => ['orden' => 'asc'],
                'limit' => 0
                ])
                ->contain(['Imagenes'])
                ->where(['Publicidades.zona' => 'SUR', 'Publicidades.habilitado' => true,'Publicidades.tipo'=>'RULETA'])
                ->toArray();

        //Completo los articulos con publicidades
        if(count($articulos_sur) > 0){
           foreach($publicidades_sur as $publicidad_sur){
                $articulos_sur = $this->insert($articulos_sur, $publicidad_sur->orden - 1, $publicidad_sur);            
            } 
        }        
        
        $articulos_general = $this->Articulos->find('all', [
                            'order' => ['publicado' => 'desc'],
                            'limit' => 8
                        ])
                ->select(['Articulos.id', 'Articulos.titulo', 'Articulos.publicado','Articulos.slug', 'Articulos.palabras_claves'])
                ->contain(['Imagenes'])
                ->where(['zona' => 'GENERAL', 'habilitado' => true])
                ->toArray();
        
        $publicidades_general = $this->Publicidades->find('all',[
                'order' => ['orden' => 'asc'],
                'limit' => 100
                ])
                ->contain(['Imagenes'])
                ->where(['Publicidades.zona' => 'GENERAL', 'Publicidades.habilitado' => true,'Publicidades.tipo'=>'RULETA'])
                ->toArray();
        
        //Completo los articulos con publicidades
        if(count($articulos_general) > 0){
           foreach($publicidades_general as $publicidad_general){
                $articulos_general = $this->insert($articulos_general, $publicidad_general->orden - 1, $publicidad_general);            
            } 
        } 
        
        $publicidad_inicial = $this->Publicidades->find('all')
                ->contain(['Imagenes', 'Videos'])
                ->where(['Publicidades.tipo' => 'INICIAL', 'Publicidades.habilitado' => true])
                ->first();
        $this->set(compact('articulos_centro','articulos_sur','articulos_norte',
                'articulos_general','articulos_sociales', 'publicidad_inicial', 'gifsociales'));
    
        $detector = new \Detection\MobileDetect();
        if($this->RequestHandler->isMobile()){
            $this->render('index');
        }
        else{
            $this->viewBuilder()->setLayout('desktop_frontend');
            $this->render('desktop');
        }

        /*if($this->RequestHandler->isMobile()){
            $this->render('index');
        }
        else{
            $this->viewBuilder()->setLayout('desktop_frontend');
            $this->render('desktop');
        }*/
        
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
        $connection = ConnectionManager::get('default');
        $gifsociales = $connection->execute('SELECT * FROM imagenes where tipo = :tipo order by id DESC LIMIT 1', ['tipo' => 'GIF SOCIALES'])->fetchAll('assoc');
        $articulo = $this->Articulos->findBySlug($slug)->contain(['Imagenes'])->first();

        $articulos = $this->Articulos->find('all', [
                            'order' => ['publicado' => 'asc'],
                            'limit' => 100
                        ])
                ->select(['Articulos.id', 'Articulos.titulo', 'Articulos.publicado', 'Articulos.palabras_claves','Articulos.slug','Articulos.linkpublicidad'])
                ->contain(['Imagenes'])
                ->where(['Articulos.zona' => $articulo->zona, 'Articulos.habilitado' => true, 'Articulos.id !=' =>$articulo->id])
                ->toArray();
        array_unshift($articulos,$articulo);
        $articulos_sociales = $this->Articulos->find('all', [
            'order' => ['publicado' => 'desc'],
            'limit' => 10
        ])
            ->contain(['Imagenes'])
            ->select(['Articulos.id', 'Articulos.titulo','Articulos.texto', 'Articulos.publicado', 'Articulos.palabras_claves','Articulos.slug'])
            ->where(['zona' => 'SOCIALES', 'habilitado' => true])
            ->toArray();
        $this->set(compact('articulos', $articulos, 'articulos_sociales','gifsociales'));

        $detector = new \Detection\MobileDetect();
        if($detector->isTablet()){
            $this->viewBuilder()->setLayout('desktop_frontend_detalle');
            $this->render('desktop_ver_articulo');
        }elseif($this->RequestHandler->isMobile() && !$detector->isTablet()){
            $this->render('ver_articulo');
        }
        else{
            $this->viewBuilder()->setLayout('desktop_frontend_detalle');
            $this->render('desktop_ver_articulo');
        }
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
        $this->render('ver-articulo');
    }

    /**
     * View method
     *
     * @param string|null $id categorias id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    public function categoria($categoria){
        $connection = ConnectionManager::get('default');
        $gifsociales = $connection->execute('SELECT * FROM imagenes where tipo = :tipo order by id DESC LIMIT 1', ['tipo' => 'GIF SOCIALES'])->fetchAll('assoc');
        if($this->request->query('page')){
            $page = $this->request->query('page') + 1;
        }else{
            $page = 1;
        }
        $articulo_categoria = $this->Articulos->find('all', [
            'order' => ['publicado' => 'desc'],
            'page' => $page,
            'limit' => 6
        ])
            ->contain(['Imagenes'])
            ->select(['Articulos.id', 'Articulos.titulo','Articulos.texto', 'Articulos.publicado', 'Articulos.palabras_claves','Articulos.slug','Articulos.descripcion'])
            ->where(['zona' => $categoria, 'habilitado' => true])
            ->toArray();
            if($this->request->query('request')){

                $this->set([
                    'my_response' => $articulo_categoria,
                    '_serialize' => 'my_response',
                ]);
                $this->RequestHandler->renderAs($this, 'json');
    
            }
    
            $publicidades_sociales = $this->Publicidades->find('all',[
            'order' => ['orden' => 'asc'],
            'limit' => 0
            ])
            ->contain(['Imagenes'])
            ->where(['Publicidades.zona' => 'SOCIALES', 'Publicidades.habilitado' => true,'Publicidades.tipo'=>'RULETA'])
            ->toArray();
            if(count($publicidades_sociales) > 0){
                foreach($publicidades_sociales as $publicidad_sociales){
                    $publicidades_sociales = $this->insert($articulos_centro, $publicidad_sociales->orden - 1, $publicidad_sociales);            
                }
            }
            $articulos_sociales = $this->Articulos->find('all', [
                'order' => ['publicado' => 'desc'],
                'limit' => 10
            ])
                ->contain(['Imagenes'])
                ->select(['Articulos.id', 'Articulos.titulo','Articulos.texto', 'Articulos.publicado', 'Articulos.palabras_claves','Articulos.slug'])
                ->where(['zona' => 'SOCIALES', 'habilitado' => true])
                ->toArray();
    
                $publicidades_sociales = $this->Publicidades->find('all',[
                'order' => ['orden' => 'asc'],
                'limit' => 0
                ])
                ->contain(['Imagenes'])
                ->where(['Publicidades.zona' => 'SOCIALES', 'Publicidades.habilitado' => true,'Publicidades.tipo'=>'RULETA'])
                ->toArray();
                if(count($publicidades_sociales) > 0){
                    foreach($publicidades_sociales as $publicidad_sociales){
                        $publicidades_sociales = $this->insert($articulos_centro, $publicidad_sociales->orden - 1, $publicidad_sociales);            
                    }
                }
    
            $this->set(compact('articulo_categoria','categoria','articulos_sociales','page','gifsociales'));
            $this->viewBuilder()->setLayout('categoria');
            $this->render('desktop');

    }
    public function buscarNota($query = null){
        $articulos = $this->Articulos->find('all', [
                            'order' => ['publicado' => 'asc'],
                            'limit' => 100
                        ])
                ->select([
                    'Articulos.id', 
                    'Articulos.titulo', 
                    'Articulos.descripcion',
                    'Articulos.texto',
                    'Articulos.publicado',
                    'Articulos.zona',
                    'Articulos.palabras_claves',
                    'Articulos.slug'])
                ->contain(['Imagenes'])
                ->where(['Articulos.titulo LIKE' => '%'.$query.'%'])
                ->orWhere(['Articulos.descripcion LIKE' => '%'.$query.'%'])
                ->orWhere(['Articulos.palabras_claves LIKE' => '%'.$query.'%'])
                ->toArray();

        $this->set('articulos', $articulos);
        $this->render('ver-articulo');
    }
    
    public function buscarVideo(){
        $video = $this->Videos->find('all', [
                            'order' => ['publicado' => 'desc']
                        ])
                ->first()
                ->toArray();
        
        $response = ['url'=>$video['nombre'], 'url_publicidad'=>$video['nombre_publicidad']];

        $this->set([
            'my_response' => $response,
            '_serialize' => 'my_response',
        ]);
        $this->RequestHandler->renderAs($this, 'json');
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
