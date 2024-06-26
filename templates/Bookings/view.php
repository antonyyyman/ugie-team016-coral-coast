<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Booking $booking
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
            <?= $this->Html->link(__('Edit Booking'), ['action' => 'edit', $booking->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Booking'), ['action' => 'delete', $booking->id], ['confirm' => __('Are you sure you want to delete # {0}?', $booking->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Bookings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Booking'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="bookings view content">
            <h3><?= h($booking->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $booking->hasValue('user') ? $this->Html->link($booking->user->user_info_string, ['controller' => 'Users', 'action' => 'view', $booking->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Destination') ?></th>
                    <td><?= h($booking->destination) ?></td>
                </tr>
                <tr>
                    <th><?=__('Flights')?></th>
                    <td><?php if (!empty($booking->flights)): ?>
                            <ul>
                                <?php foreach ($booking->flights as $flight): ?>
                                    <li><?= $this->Html->link(h($flight->number), ['controller' => 'Flights', 'action' => 'view', $flight->id]) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            N/A
                        <?php endif; ?></td>
                </tr>
                <tr>
                    <th><?= __('Hotel') ?></th>
                    <td><?= $booking->hasValue('hotel') ? $this->Html->link($booking->hotel->name, ['controller' => 'Hotels', 'action' => 'view', $booking->hotel->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Car Rental') ?></th>
                    <td><?= $booking->hasValue('car_rental') ? $this->Html->link($booking->car_rental->id, ['controller' => 'CarRentals', 'action' => 'view', $booking->car_rental->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Insurance') ?></th>
                    <td><?= $booking->hasValue('insurance') ? $this->Html->link($booking->insurance->id, ['controller' => 'Insurances', 'action' => 'view', $booking->insurance->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Translation') ?></th>
                    <td><?= $booking->hasValue('translation') ? $this->Html->link($booking->translation->id, ['controller' => 'Translations', 'action' => 'view', $booking->translation->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($booking->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Payment Id') ?></th>
                    <td><?= $booking->payment_id === null ? '' : $this->Number->format($booking->payment_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Travel Deal Id') ?></th>
                    <td><?= $booking->travel_deal_id === null ? '' : $this->Number->format($booking->travel_deal_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Total Price') ?></th>
                    <td><?= $booking->total_price === null ? '' : $this->Number->format($booking->total_price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Start Date') ?></th>
                    <td><?= h($booking->start_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('End Date') ?></th>
                    <td><?= h($booking->end_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Booking Status') ?></th>
                    <td><?= $booking->booking_status ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Payments') ?></h4>
                <?php if (!empty($booking->payments)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Amount') ?></th>
                            <th><?= __('Payment Method') ?></th>
                            <th><?= __('Status') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($booking->payments as $payment) : ?>
                        <tr>
                            <td><?= h($payment->id) ?></td>
                            <td><?= h($payment->amount) ?></td>
                            <td><?= h($payment->payment_method) ?></td>
                            <td><?= h($payment->status) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Payments', 'action' => 'view', $payment->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Payments', 'action' => 'edit', $payment->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Payments', 'action' => 'delete', $payment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payment->id)]) ?>
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
