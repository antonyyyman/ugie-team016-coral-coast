<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;


use Cake\ORM\TableRegistry;

// Fetch travel deals, flights, hotels, and cruises data
$travelDealsTable = TableRegistry::getTableLocator()->get('TravelDeals');
$flightsTable = TableRegistry::getTableLocator()->get('Flights');
$hotelsTable = TableRegistry::getTableLocator()->get('Hotels');

$travelDeals = $travelDealsTable->find('all')->limit(4);
$flights = $flightsTable->find('all')->limit(5);
$hotels = $hotelsTable->find('all')->limit(5);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Martine</title>
    <link rel="icon" href="../webroot/css/customerSide/img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../webroot/css/customerSide/css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="../webroot/css/customerSide/css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="../webroot/css/customerSide/css/owl.carousel.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="../webroot/css/customerSide/css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="../webroot/css/customerSide/css/flaticon.css">
    <!-- fontawesome CSS -->
    <link rel="stylesheet" href="../webroot/css/customerSide/fontawesome/css/all.min.css">
    <!-- magnific CSS -->
    <link rel="stylesheet" href="../webroot/css/customerSide/css/magnific-popup.css">
    <link rel="stylesheet" href="../webroot/css/customerSide/css/gijgo.min.css">
    <!-- niceselect CSS -->
    <link rel="stylesheet" href="../webroot/css/customerSide/css/nice-select.css">
    <!-- slick CSS -->
    <link rel="stylesheet" href="../webroot/css/customerSide/css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="../webroot/css/customerSide/css/style.css">
</head>
<body>

    <main class="main">
            <section class="banner_part">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-lg-10">
                            <div class="banner_text text-center">
                                <div class="banner_text_iner">
                                    <h1> <?= $this->ContentBlock->text('website-title'); ?> </h1>
                                    <p>Let’s start your journey with us, your dream will come true</p>
                                    <h2><li><a href= <?= $this->Url->build(['controller' => 'ContactForms', 'action' => 'add'])?>>Enquire Here</a></li></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <section class="top_place section_padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="section_tittle text-center">
                            <a href=<?= $this->Url->build(['controller' => 'TravelDeals', 'action' => 'index'])?>><h2>Travel Deals</h2></a>
                            <p><?= $this->ContentBlock->text('travel-deals-description'); ?></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($travelDeals as $index => $travelDeal) {?>
                        <div class="col-lg-6 col-md-6">
                            <div class="single_place">
                                <img src="../webroot/css/customerSide/img/single_place_<?= $index + 1?>.png" alt="">
                                <div class="hover_Text d-flex align-items-end justify-content-between">
                                    <div class="hover_text_iner">
                                        <h3><?= $travelDeal->description?></h3>
                                        <p>Start Date: <?= $travelDeal->start_date?></p>
                                        <p>End Date: <?= $travelDeal->end_date?></p>
                                        <p>Total Price: <?= $travelDeal->total_price?></p>
                                        <a href=<?= $this->Url->build(['controller' => 'TravelDeals', 'action' => 'view', $travelDeal->id])?>>View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                </div>

            </div>
        </section>
        <section class="event_part section_padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="event_slider owl-carousel" >
                            <?php foreach ($flights as $flight) {?>
                                <div class="single_event_slider">
                                    <div class="row justify-content-end">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="event_slider_content">
                                                <h3>Flight: <?= $flight->number?></h3>
                                                <p>Departure Airport: <?= $flight->departure_airport?></p>
                                                <p>Arrival Airport: <?= $flight->arrival_airport?></p>
                                                <p>Price: <?= $flight->price?></p>
                                                <a href=<?= $this->Url->build(['controller' => 'Flights', 'action' => 'view', $flight->id])?>>View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="row justify-content-center">
            <h2><a href=<?= $this->Url->build(['controller' => 'Flights', 'action' => 'index'])?>> View All Flights</a></h2>
        </div>

        <section class="hotel_list section_padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="section_tittle text-center">
                            <h2><a href=<?= $this->Url->build(['controller' => 'Hotels', 'action' => 'index'])?>>Hotels</h2>
                            <p>Here are some great places you can stay!</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($hotels as $index => $hotel) {?>
                    <div class="col-lg-4 col-sm-6">
                        <div class="single_ihotel_list">
                            <img src="../webroot/css/customerSide/img/ind/industries_<?= $index + 1?>.png" alt="">
                            <div class="hotel_text_iner">
                                <h3><?= $hotel->name?></h3>
                                <p>Location: <?= $hotel->location?></p>
                                <p>Price: <?= $hotel->price?></p>
                                <a href=<?= $this->Url->build(['controller' => 'Hotels', 'action' => 'view', $hotel->id])?>>View Details</a>
                            </div>
                        </div>
                    </div>
                <?php }?>
                </div>
            </div>
        </section>

        <section class="best_services section_padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="section_tittle text-center">
                            <h2>Here are other great services!</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="single_ihotel_list">
                            <img src="../webroot/css/customerSide/img/services_1.png" alt="">
                            <h3><a href=<?= $this->Url->build(['controller' => 'Cruises', 'action' => 'index'])?>>Cruises</a></h3>
                            <p>If you wanted to take a cruise!</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="single_ihotel_list">
                            <img src="../webroot/css/customerSide/img/services_2.png" alt="">
                            <h3> <a href=<?= $this->Url->build(['controller' => 'CarRentals', 'action' => 'index'])?>> Car Rental</a></h3>
                            <p>For you to be able to get around!</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="single_ihotel_list">
                            <img src="../webroot/css/customerSide/img/services_3.png" alt="">
                            <h3><a href=<?= $this->Url->build(['controller' => 'Translations', 'action' => 'index'])?>>Translations</a></h3>
                            <p>To help you understand the locals</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="single_ihotel_list">
                            <img src="../webroot/css/customerSide/img/services_4.png" alt="">
                            <h3><a href=<?= $this->Url->build(['controller' => 'Insurances', 'action' => 'index'])?>>Insurance</a></h3>
                            <p>Be prepared for anything while travelling</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>


    <!-- jquery plugins here-->
    <script src="../webroot/css/customerSide/js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="../webroot/css/customerSide/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="../webroot/css/customerSide/js/bootstrap.min.js"></script>
    <!-- magnific js -->
    <script src="../webroot/css/customerSide/js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="../webroot/css/customerSide/js/owl.carousel.min.js"></script>
    <!-- masonry js -->
    <script src="../webroot/css/customerSide/js/masonry.pkgd.js"></script>
    <!-- masonry js -->
    <script src="../webroot/css/customerSide/js/jquery.nice-select.min.js"></script>
    <script src="../webroot/css/customerSide/js/gijgo.min.js"></script>
    <!-- contact js -->
    <script src="../webroot/css/customerSide/js/jquery.ajaxchimp.min.js"></script>
    <script src="../webroot/css/customerSide/js/jquery.form.js"></script>
    <script src="../webroot/css/customerSide/js/jquery.validate.min.js"></script>
    <script src="../webroot/css/customerSide/js/mail-script.js"></script>
    <script src="../webroot/css/customerSide/js/contact.js"></script>
    <!-- custom js -->
    <script src="../webroot/css/customerSide/js/custom.js"></script>
</body>

</html>
