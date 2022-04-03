<div class="users form">
  <?= $this->Flash->render('auth') ?>
  <?= $this->Form->create() ?>
  <fieldset>
    <legend>メールアドレスとパスワードを入力してください</legend>
    <?= $this->Form->control('email', ['label' => 'メールアドレス']) ?>
    <?= $this->Form->control('password', ['label' => 'パスワード']) ?>
  </fieldset>
  <?= $this->Form->button(__('ログイン')); ?>
  <?= $this->Form->end() ?>
</div>