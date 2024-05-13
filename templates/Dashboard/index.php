<?php
    if($this->Identity->get('is_staff') == true){
        $this->Html->script('script', ['block' => true]);
        $this->Html->css('contact-form', ['block' => true]);
        //$this->setLayout("defaultadmin");
    } else {
        $this->setLayout("unauthorised");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        header {
            margin-bottom: 30px;
        }
        .content-container {
            padding-top: 30px;
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
        h1 {
        padding-top: 20px;
        }
    </style>
    <title>Dashboard</title>

    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css" rel="stylesheet">  -->
</head>

<body id="body-top">
<h1>Admin Dashboard</h1>
<div class="container-fluid">
    <div class="row">
        <?php foreach ($tables as $table):?>
            <?php if (($table!= 'bookings_flights') and ($table!= 'flights_travel_deals') and ($table!= 'phinxlog') and ($table!= 'content_blocks_phinxlog')):?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header">
                            <?php if ($table == 'content_blocks'): ?>
                            <h5 class="card-title">Customise Home Page</h5>
                            <?php else: ?>
                            <h5 class="card-title"><?= ucwords(str_replace('_', ' ', $table))?></h5>
                            <?php endif; ?>
                        </div>
                        <div class="card-body">
                            <?php if ($table == 'content_blocks'): ?>
                                <a href=<?= $this->Url->build( ['plugin' => 'ContentBlocks', 'controller' => 'ContentBlocks', 'action' => 'index']) ?> class="btn btn-primary">View</a>
                            <?php else: ?>
                                <a href=<?= $this->Url->build(['controller' => $table, 'action' => 'index'])?> class="btn btn-primary">View</a>
                            <?php endif; ?>
                            <?php if ($table != 'content_blocks'): ?>
                                <a href="<?= $this->Url->build(['controller' => $table, 'action' => 'add'])?>" class="btn btn-secondary">Add <?= ucwords(str_replace('_', ' ', $table))?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif;?>
        <?php endforeach;?>
    </div>
</div>
</body>
</html>
