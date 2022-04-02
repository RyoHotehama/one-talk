<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Talks Controller
 *
 * @property \App\Model\Table\TalksTable $Talks
 * @method \App\Model\Entity\Talk[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TalksController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Yours'],
        ];
        $talks = $this->paginate($this->Talks);

        $this->set(compact('talks'));
    }

    /**
     * View method
     *
     * @param string|null $id Talk id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $talk = $this->Talks->get($id, [
            'contain' => ['Users', 'Yours'],
        ]);

        $this->set(compact('talk'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $talk = $this->Talks->newEmptyEntity();
        if ($this->request->is('post')) {
            $talk = $this->Talks->patchEntity($talk, $this->request->getData());
            if ($this->Talks->save($talk)) {
                $this->Flash->success(__('The talk has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The talk could not be saved. Please, try again.'));
        }
        $users = $this->Talks->Users->find('list', ['limit' => 200])->all();
        $yours = $this->Talks->Yours->find('list', ['limit' => 200])->all();
        $this->set(compact('talk', 'users', 'yours'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Talk id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $talk = $this->Talks->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $talk = $this->Talks->patchEntity($talk, $this->request->getData());
            if ($this->Talks->save($talk)) {
                $this->Flash->success(__('The talk has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The talk could not be saved. Please, try again.'));
        }
        $users = $this->Talks->Users->find('list', ['limit' => 200])->all();
        $yours = $this->Talks->Yours->find('list', ['limit' => 200])->all();
        $this->set(compact('talk', 'users', 'yours'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Talk id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $talk = $this->Talks->get($id);
        if ($this->Talks->delete($talk)) {
            $this->Flash->success(__('The talk has been deleted.'));
        } else {
            $this->Flash->error(__('The talk could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
