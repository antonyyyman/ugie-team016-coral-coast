<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Insurance> $insurances
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

<div class="insurances index content" style="padding-top: 10%">
    <?php if ($this->Identity->get('is_staff') == true) {
    echo $this->Html->link(__('New Insurance'), ['action' => 'add'], ['class' => 'button float-right']); }
    ?>
    <h3 class="text-center"><?= __('Insurances') ?></h3>
    <!-- insurances/index.php -->

    <div class="container">
        <?php foreach ($insurances as $insurance): ?>
            <div class="card card-body mb-4">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="card-title"><?= __('Insurance') ?> #<?= $this->Number->format($insurance->id) ?></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p class="card-text"><strong><?= __('Supplier') ?></strong>: <?= h($insurance->supplier) ?></p>
                        <p class="card-text"><strong><?= __('Level') ?></strong>: <?= h($insurance->level) ?></p>
                        <p class="card-text"><strong><?= __('Description') ?></strong>: <?= h($insurance->description) ?></p>
                    </div>
                    <div class="col-md-6">
                        <p class="card-text"><strong><?= __('Price') ?></strong>: <?= $insurance->price === null ? '' : $this->Number->format($insurance->price) ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-right">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $insurance->id], ['class' => 'btn btn-primary btn-sm']) ?>
                        <?php if ($this->Identity->get('is_staff') == true) {
                            echo $this->Html->link(__('Edit'), ['action' => 'edit', $insurance->id], ['class' => 'btn btn-warning btn-sm']);
                            echo '&nbsp;';
                            echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $insurance->id], ['class' => 'btn btn-danger btn-sm', 'confirm' => __('Are you sure you want to delete # {0}?', $insurance->id)]);
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
