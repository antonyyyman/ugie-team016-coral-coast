<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TravelDeal $travelDeal
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Travel Deal'), ['action' => 'edit', $travelDeal->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Travel Deal'), ['action' => 'delete', $travelDeal->id], ['confirm' => __('Are you sure you want to delete # {0}?', $travelDeal->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Travel Deals'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Travel Deal'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="travelDeals view content">
            <h3><?= h($travelDeal->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($travelDeal->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Insurance') ?></th>
                    <td><?= $travelDeal->hasValue('insurance') ? $this->Html->link($travelDeal->insurance->id, ['controller' => 'Insurances', 'action' => 'view', $travelDeal->insurance->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Hotel') ?></th>
                    <td><?= $travelDeal->hasValue('hotel') ? $this->Html->link($travelDeal->hotel->name, ['controller' => 'Hotels', 'action' => 'view', $travelDeal->hotel->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Car Rental') ?></th>
                    <td><?= $travelDeal->hasValue('car_rental') ? $this->Html->link($travelDeal->car_rental->id, ['controller' => 'CarRentals', 'action' => 'view', $travelDeal->car_rental->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Translation') ?></th>
                    <td><?= $travelDeal->hasValue('translation') ? $this->Html->link($travelDeal->translation->id, ['controller' => 'Translations', 'action' => 'view', $travelDeal->translation->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Flight') ?></th>
                    <td><?= $travelDeal->hasValue('flight') ? $this->Html->link($travelDeal->flight->id, ['controller' => 'Flights', 'action' => 'view', $travelDeal->flight->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($travelDeal->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Total Price') ?></th>
                    <td><?= $travelDeal->total_price === null ? '' : $this->Number->format($travelDeal->total_price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Start Date') ?></th>
                    <td><?= h($travelDeal->start_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('End Date') ?></th>
                    <td><?= h($travelDeal->end_date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
