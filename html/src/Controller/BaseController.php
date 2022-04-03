<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Auth\DefaultPasswordHasher;
use Cake\Event\EventInterface;

class BaseController extends AppController
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
        $this->Auth->allow(['login', 'index', 'add', 'edit']);
    }

    //認証時のロールチェック
    public function isAuthorized($user = null)
    {
        //管理者はtrue
        if ($user['role'] === 1) {
            return true;
        }

        //一般ユーザーはTopControllerのみtrue
        if ($user['role'] === 0) {
          if ($this->name === 'Top') {
            return true;
          }
            return false;
        }

        //他は全てfalse
        return false;
    }
  }