<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\TravelDeal> $travelDeals
 */
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

<div class="travelDeals index content" style="padding-top: 10%">
    <?php if ($this->Identity->get('is_staff') == true) {
        echo $this->Html->link(__('New Travel Deal'), ['action' => 'add'], ['class' => 'button float-right']);
    }?>
    <h3 class="text-center"><?= __('Travel Deals') ?></h3>
    <!-- TravelDeals/index.php -->

    <div class="container">
        <?php foreach ($travelDeals as $travelDeal): ?>
            <div class="card card-body mb-4">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="card-title"><?= __('Travel Deal') ?> #<?= $this->Number->format($travelDeal->id) ?></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p class="card-text"><strong><?= __('Start Date') ?></strong>: <?= h($travelDeal->start_date) ?></p>
                        <p class="card-text"><strong><?= __('End Date') ?></strong>: <?= h($travelDeal->end_date) ?></p>
                        <p class="card-text"><strong><?= __('Description') ?></strong>: <?= h($travelDeal->description) ?></p>
                        <p class="card-text"><strong><?= __('Total Price') ?></strong>: <?= $travelDeal->total_price === null ? '' : $this->Number->format($travelDeal->total_price) ?></p>
                        <p class="card-text"><strong><?= __('Flights') ?></strong>: <?php if (!empty($travelDeal->flights)): ?>
                        <ul>
                            <?php foreach ($travelDeal->flights as $flight): ?>
                                <li><?= $this->Html->link(h($flight->number), ['controller' => 'Flights', 'action' => 'view', $flight->id]) ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <?php else: ?>
                        N/A
                        <?php endif; ?></p>
                        <p class="card-text"><strong><?= __('Insurance') ?></strong>: <?= $travelDeal->hasValue('insurance') ? $this->Html->link($travelDeal->insurance->supplier, ['controller' => 'Insurances', 'action' => 'view', $travelDeal->insurance->id]) : 'N/A' ?></p>
                        <p class="card-text"><strong><?= __('Hotel') ?></strong>: <?= $travelDeal->hasValue('hotel') ? $this->Html->link($travelDeal->hotel->name, ['controller' => 'Hotels', 'action' => 'view', $travelDeal->hotel->id]) : 'N/A' ?></p>
                        <p class="card-text"><strong><?= __('Cruise') ?></strong>: <?= $travelDeal->hasValue('cruise') ? $this->Html->link($travelDeal->cruise->description, ['controller' => 'Cruises', 'action' => 'view', $travelDeal->cruise->id]) : 'N/A' ?></p>
                        <p class="card-text"><strong><?= __('Car Rental') ?></strong>: <?= $travelDeal->hasValue('car_rental') ? $this->Html->link($travelDeal->car_rental->company, ['controller' => 'CarRentals', 'action' => 'view', $travelDeal->car_rental->id]) : 'N/A' ?></p>
                        <p class="card-text"><strong><?= __('Translation') ?></strong>: <?= $travelDeal->hasValue('translation') ? $this->Html->link($travelDeal->translation->description, ['controller' => 'Translations', 'action' => 'view', $travelDeal->translation->id]) : 'N/A' ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-right">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $travelDeal->id], ['class' => 'btn btn-primary btn-sm']) ?>
                        <?php if ($this->Identity->get('is_staff') == true) {
                            echo $this->Html->link(__('Edit'), ['action' => 'edit', $travelDeal->id], ['class' => 'btn btn-warning btn-sm']);
                            echo '&nbsp;';
                            echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $travelDeal->id], ['class' => 'btn btn-danger btn-sm', 'confirm' => __('Are you sure you want to delete # {0}?', $travelDeal->id)]);
                        }?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
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
</div>
