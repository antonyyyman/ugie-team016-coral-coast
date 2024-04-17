<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\CarRental> $carRentals
 */
?>

<div class="row">
            <?= $this->element('headerstaff') ?>
</div> 

<div class="carRentals index content" style="padding-top: 10%">
    <?= $this->Html->link(__('New Car Rental'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Car Rentals') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('company') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th><?= $this->Paginator->sort('plate') ?></th>
                    <th><?= $this->Paginator->sort('brand') ?></th>
                    <th><?= $this->Paginator->sort('price') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($carRentals as $carRental): ?>
                <tr>
                    <td><?= $this->Number->format($carRental->id) ?></td>
                    <td><?= h($carRental->company) ?></td>
                    <td><?= h($carRental->description) ?></td>
                    <td><?= h($carRental->plate) ?></td>
                    <td><?= h($carRental->brand) ?></td>
                    <td><?= $carRental->price === null ? '' : $this->Number->format($carRental->price) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $carRental->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $carRental->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $carRental->id], ['confirm' => __('Are you sure you want to delete # {0}?', $carRental->id)]) ?>
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
