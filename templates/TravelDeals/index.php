<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\TravelDeal> $travelDeals
 */
?>
<div class="travelDeals index content">
    <?= $this->Html->link(__('New Travel Deal'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Travel Deals') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('start_date') ?></th>
                    <th><?= $this->Paginator->sort('end_date') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th><?= $this->Paginator->sort('total_price') ?></th>
                    <th><?= $this->Paginator->sort('insurance_id') ?></th>
                    <th><?= $this->Paginator->sort('hotel_id') ?></th>
                    <th><?= $this->Paginator->sort('cruise_id') ?></th>
                    <th><?= $this->Paginator->sort('car_rental_id') ?></th>
                    <th><?= $this->Paginator->sort('translation_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($travelDeals as $travelDeal): ?>
                <tr>
                    <td><?= $this->Number->format($travelDeal->id) ?></td>
                    <td><?= h($travelDeal->start_date) ?></td>
                    <td><?= h($travelDeal->end_date) ?></td>
                    <td><?= h($travelDeal->description) ?></td>
                    <td><?= $travelDeal->total_price === null ? '' : $this->Number->format($travelDeal->total_price) ?></td>
                    <td><?= $travelDeal->hasValue('insurance') ? $this->Html->link($travelDeal->insurance->supplier, ['controller' => 'Insurances', 'action' => 'view', $travelDeal->insurance->id]) : 'N/A' ?></td>
                    <td><?= $travelDeal->hasValue('hotel') ? $this->Html->link($travelDeal->hotel->name, ['controller' => 'Hotels', 'action' => 'view', $travelDeal->hotel->id]) : 'N/A' ?></td>
                    <td><?= $travelDeal->hasValue('cruise') ? $this->Html->link($travelDeal->cruise->description, ['controller' => 'Cruises', 'action' => 'view', $travelDeal->cruise->id]) : 'N/A' ?></td>
                    <td><?= $travelDeal->hasValue('car_rental') ? $this->Html->link($travelDeal->car_rental->plate, ['controller' => 'CarRentals', 'action' => 'view', $travelDeal->car_rental->id]) : 'N/A' ?></td>
                    <td><?= $travelDeal->hasValue('translation') ? $this->Html->link($travelDeal->translation->description, ['controller' => 'Translations', 'action' => 'view', $travelDeal->translation->id]) : 'N/A' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $travelDeal->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $travelDeal->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $travelDeal->id], ['confirm' => __('Are you sure you want to delete # {0}?', $travelDeal->id)]) ?>
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
