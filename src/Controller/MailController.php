<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
use Cake\Http\Response;
use Cake\Datasource\ConnectionManager;
use Cake\Mailer\Email;

/**
 * Backend Controller
 *
 *
 * @method \App\Model\Entity\Backend[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MailController extends AppController
{
    public function initialize(){
        parent::initialize();

        $this->loadComponent('RequestHandler');
        }
    
    public function beforeFilter(Event $event)
    {
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        //$this->Auth->allow(['add', 'logout']);
        $this->Auth->allow(['send']);
        $this->set('title_for_layout', "Diario digital");
        $this->viewBuilder()->setLayout('frontend');
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function send(){
        if ($this->request->is('post')) {
            $Email = new Email('default');
            $Email->from([$this->request->data['email'] => $this->request->data['nombre']])
                ->emailFormat('html')
                ->to('enzocollado1996@gmail.com')
                ->subject('La data')
                ->send($this->request->data['mensaje'] . " <br/> <br/> Número de teléfono: ". $this->request->data['telefono']);
        }
    }
}
