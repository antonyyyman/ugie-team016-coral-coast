<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['animate','fontawsom-all.min','fonts','bootstrap.min','all.min','cake','style']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Free Tour and Travel Website Tempalte | Smarteyeapps.com</title>

    <style>
        
    #admin-menu-items ul li {
        padding: 15px;

    }
    </style>

    <!-- Weija said to remove this right? Either way it is bugging my code so I'm removing it for now.
        If you need something in default stylesheet move it out.-->

    <!-- <link rel="shortcut icon" href="assets/images/fav.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/fav.jpg">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/plugins/slider/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/plugins/slider/css/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link rel="stylesheet" href="webroot/css/style.css"> -->
</head>

<header id="admin-menu" class="container-fluid fixed-top">
    <div class="row align-items-center">
        <div id="admin-menu-items" class="col-lg-9 col-md-9 d-none d-md-block navs collapse">
            <ul class="d-flex justify-content-start">
                <li><a href=<?= $this->Url->build(['controller' => 'Dashboard', 'action' => 'index'])?>>Dashboard</a></li>
                <li><a href=<?= $this->Url->build(['controller' => 'Bookings', 'action' => 'index'])?>>Bookings</a></li>
                <li><a href=<?= $this->Url->build(['controller' => 'CarRentals', 'action' => 'index'])?>>Car Rentals</a></li>
                <li><a href=<?= $this->Url->build(['controller' => 'ContactForms', 'action' => 'index'])?>>Contact Forms</a></li>
                <li><a href=<?= $this->Url->build(['controller' => 'Cruises', 'action' => 'index'])?>>Cruises</a></li>
                <li><a href=<?= $this->Url->build(['controller' => 'Flights', 'action' => 'index'])?>>Flights</a></li>
                <li><a href=<?= $this->Url->build(['controller' => 'Hotels', 'action' => 'index'])?>>Hotels</a></li>
                <li><a href=<?= $this->Url->build(['controller' => 'Insurances', 'action' => 'index'])?>>Insurances</a></li>
                <li><a href=<?= $this->Url->build(['controller' => 'Payments', 'action' => 'index'])?>>Payments</a></li>
                <li><a href=<?= $this->Url->build(['controller' => 'Translations', 'action' => 'index'])?>>Translations</a></li>
                <li><a href=<?= $this->Url->build(['controller' => 'TravelDeals', 'action' => 'index'])?>>Travel Deals</a></li>
                <li><a href=<?= $this->Url->build(['controller' => 'Users', 'action' => 'index'])?>>Users</a></li>
                <li><a href=<?= $this->Url->build(['controller' => 'Pages', 'action' => 'home'])?>>Home Page</a></li>
            </ul>
        </div>
        <div class="col-md-3 d-none d-lg-block social-link">
            <?php
                $buttonClass = $this->Identity->isLoggedIn() ? 'logout-button' : 'login-button';
                echo $this->Html->link(
                    $this->Identity->isLoggedIn() ? 'Logout' : 'Log in',
                    $this->Identity->isLoggedIn() ? ['controller' => 'Auth', 'action' => 'logout'] : ['controller' => 'Auth', 'action' => 'login'],
                    ['class' => 'button button-outline ' . $buttonClass]);
            ?>
        </div>
    </div>
</header>



<body>
</div>

    <main class="main">
        <div>
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>


    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
    <script src="assets/plugins/slider/js/owl.carousel.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>
