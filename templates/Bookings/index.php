<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Booking> $bookings
 */
?>

<head>
<style>
        body {
            border: 1px solid #ccc; /* Border style */
            /*padding: 20px; /* Padding around the content */
        }
    </style>
</head>
            
    <div class="row">
            <?= $this->element('headerstaff') ?>
    </div> 


<div class="bookings index content" style="padding-top: 10%">
    <?= $this->Html->link(__('New Booking'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Bookings') ?></h3>

    <div class="content">
        <?= $this->Form->create(null, ['type' => 'get']) ?>
        <fieldset>
            <div class="row">
                <div class="column">
                    <?= $this->Form->control('id', [
                        'placeholder' => 'Booking Reference contains...',
                        'value' => $this->request->getQuery('id'),
                    ]); ?>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <?= $this->Form->control('username', [
                        'placeholder' => 'Customer Username contains...',
                        'value' => $this->request->getQuery('username'),
                    ]); ?>
                </div>
            </div>
        </fieldset>


        <?= $this->Form->button(__('Search')) ?>
        <?= $this->Form->end() ?>

    </div>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('start_date') ?></th>
                    <th><?= $this->Paginator->sort('end_date') ?></th>
                    <th><?= $this->Paginator->sort('destination') ?></th>
                    <th><?= $this->Paginator->sort('hotel_id') ?></th>
                    <th><?= $this->Paginator->sort('car_rental_id') ?></th>
                    <th><?= $this->Paginator->sort('insurance_id') ?></th>
                    <th><?= $this->Paginator->sort('translation_id') ?></th>
                    <th><?= $this->Paginator->sort('payment_id') ?></th>
                    <th><?= $this->Paginator->sort('travel_deal_id') ?></th>
                    <th><?= $this->Paginator->sort('total_price') ?></th>
                    <th><?= $this->Paginator->sort('booking_status') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bookings as $booking): ?>
                <tr>
                    <td><?= $this->Number->format($booking->id) ?></td>
                    <td><?= $booking->hasValue('user') ? $this->Html->link($booking->user->user_info_string, ['controller' => 'Users', 'action' => 'view', $booking->user->id]) : '' ?></td>
                    <td><?= h($booking->start_date) ?></td>
                    <td><?= h($booking->end_date) ?></td>
                    <td><?= h($booking->destination) ?></td>
                    <td><?= $booking->hotel_id ? $this->Html->link($booking->hotel->name ?? 'N/A', ['controller' => 'Hotels', 'action' => 'view', $booking->hotel_id]) : 'No Hotel Booked' ?></td>
                    <td><?= $booking->car_rental_id ? $this->Html->link($booking->car_rental->id ?? 'N/A', ['controller' => 'CarRentals', 'action' => 'view', $booking->car_rental->id]) : 'No Car Rented' ?></td>
                    <td><?= $booking->insurance_id ? $this->Html->link($booking->insurance->supplier ?? 'N/A', ['controller' => 'Insurances', 'action' => 'view', $booking->insurance->id]) : 'No Insurance Booked' ?></td>
                    <td><?= $booking->translation_id ? $this->Html->link($booking->translation->id ?? 'N/A', ['controller' => 'Translations', 'action' => 'view', $booking->translation->id]) : 'No Translation Service Booked' ?></td>
                    <td><?= $booking->payment_id ? $this->Html->link($booking->payment->id ?? 'N/A', ['controller' => 'Payments', 'action' => 'view', $booking->payment->id]) : 'Payment Not Available' ?></td>
                    <td><?= $booking->travel_deal_id ? $this->Html->link($booking->travel_deal->id ?? 'N/A', ['controller' => 'TravelDeals', 'action' => 'view', $booking->travel_deal->id]) : 'No Travel Deal Booked' ?></td>
                    <td><?= $booking->total_price === null ? 'Not Calculated' : $this->Number->format($booking->total_price) ?></td>
                    <td><?= h($booking->booking_status) == 1 ? 'active' : 'cancelled' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $booking->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $booking->id]) ?>

                        <?= $this->Html->link(
                            __('Cancel'),
                            ['action' => 'cancel', $booking->id],
                            ['confirm' => __('Are you sure you want to cancel this booking? This will only mark the booking status as cancelled, not to be removed from the list.')]
                        ) ?>

                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $booking->id], ['confirm' => __('Are you sure you want to delete # {0}?', $booking->id)]) ?>
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

