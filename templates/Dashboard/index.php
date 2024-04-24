<!DOCTYPE html>
<html>
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
            padding: 20px; 
        }
        .spacer-for-fixed-header {
        height: 100px; 
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
            <?php if (($table!= 'bookings_flights') and ($table!= 'flights_travel_deals') and ($table!= 'phinxlog')):?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title"><?= ucwords(str_replace('_', ' ', $table))?></h5>
                        </div>
                        <div class="card-body">
                            <a href=<?= $this->Url->build(['controller' => $table, 'action' => 'index'])?> class="btn btn-primary">View</a>
                            <a href="<?= $this->Url->build(['controller' => $table, 'action' => 'add'])?>" class="btn btn-secondary">Add <?= ucwords(str_replace('_', ' ', $table))?></a>
                        </div>
                    </div>
                </div>
            <?php endif;?>
        <?php endforeach;?>
    </div>
</div>
</body>
</html>
