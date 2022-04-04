<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Auth\DefaultPasswordHasher;
use Cake\Event\EventInterface;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function initialize():void
    {
        parent::initialize();

        //タイムゾーンを設定
        date_default_timezone_set('Asia/Tokyo');

        //各種コンポーネントのロード
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authorize' => ['Controller'],
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'authError' => 'ログインしてください'
        ]);

        //ログインしているユーザーをauthuserに登録
        $this->set('authuser', $this->Auth->user());

    }

    //ログイン処理
    function login()
    {
        //Post時の処理
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            //Authのidentifyをユーザーに設定
            if (!empty($user)) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('メールアドレスかパスワードが間違っています');
        }
    }

    //ログアウト処理
    public function logout()
    {
        //セッションを破棄
        //$this->request->session()->destroy();
        return $this->redirect($this->Auth->logout());
    }

    //認証ページを使わないページの設定
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['login', 'index', 'add', 'edit', 'profile']);
    }

    //認証時のロールチェック
    public function isAuthorized($user = null)
    {
        //管理者はtrue
        if ($user['role'] === 1) {
            return true;
        }

        //一般ユーザーはfalse
        if ($user['role'] === 0) {
            return false;
        }

        //他は全てfalse
        return false;
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Consent', 'Petition', 'Talks'],
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {

            //データの取得
            $new_data = $this->request->getData();

            //写真の保存
            if(isset($_FILES['image_1']['name'])) {
                $image1 = date('YmdHis') . $_FILES['image_1']['name'];
                move_uploaded_file($_FILES['image_1']['tmp_name'],
            '../webroot/img/' . $image1);
                $new_data['image_1'] = $image1;
            }

            if(isset($_FILES['image_2']['name'])) {
                $image2 = date('YmdHis') . $_FILES['image_2']['name'];
                move_uploaded_file($_FILES['image_2']['tmp_name'],
            '../webroot/img/' . $image2);
                $new_data['image_2'] = $image2;
            }
            
            if(isset($_FILES['image_3']['name'])) {
                $image3 = date('YmdHis') . $_FILES['image_3']['name'];
                move_uploaded_file($_FILES['image_3']['tmp_name'],
            '../webroot/img/' . $image3);
                $new_data['image_3'] = $image3;
            }
            
            if(isset($_FILES['image_4']['name'])) {
                $image4 = date('YmdHis') . $_FILES['image_4']['name'];
                move_uploaded_file($_FILES['image_4']['tmp_name'],
            '../webroot/img/' . $image4);
                $new_data['image_4'] = $image4;
            }

            if(isset($_FILES['image_5']['name'])) {
                $image5 = date('YmdHis') . $_FILES['image_5']['name'];
                move_uploaded_file($_FILES['image_5']['tmp_name'],
            '../webroot/img/' . $image5);
                $new_data['image_5'] = $image5;
            }
            
            //データの登録
            $user = $this->Users->patchEntity($user, $new_data);
            if ($this->Users->save($user)) {
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('うまく作成できませんでした。'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function profile()
    {
        $user = $this->Users->get($this->Auth->user('id'));
        
        $this->set(compact('user'));
    }
}
