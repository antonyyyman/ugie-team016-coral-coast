<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="css/styles.scss" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<h1>Dashboard</h1>
<ul>
    <?php foreach ($tables as $table): ?>
        <?php if (($table != 'bookings_flights') and ($table != 'flight_travel_deals')): ?>
            <li>
                <a href=<?= $this->Url->build(['controller' => $table, 'action' => 'index']) ?>><?= $table ?></a>
                | <a href="<?= $this->Url->build(['controller' => $table, 'action' => 'add']) ?>">add <?= $table ?></a>
            </li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>
</body>
</html>
