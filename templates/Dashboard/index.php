<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
<h1>Dashboard</h1>
<ul>
    <?php foreach ($tables as $table): ?>
        <li><a href=<?= $this->Url->build(['controller' => $table, 'action' => 'index']) ?>><?= $table ?></a></li>
    <?php endforeach; ?>
</ul>
</body>
</html>
