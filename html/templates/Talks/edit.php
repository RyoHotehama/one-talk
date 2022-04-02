<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Talk $talk
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $talk->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $talk->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Talks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="talks form content">
            <?= $this->Form->create($talk) ?>
            <fieldset>
                <legend><?= __('Edit Talk') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('your_id');
                    echo $this->Form->control('image');
                    echo $this->Form->control('body');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
