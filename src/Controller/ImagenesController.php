<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Imagenes Controller
 *
 * @property \App\Model\Table\ImagenesTable $Imagenes
 *
 * @method \App\Model\Entity\Imagen[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ImagenesController extends AppController
{
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
            if ($this->Imagenes->save($imagen)) {
                $this->Flash->success(__('The imagen has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The imagen could not be saved. Please, try again.'));
        }
        $this->set(compact('imagen'));
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
            if ($this->Imagenes->save($imagen)) {
                $this->Flash->success(__('The imagen has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The imagen could not be saved. Please, try again.'));
        }
        $this->set(compact('imagen'));
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
            $this->Flash->success(__('The imagen has been deleted.'));
        } else {
            $this->Flash->error(__('The imagen could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
