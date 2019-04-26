<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CompanyUsers Controller
 *
 * @property \App\Model\Table\CompanyUsersTable $CompanyUsers
 *
 * @method \App\Model\Entity\CompanyUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CompanyUsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Companies', 'Users']
        ];
        $companyUsers = $this->paginate($this->CompanyUsers);

        $this->set(compact('companyUsers'));
    }

    /**
     * View method
     *
     * @param string|null $id Company User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $companyUser = $this->CompanyUsers->get($id, [
            'contain' => ['Companies', 'Users']
        ]);

        $this->set('companyUser', $companyUser);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $companyUser = $this->CompanyUsers->newEntity();
        if ($this->request->is('post')) {
            $companyUser = $this->CompanyUsers->patchEntity($companyUser, $this->request->getData());
            if ($this->CompanyUsers->save($companyUser)) {
                $this->Flash->success(__('The company user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The company user could not be saved. Please, try again.'));
        }
        $companies = $this->CompanyUsers->Companies->find('list', ['limit' => 200]);
        $users = $this->CompanyUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('companyUser', 'companies', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Company User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $companyUser = $this->CompanyUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $companyUser = $this->CompanyUsers->patchEntity($companyUser, $this->request->getData());
            if ($this->CompanyUsers->save($companyUser)) {
                $this->Flash->success(__('The company user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The company user could not be saved. Please, try again.'));
        }
        $companies = $this->CompanyUsers->Companies->find('list', ['limit' => 200]);
        $users = $this->CompanyUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('companyUser', 'companies', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Company User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $companyUser = $this->CompanyUsers->get($id);
        if ($this->CompanyUsers->delete($companyUser)) {
            $this->Flash->success(__('The company user has been deleted.'));
        } else {
            $this->Flash->error(__('The company user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
