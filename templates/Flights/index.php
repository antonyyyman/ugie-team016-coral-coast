<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Flight> $flights
 */
$this->setlayout('default');
?>

<head>
    <script>
        function changeDateFormat(input) {
            const date = new Date(input.value);
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const day = String(date.getDate()).padStart(2, '0');
            input.value = `${year}-${day}-${month}`;
        }
    </script>
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

<div class="flights index content" style="padding-top: 10%">


    <?php if ($this->Identity->get('is_staff') == true) {
       echo $this->Html->link(__('New Flight'), ['action' => 'add'], ['class' => 'button float-right']); }
    ?>
    <h3 class="text-center"><?= __('Flights') ?></h3>

    <div class="container">
        <?php echo $this->Form->create(null, ['type' => 'get']);?>
        <div class="row">
            <div class="col-md-6">
                <?php echo $this->Form->control('departure_date', ['label' => 'Departure Date:', 'empty' => true, 'class' => 'form-control', 'onchange' => 'changeDateFormat(this)']);?>
            </div>
            <div class="col-md-6">
                <?php echo $this->Form->control('arrival_airport', ['label' => 'Arrival Airport:', 'empty' => true, 'class' => 'form-control']);?>
            </div>
        </div>
        <div class="text-center">
            <?php echo $this->Form->button(__('Search'), ['class' => 'btn btn-primary']);?>
        </div>
        <?php echo $this->Form->end();?>
    </div>

    <div class="container">
        <?php foreach ($flights as $flight): ?>
            <div class="card card-body mb-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title"> Flight Number: <?= h($flight->number) ?></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p class="card-text"><strong><?= __('Departure Airport') ?></strong>: <?= h($flight->departure_airport) ?></p>
                                <p class="card-text"><strong><?= __('Departure Date') ?></strong>: <?= h($flight->departure_date) ?></p>
                            </div>
                            <div class="col-md-6">
                                <p class="card-text"><strong><?= __('Arrival Airport') ?></strong>: <?= h($flight->arrival_airport) ?></p>
                                <p class="card-text"><strong><?= __('Arrival Date') ?></strong>: <?= h($flight->arrival_date) ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p class="card-text"><strong><?= __('Price') ?></strong>: <?= $flight->price === null ? '' : $this->Number->format($flight->price) ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $flight->id], ['class' => 'btn btn-primary btn-sm']) ?>
                                    <?php if ($this->Identity->get('is_staff') == true) {
                                        echo $this->Html->link(__('Edit'), ['action' => 'edit', $flight->id], ['class' => 'btn btn-warning btn-sm']);
                                        echo '&nbsp;';
                                        echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $flight->id], ['class' => 'btn btn-danger btn-sm', 'confirm' => __('Are you sure you want to delete # {0}?', $flight->id)]);
                                    }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>
