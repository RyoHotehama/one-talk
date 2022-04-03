<div class="profile form">
  <h3><?= h($user['username']); ?></h3>
  <?php if (!empty($user['image_1'])):
  echo $this->Html->image($user['image_1']);
  else:
  echo $this->Html->image('normal.png');
  endif;
  ?>
  <h4>一言：<?= h($user['title']); ?></h4>
  <div class="img-grep">
    <?php if (!empty($user['image_2'])): ?>
    <img src="<?= $user['image_2']; ?>">
    <?php else:
    echo $this->Html->image('noimage.jpg');
    endif;
    ?>
    <?php if (!empty($user['image_3'])): ?>
    <img src="<?= $user['image_3']; ?>">
    <?php else:
    echo $this->Html->image('noimage.jpg');
    endif;
    ?>
    <?php if (!empty($user['image_4'])): ?>
    <img src="<?= $user['image_4']; ?>">
    <?php else:
    echo $this->Html->image('noimage.jpg');
    endif;
    ?>
    <?php if (!empty($user['image_5'])): ?>
    <img src="<?= $user['image_5']; ?>">
    <?php else:
    echo $this->Html->image('noimage.jpg');
    endif;
    ?>
  </div>
</div>