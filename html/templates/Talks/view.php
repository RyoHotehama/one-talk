<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Talk $talk
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Talk'), ['action' => 'edit', $talk->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Talk'), ['action' => 'delete', $talk->id], ['confirm' => __('Are you sure you want to delete # {0}?', $talk->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Talks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Talk'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="talks view content">
            <h3><?= h($talk->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $talk->has('user') ? $this->Html->link($talk->user->title, ['controller' => 'Users', 'action' => 'view', $talk->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Image') ?></th>
                    <td><?= h($talk->image) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($talk->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Your Id') ?></th>
                    <td><?= $this->Number->format($talk->your_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($talk->created) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Body') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($talk->body)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
