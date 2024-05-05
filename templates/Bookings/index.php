<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Booking> $bookings
 */
$this->setLayout("defaultadmin");
?>

<head>
<style>
        body {
            border: 1px solid #ccc;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
            font-size: 16px;
            vertical-align: middle;
            text-align: center;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f9f9f9;
        }
        thead {
            position: sticky;
            top: 0;
            background-color: #fff;
            z-index: 10;
        }
        .actions {
            display: inline-block;
            vertical-align: middle;
            justify-content: space-around;
            padding: 10px 0;

            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .button-link {
            display: block;
            box-sizing: border-box;
            width: 95%;
            margin: 4px 0;
            text-align: center;
            padding: 8px 0;
            border: 1px solid #ccc;
            background-color: #fefefe;
            text-decoration: none;
            color: #333;
            border-radius: 5px;
        }
        .button-link:hover {
            background-color: #e7e7e7;
            border-color: #adadad;
        }

</style>
</head>


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
                    <th><?= $this->Paginator->sort('id', 'Reference #') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('start_date') ?></th>
                    <th><?= $this->Paginator->sort('end_date') ?></th>
                    <th><?= $this->Paginator->sort('destination') ?></th>
                    <th><?= $this->Paginator->sort('flights') ?></th>
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
                <?php
                    $isStaff = $this->Identity->get('is_staff');
                    $currentUserId = $this->Identity->get('id'); // Assuming 'id' is the attribute for user ID
                    if (!$isStaff && $booking->user_id != $currentUserId) {
                        continue; // Skip this iteration if the current user is not staff and not the owner of the booking
                    }
                ?>
                <tr>
                    <td><?= $this->Number->format($booking->id) ?></td>
                    <td><?= $booking->hasValue('user') ? $this->Html->link($booking->user->user_info_string, ['controller' => 'Users', 'action' => 'view', $booking->user->id]) : '' ?></td>
                    <td><?= h($booking->start_date) ?></td>
                    <td><?= h($booking->end_date) ?></td>
                    <td><?= h($booking->destination) ?></td>
                    <td><?php if (!empty($booking->flights)): ?>
                            <ul>
                                <?php foreach ($booking->flights as $flight): ?>
                                    <li><?= $this->Html->link(h($flight->number), ['controller' => 'Flights', 'action' => 'view', $flight->id]) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            N/A
                        <?php endif; ?></td>
                    <td><?= $booking->hotel_id ? $this->Html->link($booking->hotel->name ?? 'N/A', ['controller' => 'Hotels', 'action' => 'view', $booking->hotel_id]) : 'No Hotel Booked' ?></td>
                    <td><?= $booking->car_rental_id ? $this->Html->link($booking->car_rental->plate ?? 'N/A', ['controller' => 'CarRentals', 'action' => 'view', $booking->car_rental->id]) : 'No Car Rented' ?></td>
                    <td><?= $booking->insurance_id ? $this->Html->link($booking->insurance->supplier ?? 'N/A', ['controller' => 'Insurances', 'action' => 'view', $booking->insurance->id]) : 'No Insurance Booked' ?></td>
                    <td><?= $booking->translation_id ? $this->Html->link($booking->translation->description ?? 'N/A', ['controller' => 'Translations', 'action' => 'view', $booking->translation->id]) : 'No Translation Service Booked' ?></td>
                    <td><?= $booking->payment_id ? $this->Html->link($booking->payment->id ?? 'N/A', ['controller' => 'Payments', 'action' => 'view', $booking->payment->id]) : 'Payment Not Available' ?></td>
                    <td><?= $booking->travel_deal_id ? $this->Html->link($booking->travel_deal->description ?? 'N/A', ['controller' => 'TravelDeals', 'action' => 'view', $booking->travel_deal->id]) : 'No Travel Deal Booked' ?></td>
                    <td><?= $booking->total_price === null ? 'Not Calculated' : $this->Number->format($booking->total_price) ?></td>
                    <td><?= h($booking->booking_status) == 1 ? 'active' : 'cancelled' ?></td>
                    <td class="actions" style="">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $booking->id], ['class' => 'button-link']) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $booking->id], ['class' => 'button-link']) ?>

                        <?= $this->Html->link(
                            __('Cancel'),
                            ['action' => 'cancel', $booking->id],
                            ['class' => 'button-link', 'confirm' => __('Are you sure you want to cancel this booking? This will only mark the booking status as cancelled, not to be removed from the list.')]
                        ) ?>

                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $booking->id], ['class' => 'button-link', 'confirm' => __('Are you sure you want to delete # {0}?', $booking->id)]) ?>
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

