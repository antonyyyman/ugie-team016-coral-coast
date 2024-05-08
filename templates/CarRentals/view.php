<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CarRental $carRental
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
            <?= $this->Html->link(__('Edit Car Rental'), ['action' => 'edit', $carRental->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Car Rental'), ['action' => 'delete', $carRental->id], ['confirm' => __('Are you sure you want to delete # {0}?', $carRental->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Car Rentals'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Car Rental'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="carRentals view content">
            <h3><?= h($carRental->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Company') ?></th>
                    <td><?= h($carRental->company) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($carRental->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Plate') ?></th>
                    <td><?= h($carRental->plate) ?></td>
                </tr>
                <tr>
                    <th><?= __('Brand') ?></th>
                    <td><?= h($carRental->brand) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($carRental->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price') ?></th>
                    <td><?= $carRental->price === null ? '' : $this->Number->format($carRental->price) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Bookings') ?></h4>
                <?php if (!empty($carRental->bookings)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Start Date') ?></th>
                            <th><?= __('End Date') ?></th>
                            <th><?= __('Destination') ?></th>
                            <th><?= __('Insurance Id') ?></th>
                            <th><?= __('Hotel Id') ?></th>
                            <th><?= __('Car Rental Id') ?></th>
                            <th><?= __('Translation Id') ?></th>
                            <th><?= __('Flight Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($carRental->bookings as $booking) : ?>
                        <tr>
                            <td><?= h($booking->id) ?></td>
                            <td><?= h($booking->user_id) ?></td>
                            <td><?= h($booking->start_date) ?></td>
                            <td><?= h($booking->end_date) ?></td>
                            <td><?= h($booking->destination) ?></td>
                            <td><?= h($booking->insurance_id) ?></td>
                            <td><?= h($booking->hotel_id) ?></td>
                            <td><?= h($booking->car_rental_id) ?></td>
                            <td><?= h($booking->translation_id) ?></td>
                            <td><?= h($booking->flight_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Bookings', 'action' => 'view', $booking->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Bookings', 'action' => 'edit', $booking->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Bookings', 'action' => 'delete', $booking->id], ['confirm' => __('Are you sure you want to delete # {0}?', $booking->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Travel Deals') ?></h4>
                <?php if (!empty($carRental->travel_deals)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Start Date') ?></th>
                            <th><?= __('End Date') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Total Price') ?></th>
                            <th><?= __('Insurance Id') ?></th>
                            <th><?= __('Hotel Id') ?></th>
                            <th><?= __('Car Rental Id') ?></th>
                            <th><?= __('Translation Id') ?></th>
                            <th><?= __('Flight Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($carRental->travel_deals as $travelDeal) : ?>
                        <tr>
                            <td><?= h($travelDeal->id) ?></td>
                            <td><?= h($travelDeal->start_date) ?></td>
                            <td><?= h($travelDeal->end_date) ?></td>
                            <td><?= h($travelDeal->description) ?></td>
                            <td><?= h($travelDeal->total_price) ?></td>
                            <td><?= h($travelDeal->insurance_id) ?></td>
                            <td><?= h($travelDeal->hotel_id) ?></td>
                            <td><?= h($travelDeal->car_rental_id) ?></td>
                            <td><?= h($travelDeal->translation_id) ?></td>
                            <td><?= h($travelDeal->flight_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'TravelDeals', 'action' => 'view', $travelDeal->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'TravelDeals', 'action' => 'edit', $travelDeal->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'TravelDeals', 'action' => 'delete', $travelDeal->id], ['confirm' => __('Are you sure you want to delete # {0}?', $travelDeal->id)]) ?>
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
