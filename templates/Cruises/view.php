<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cruise $cruise
 */
$this->setLayout("defaultadmin");
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Cruise'), ['action' => 'edit', $cruise->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Cruise'), ['action' => 'delete', $cruise->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cruise->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Cruises'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Cruise'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="cruises view content">
            <h3><?= h($cruise->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Company') ?></th>
                    <td><?= h($cruise->company) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($cruise->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($cruise->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price') ?></th>
                    <td><?= $cruise->price === null ? '' : $this->Number->format($cruise->price) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Travel Deals') ?></h4>
                <?php if (!empty($cruise->travel_deals)) : ?>
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
                        <?php foreach ($cruise->travel_deals as $travelDeal) : ?>
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
