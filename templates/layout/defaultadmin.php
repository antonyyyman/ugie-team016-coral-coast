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

    <?= $this->Html->css(['animate','fontawsom-all.min','fonts','bootstrap.min','all.min','style','cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Free Tour and Travel Website Tempalte | Smarteyeapps.com</title>
    

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

<header id="menu-jk" class="container-fluid fixed-top">
        <div class="row">
            <div class="col-md-3 logo">
            <a href=<?= $this->Url->build(['controller' => 'pages', 'action' => 'home'])?>>
                <img src="/img/logo_coralcoast.png" alt="Coral Coast Logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas d-block d-lg-none small-menu fa-bars"></i>
            </button>
            </div>
            <div id="menu" class="col-lg-6 col-md-9 d-none d-md-block navs collapse">
                <ul>
                <li><a href=<?= $this->Url->build(['controller' => 'Flights', 'action' => 'index'])?>>Flights</a></li>
                    <li><a href=<?= $this->Url->build(['controller' =>'Hotels', 'action' => 'index'])?>>Hotels</a></li>
                    <li><a href=<?= $this->Url->build(['controller' => 'TravelDeals', 'action' => 'index'])?>>Travel Deals</a></li>
                    <li><a href=<?= $this->Url->build(['controller' => 'Bookings', 'action' => 'index'])?>>Bookings</a></li>
                    <li><a href=<?= $this->Url->build(['controller' => 'ContactForms', 'action' => 'add'])?>>Contact us</a></li>
                </ul>
            </div>
            <div class="col-md-3 d-none d-lg-block socila-link">
            <?php
                if ($this->Identity->isLoggedIn()) {
                echo $this->Html->link(
                    'Logout',
                    ['controller' => 'Auth', 'action' => 'logout'],
                    ['class' => 'button button-outline']);
                } else{
                    echo $this->Html->link(
                    'Log in',
                    ['controller' => 'Auth', 'action' => 'login'],
                    ['class' => 'button button-outline']);
                }
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
