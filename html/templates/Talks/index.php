<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Talk[]|\Cake\Collection\CollectionInterface $talks
 */
?>
<div class="talks index content">
    <?= $this->Html->link(__('New Talk'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Talks') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('your_id') ?></th>
                    <th><?= $this->Paginator->sort('image') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($talks as $talk): ?>
                <tr>
                    <td><?= $this->Number->format($talk->id) ?></td>
                    <td><?= $talk->has('user') ? $this->Html->link($talk->user->title, ['controller' => 'Users', 'action' => 'view', $talk->user->id]) : '' ?></td>
                    <td><?= $this->Number->format($talk->your_id) ?></td>
                    <td><?= h($talk->image) ?></td>
                    <td><?= h($talk->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $talk->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $talk->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $talk->id], ['confirm' => __('Are you sure you want to delete # {0}?', $talk->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
