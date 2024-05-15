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

$cakeDescription = 'Coral Coast Travel';
$isStaff = $this->Identity->get('is_staff');
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

    <?= $this->Html->css(['animate','fontawsom-all.min','fonts','bootstrap.min','all.min','cake','style',"customerSide/css/bootstrap.min.css","customerSide/css/animate.css","customerSide/css/owl.carousel.min.css","customerSide/css/themify-icons.css","customerSide/css/flaticon.css","customerSide/css/magnific-popup.css","customerSide/css/gijgo.min.css","customerSide/css/nice-select.css","customerSide/css/slick.css","customerSide/css/style.css"]) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>
    <!-- ignore this comments. -->
    <header id="menu-jk" class="container-fluid fixed-top">
        <nav class="navbar navbar-expand-md navbar-light bg-white">
            <a class="navbar-brand" href=<?= $this->Url->build(['plugin' => null, 'controller' => 'pages', 'action' => 'home']) ?>>
                <?= $this->ContentBlock->image('logo'); ?>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href=<?= $this->Url->build(['plugin' => null, 'controller' => 'Flights', 'action' => 'index']) ?>>Flights</a></li>
                    <li class="nav-item"><a class="nav-link" href=<?= $this->Url->build(['plugin' => null, 'controller' => 'Hotels', 'action' => 'index']) ?>>Hotels</a></li>
                    <li class="nav-item"><a class="nav-link" href=<?= $this->Url->build(['plugin' => null, 'controller' => 'TravelDeals', 'action' => 'index']) ?>>Travel Deals</a></li>
                    <li class="nav-item"><a class="nav-link" href=<?= $this->Url->build(['plugin' => null, 'controller' => 'Bookings', 'action' => 'index']) ?>>Bookings</a></li>
                    <li class="nav-item"><a class="nav-link" href=<?= $this->Url->build(['plugin' => null, 'controller' => 'ContactForms', 'action' => 'add']) ?>>Contact us</a></li>
                    <?php if ($isStaff) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $this->Url->build(['plugin' => null, 'controller' => 'Dashboard', 'action' => 'index']); ?>">Dashboard</a>
                        </li>
                    <?php } ?>

                    
                </ul>
                <div class="navbar-nav ml-auto">
                    <?php
                        $buttonClass = $this->Identity->isLoggedIn() ? 'logout-button' : 'login-button';
                        echo $this->Html->link(
                            $this->Identity->isLoggedIn() ? 'Logout' : 'Log in',
                            $this->Identity->isLoggedIn() ? ['plugin' => null, 'controller' => 'Auth', 'action' => 'logout'] : ['controller' => 'Auth', 'action' => 'login'],
                            ['class' => 'nav-item nav-link button button-outline ' . $buttonClass]);
                    ?>
                </div>
            </div>
        </nav>
    </header>

    <main class="main">
        <div>
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <h2>About Us</h2>
                    <?= $this->ContentBlock->html('about-us-content'); ?>
                </div>
                <div class="col-md-4 col-sm-12">
                    <h2>Other Links</h2>
                    <ul class="list-unstyled link-list">
                    <li><a href=<?= $this->Url->build(['controller' => 'CarRentals', 'action' => 'index'])?>>Car Rentals</a></li>
                    <li><a href=<?= $this->Url->build(['controller' => 'Cruises', 'action' => 'index'])?>>Cruises</a></li>
                    <li><a href=<?= $this->Url->build(['controller' => 'Insurances', 'action' => 'index'])?>>Insurances</a></li>
                    <li><a href=<?= $this->Url->build(['controller' => 'Translations', 'action' => 'index'])?>>Translations</a></li>
                    <li><a href=<?= $this->Url->build(['controller' => 'Dashboard', 'action' => 'index'])?>>Admin Dashboard</a></li>
                    </ul>
                </div>
                <div class="col-md-4 col-sm-12 map-img">
                    <h2>Contact Us</a></h2>
                    <?= $this->ContentBlock->html('contact-us-content'); ?>
                    <a href= <?= $this->Url->build(['controller' => 'ContactForms', 'action' => 'add'])?>>Make an enquiry</a>
                </div>
            </div>
        </div>


    </footer>


</body>

<script src="webroot/js/jquery-3.2.1.min.js"></script>
<script src="webroot/js/popper.min.js"></script>
<script src="webroot/css/customerSide/js/bootstrap.min.js"></script>
<script src="webroot/js/bootstrap.min.js"></script>
<script src="webroot/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
<script src="webroot/plugins/slider/js/owl.carousel.min.js"></script>
<script src="webroot/js/script.js"></script>

    
</html>
