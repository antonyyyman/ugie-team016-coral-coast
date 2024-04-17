<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Cruise> $cruises
 */
?>

<div class="row">
            <?= $this->element('headerstaff') ?>
</div> 

<div class="cruises index content" style="padding-top: 10%">
    <?= $this->Html->link(__('New Cruise'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Cruises') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('company') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th><?= $this->Paginator->sort('price') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cruises as $cruise): ?>
                <tr>
                    <td><?= $this->Number->format($cruise->id) ?></td>
                    <td><?= h($cruise->company) ?></td>
                    <td><?= h($cruise->description) ?></td>
                    <td><?= $cruise->price === null ? '' : $this->Number->format($cruise->price) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $cruise->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cruise->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cruise->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cruise->id)]) ?>
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
