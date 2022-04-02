<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users view content">
            <h3><?= h($user->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Username') ?></th>
                    <td><?= h($user->username) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($user->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Image 1') ?></th>
                    <td><?= h($user->image_1) ?></td>
                </tr>
                <tr>
                    <th><?= __('Image 2') ?></th>
                    <td><?= h($user->image_2) ?></td>
                </tr>
                <tr>
                    <th><?= __('Image 3') ?></th>
                    <td><?= h($user->image_3) ?></td>
                </tr>
                <tr>
                    <th><?= __('Image 4') ?></th>
                    <td><?= h($user->image_4) ?></td>
                </tr>
                <tr>
                    <th><?= __('Image 5') ?></th>
                    <td><?= h($user->image_5) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= $this->Number->format($user->role) ?></td>
                </tr>
                <tr>
                    <th><?= __('Del Flg') ?></th>
                    <td><?= $this->Number->format($user->del_flg) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($user->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated') ?></th>
                    <td><?= h($user->updated) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Consent') ?></h4>
                <?php if (!empty($user->consent)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Your Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->consent as $consent) : ?>
                        <tr>
                            <td><?= h($consent->id) ?></td>
                            <td><?= h($consent->user_id) ?></td>
                            <td><?= h($consent->your_id) ?></td>
                            <td><?= h($consent->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Consent', 'action' => 'view', $consent->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Consent', 'action' => 'edit', $consent->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Consent', 'action' => 'delete', $consent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $consent->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Petition') ?></h4>
                <?php if (!empty($user->petition)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Your Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->petition as $petition) : ?>
                        <tr>
                            <td><?= h($petition->id) ?></td>
                            <td><?= h($petition->user_id) ?></td>
                            <td><?= h($petition->your_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Petition', 'action' => 'view', $petition->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Petition', 'action' => 'edit', $petition->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Petition', 'action' => 'delete', $petition->id], ['confirm' => __('Are you sure you want to delete # {0}?', $petition->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Talks') ?></h4>
                <?php if (!empty($user->talks)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Your Id') ?></th>
                            <th><?= __('Image') ?></th>
                            <th><?= __('Body') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->talks as $talks) : ?>
                        <tr>
                            <td><?= h($talks->id) ?></td>
                            <td><?= h($talks->user_id) ?></td>
                            <td><?= h($talks->your_id) ?></td>
                            <td><?= h($talks->image) ?></td>
                            <td><?= h($talks->body) ?></td>
                            <td><?= h($talks->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Talks', 'action' => 'view', $talks->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Talks', 'action' => 'edit', $talks->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Talks', 'action' => 'delete', $talks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $talks->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
