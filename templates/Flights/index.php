<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Flight> $flights
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

<body>


<div class="row">
            <?= $this->element('headerstaff') ?>
</div>

<div class="flights index content" style="padding-top: 10%">
    <?= $this->Html->link(__('New Flight'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Flights') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('number') ?></th>
                    <th><?= $this->Paginator->sort('departure_airport') ?></th>
                    <th><?= $this->Paginator->sort('arrival_airport') ?></th>
                    <th><?= $this->Paginator->sort('departure_date') ?></th>
                    <th><?= $this->Paginator->sort('arrival_date') ?></th>
                    <th><?= $this->Paginator->sort('price') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($flights as $flight): ?>
                <tr>
                    <td><?= $this->Number->format($flight->id) ?></td>
                    <td><?= h($flight->number) ?></td>
                    <td><?= h($flight->departure_airport) ?></td>
                    <td><?= h($flight->arrival_airport) ?></td>
                    <td><?= h($flight->departure_date) ?></td>
                    <td><?= h($flight->arrival_date) ?></td>
                    <td><?= $flight->price === null ? '' : $this->Number->format($flight->price) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $flight->id], ['class' => 'button-link']) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $flight->id], ['class' => 'button-link']) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $flight->id], ['class' => 'button-link', 'confirm' => __('Are you sure you want to delete # {0}?', $flight->id)]) ?>
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
</body>
