<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Insurance> $insurances
 */
?>

<div class="row">
            <?= $this->element('headerstaff') ?>
</div> 

<div class="insurances index content" style="padding-top: 10%">
    <?= $this->Html->link(__('New Insurance'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Insurances') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('supplier') ?></th>
                    <th><?= $this->Paginator->sort('level') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th><?= $this->Paginator->sort('price') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($insurances as $insurance): ?>
                <tr>
                    <td><?= $this->Number->format($insurance->id) ?></td>
                    <td><?= h($insurance->supplier) ?></td>
                    <td><?= h($insurance->level) ?></td>
                    <td><?= h($insurance->description) ?></td>
                    <td><?= $insurance->price === null ? '' : $this->Number->format($insurance->price) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $insurance->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $insurance->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $insurance->id], ['confirm' => __('Are you sure you want to delete # {0}?', $insurance->id)]) ?>
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
