<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\CarRental> $carRentals
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

<div class="carRentals index content" style="padding-top: 10%">
    <h3 class="text-center"><?= __('Car Rentals') ?></h3>
    <div> <?php if ($this->Identity->get('is_staff') == true) {
            echo $this->Html->link(__('New Car Rental'), ['action' => 'add'], ['class' => 'button float-right']);
        } ?>
    </div>
    <div class="container">
        <?php foreach ($carRentals as $carRental): ?>
            <div class="card card-body mb-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title"> Car Rental Number: <?= h($carRental->number) ?></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p class="card-text"><strong><?= __('Company') ?></strong>: <?= h($carRental->company) ?></p>
                                <p class="card-text"><strong><?= __('Plate') ?></strong>: <?= h($carRental->plate) ?></p>
                            </div>
                            <div class="col-md-6">
                                <p class="card-text"><strong><?= __('Description') ?></strong>: <?= h($carRental->description) ?></p>
                                <p class="card-text"><strong><?= __('Brand') ?></strong>: <?= h($carRental->brand) ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p class="card-text"><strong><?= __('Price') ?></strong>: <?= $carRental->price === null ? '' : $this->Number->format($carRental->price) ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $carRental->id], ['class' => 'btn btn-primary btn-sm']) ?>
                                <?php if ($this->Identity->get('is_staff') == true) {
                                    echo $this->Html->link(__('Edit'), ['action' => 'edit', $carRental->id], ['class' => 'btn btn-warning btn-sm']);
                                    echo '&nbsp;';
                                    echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $carRental->id], ['class' => 'btn btn-danger btn-sm', 'confirm' => __('Are you sure you want to delete # {0}?', $carRental->id)]);
                                }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
