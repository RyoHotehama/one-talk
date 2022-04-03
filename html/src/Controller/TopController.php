<?php
declare(strict_types=1);

namespace App\Controller;

use Exception;
use Cake\Event\EventInterface;

class TopController extends BaseController {

  public function initialize(): void
  {
    parent::initialize()

    //必要なモデルをロード
    $this->loadModel('Users');
    $this->loadModel('Petition');
    $this->loadModel('Consent');
    $this->loadModel('Talk');

    //ログインしているユーザーをauthuserに登録
    $this->set('authuser', $this->Auth->user());
  }

  public function index()
  {

  }

  public function good()
  {

  }
}