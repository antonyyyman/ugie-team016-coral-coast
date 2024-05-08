<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Hotel $hotel
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
            <?= $this->Html->link(__('Edit Hotel'), ['action' => 'edit', $hotel->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Hotel'), ['action' => 'delete', $hotel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $hotel->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Hotels'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Hotel'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="hotels view content">
            <h3><?= h($hotel->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($hotel->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Location') ?></th>
                    <td><?= h($hotel->location) ?></td>
                </tr>
                <tr>
                    <th><?= __('Telephone') ?></th>
                    <td><?= h($hotel->telephone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($hotel->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price') ?></th>
                    <td><?= $hotel->price === null ? '' : $this->Number->format($hotel->price) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Bookings') ?></h4>
                <?php if (!empty($hotel->bookings)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Start Date') ?></th>
                            <th><?= __('End Date') ?></th>
                            <th><?= __('Destination') ?></th>
                            <th><?= __('Hotel Id') ?></th>
                            <th><?= __('Car Rental Id') ?></th>
                            <th><?= __('Insurance Id') ?></th>
                            <th><?= __('Translation Id') ?></th>
                            <th><?= __('Payment Id') ?></th>
                            <th><?= __('Travel Deal Id') ?></th>
                            <th><?= __('Total Price') ?></th>
                            <th><?= __('Booking Status') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($hotel->bookings as $booking) : ?>
                        <tr>
                            <td><?= h($booking->id) ?></td>
                            <td><?= h($booking->user_id) ?></td>
                            <td><?= h($booking->start_date) ?></td>
                            <td><?= h($booking->end_date) ?></td>
                            <td><?= h($booking->destination) ?></td>
                            <td><?= h($booking->hotel_id) ?></td>
                            <td><?= h($booking->car_rental_id) ?></td>
                            <td><?= h($booking->insurance_id) ?></td>
                            <td><?= h($booking->translation_id) ?></td>
                            <td><?= h($booking->payment_id) ?></td>
                            <td><?= h($booking->travel_deal_id) ?></td>
                            <td><?= h($booking->total_price) ?></td>
                            <td><?= h($booking->booking_status) ?></td>
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
                <?php if (!empty($hotel->travel_deals)) : ?>
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
                            <th><?= __('Cruise Id') ?></th>
                            <th><?= __('Car Rental Id') ?></th>
                            <th><?= __('Translation Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($hotel->travel_deals as $travelDeal) : ?>
                        <tr>
                            <td><?= h($travelDeal->id) ?></td>
                            <td><?= h($travelDeal->start_date) ?></td>
                            <td><?= h($travelDeal->end_date) ?></td>
                            <td><?= h($travelDeal->description) ?></td>
                            <td><?= h($travelDeal->total_price) ?></td>
                            <td><?= h($travelDeal->insurance_id) ?></td>
                            <td><?= h($travelDeal->hotel_id) ?></td>
                            <td><?= h($travelDeal->cruise_id) ?></td>
                            <td><?= h($travelDeal->car_rental_id) ?></td>
                            <td><?= h($travelDeal->translation_id) ?></td>
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
