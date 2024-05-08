<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Booking $booking
 */
$this->setLayout("defaultadmin");
?>
<div class="row">
    <div class="column column-100" style="margin: 0 auto;">
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
                <tr>
                    <th><?= __('Payment Id') ?></th>
                    <td><?= $payment->id === null ? '' : $this->Number->format($payment->id) ?></td>
                </tr>
                <?php if(!empty($booking->payment)) { ?>
                    <tr>
                        <th><?= __('Payment method') ?></th>
                        <td>
                            <?= $this->Form->control('payment_method', [
                                'type' => 'select',
                                'options' => $paymentMethods,
                                'default' => $booking->payment->payment_method,
                                'label' => false
                            ]); ?>
                        </td>
                    </tr>
                <?php } ?>

            </table>
            <div style="display:flex;justify-content:flex-end;line-height:37.6px;">
                <div style="margin-right:12px;font-size:20px;">Total Price: <span style="color:#e74343;">
                    <?= $this->Number->format($booking->total_price, [
                        'places' => 2,
                        'before' => '$',
                    ]);?>
                    </span></div>
                <div>
                    <!-- <button type="button" class="btn btn-primary">Pay</button> -->
                    <?= $this->Html->link(__('Pay'), ['controller' => 'Bookings', 'action' => 'changestatus', $booking->id],["type"=>"button","class"=>"btn btn-primary"]) ?>
                </div>
            </div>
            <!-- <div class="related">
                <h4><?= __('Related Payments') ?></h4>
                <?php if (!empty($booking->payment)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Amount') ?></th>
                            <th><?= __('Payment Method') ?></th>
                            <th><?= __('Status') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($booking->payment as $payment) : ?>
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
            </div> -->
        </div>
    </div>
</div>
