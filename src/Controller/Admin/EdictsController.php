<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Edicts Controller
 *
 * @property \App\Model\Table\EdictsTable $Edicts
 * @method \App\Model\Entity\Edict[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EdictsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Owners'],
        ];

        $edicts = $this->paginate($this->Edicts);

        $this->set(compact('edicts'));
    }

    /**
     * View method
     *
     * @param string|null $id Edict id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $edict = $this->Edicts->get($id, [
            'contain' => ['Owners', 'Users', 'Categories', 'Parameters', 'Tasks', 'Ideas'],
        ]);

        $this->set(compact('edict'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $edict = $this->Edicts->newEmptyEntity();
        if ($this->request->is('post')) {
            $edict = $this->Edicts->patchEntity($edict, $this->request->getData());
            if ($this->Edicts->save($edict)) {
                $this->Flash->success(__('The edict has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The edict could not be saved. Please, try again.'));
        }
        $users = $this->Edicts->Users->find('list', ['limit' => 200]);
        $categories = $this->Edicts->Categories->find('list', ['limit' => 200]);
        $parameters = $this->Edicts->Parameters->find('list', ['limit' => 200]);
        $tasks = $this->Edicts->Tasks->find('list', ['limit' => 200]);
        $this->set(compact('edict', 'users', 'categories', 'parameters', 'tasks'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Edict id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $edict = $this->Edicts->get($id, [
            'contain' => ['Owners', 'Users', 'Categories', 'Parameters', 'Tasks'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $edict = $this->Edicts->patchEntity($edict, $this->request->getData());
            if ($this->Edicts->save($edict)) {
                $this->Flash->success(__('The edict has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The edict could not be saved. Please, try again.'));
        }
        $users = $this->Edicts->Users->find('list', ['limit' => 200]);
        $categories = $this->Edicts->Categories->find('list', ['limit' => 200]);
        $parameters = $this->Edicts->Parameters->find('list', ['limit' => 200]);
        $tasks = $this->Edicts->Tasks->find('list', ['limit' => 200]);
        $this->set(compact('edict', 'users', 'categories', 'parameters', 'tasks'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Edict id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $edict = $this->Edicts->get($id);
        if ($this->Edicts->delete($edict)) {
            $this->Flash->success(__('The edict has been deleted.'));
        } else {
            $this->Flash->error(__('The edict could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
