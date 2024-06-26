<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TravelDeal $travelDeal
 */
?>

<head>
<style>
        header {
            margin-bottom: 20px;
        }
        .content-container {
            padding-top: 20px;
        }
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }
        main {
            flex: 1; 
            padding: 100px; 
        }
        .spacer-for-fixed-header {
        height: 100px; 
        }

</style>
</head>

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
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($travelDeal->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($travelDeal->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Insurance') ?></th>
                    <td><?= $travelDeal->hasValue('insurance') ? $this->Html->link($travelDeal->insurance->description, ['controller' => 'Insurances', 'action' => 'view', $travelDeal->insurance->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Hotel') ?></th>
                    <td><?= $travelDeal->hasValue('hotel') ? $this->Html->link($travelDeal->hotel->name, ['controller' => 'Hotels', 'action' => 'view', $travelDeal->hotel->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Car Rental') ?></th>
                    <td><?= $travelDeal->hasValue('car_rental') ? $this->Html->link($travelDeal->car_rental->plate, ['controller' => 'CarRentals', 'action' => 'view', $travelDeal->car_rental->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Translation') ?></th>
                    <td><?= $travelDeal->hasValue('translation') ? $this->Html->link($travelDeal->translation->description, ['controller' => 'Translations', 'action' => 'view', $travelDeal->translation->id]) : '' ?></td>
                </tr>

                <tr>
                    <th><?= __('Cruise') ?></th>
                    <td><?=$travelDeal->hasValue('cruise') ? $this->Html->link($travelDeal->cruise->description, ['controller' => 'Cruises', 'action' => 'view', $travelDeal->cruise->id]) : 'N/A' ?></td>
                </tr>
                <tr>
                    <th><?=__('Flights')?></th>
                    <td><?php if (!empty($travelDeal->flights)): ?>
                            <ul>
                                <?php foreach ($travelDeal->flights as $flight): ?>
                                    <li><?= $this->Html->link(h($flight->number), ['controller' => 'Flights', 'action' => 'view', $flight->id]) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            N/A
                        <?php endif; ?></td>
                </tr>
                <tr>
                    <th><?= __('Start Date') ?></th>
                    <td><?= h($travelDeal->start_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('End Date') ?></th>
                    <td><?= h($travelDeal->end_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Total Price') ?></th>
                    <td><?= $travelDeal->total_price === null ? '' : $this->Number->format($travelDeal->total_price) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
