<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\CarRental> $carRental
 */
?>

    <!DOCTYPE html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Martine</title>
        <link rel="icon" href="../../webroot/css/customerSide/img/favicon.png">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../../webroot/css/customerSide/css/bootstrap.min.css">
        <!-- animate CSS -->
        <link rel="stylesheet" href="../../webroot/css/customerSide/css/animate.css">
        <!-- owl carousel CSS -->
        <link rel="stylesheet" href="../../webroot/css/customerSide/css/owl.carousel.min.css">
        <!-- themify CSS -->
        <link rel="stylesheet" href="../../webroot/css/customerSide/css/themify-icons.css">
        <!-- flaticon CSS -->
        <link rel="stylesheet" href="../../webroot/css/customerSide/css/flaticon.css">
        <!-- fontawesome CSS -->
        <link rel="stylesheet" href="../../webroot/css/customerSide/fontawesome/css/all.min.css">
        <!-- magnific CSS -->
        <link rel="stylesheet" href="../../webroot/css/customerSide/css/magnific-popup.css">
        <link rel="stylesheet" href="../../webroot/css/customerSide/css/gijgo.min.css">
        <!-- niceselect CSS -->
        <link rel="stylesheet" href="../../webroot/css/customerSide/css/nice-select.css">
        <!-- slick CSS -->
        <link rel="stylesheet" href="../../webroot/css/customerSide/css/slick.css">
        <!-- style CSS -->
        <link rel="stylesheet" href="../../webroot/css/customerSide/css/style.css">
    </head>

    <body>

    <!-- about us css start-->
    <section class="hotel_list section_padding single_page_hotel_list">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="section_tittle text-center">
                        <h2><?= h($carRental->company) ?> Car Rental Services</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-sm-6">
                    <div class="single_ihotel_list">
                        <img src="../../webroot/css/customerSide/img/single_place_<?=h($carRental->id)?>.png" alt="">
                        <div class="hotel_text_iner">
                            <h3>Details: </a></h3>
                            <p>Company: <?= $carRental->company?></p>
                            <p>License Plate: <?= $carRental->plate?></p>
                            <p>Description: <?= $carRental->decription?></p>
                            <h5>Total Cost: <span><?= $carRental->price === null ? '' : $this->Number->format($carRental->price) ?></span></h5>
                        </div>
                    </div>
                </div>
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
            <div class="row justify-content-center">
                <div class="col-lg-3 col-sm-6">
                    <div class="single_ihotel_list">
                        <img src="../../webroot/css/customerSide/img/services_1.png" alt="">
                        <h3>Cruises</h3>
                        <p>If you wanted to take a cruise!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_ihotel_list">
                        <img src="../../webroot/css/customerSide/img/services_3.png" alt="">
                        <h3>Translations</h3>
                        <p>To help you understand the locals</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_ihotel_list">
                        <img src="../../webroot/css/customerSide/img/services_4.png" alt="">
                        <h3>Insurance</h3>
                        <p>Be prepared for anything while travelling</p>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- jquery plugins here-->
    <script src="../../webroot/css/customerSide/js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="../../webroot/css/customerSide/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="../../webroot/css/customerSide/js/bootstrap.min.js"></script>
    <!-- magnific js -->
    <script src="../../webroot/css/customerSide/js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="../../webroot/css/customerSide/js/owl.carousel.min.js"></script>
    <!-- masonry js -->
    <script src="../../webroot/css/customerSide/js/masonry.pkgd.js"></script>
    <!-- masonry js -->
    <script src="../../webroot/css/customerSide/js/jquery.nice-select.min.js"></script>
    <script src="../../webroot/css/customerSide/js/gijgo.min.js"></script>
    <!-- contact js -->
    <script src="../../webroot/css/customerSide/js/jquery.ajaxchimp.min.js"></script>
    <script src="../../webroot/css/customerSide/js/jquery.form.js"></script>
    <script src="../../webroot/css/customerSide/js/jquery.validate.min.js"></script>
    <script src="../../webroot/css/customerSide/js/mail-script.js"></script>
    <script src="../../webroot/css/customerSide/js/contact.js"></script>
    <!-- custom js -->
    <script src="../../webroot/css/customerSide/js/custom.js"></script>

    </main>

    </body>
<?php
