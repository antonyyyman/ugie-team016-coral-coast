<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Hotel> $hotels
 */
?>

<!DOCTYPE html>
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
    <section class="top_place section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="section_tittle text-center">
                        <h2>Flights</h2>
                        <p>To get you where you need to go!</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach ($hotels as $index => $hotel) {?>
                    <div class="col-lg-6 col-md-6">
                        <div class="single_place">
                            <img src="../webroot/css/customerSide/img/ind/industries_<?= $index + 1?>.png" alt="">
                            <div class="hover_Text d-flex align-items-end justify-content-between">
                                <div class="hover_text_iner">
                                    <h3><?= $hotel->name ?></h3>
                                    <p>Location:  <?= $hotel->location?></p>
                                    <p>Telephone: <?= $hotel->telephone?></p>
                                    <p>Total Price: <?= $hotel->price?></p>
                                    <a href=<?= $this->Url->build(['controller' => 'Hotels', 'action' => 'customerSideView', $hotel->id])?>>View Details</a>
                                </div>
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
                        <img src="../../webroot/css/customerSide/img/services_1.png" alt="">
                        <h3><a href=<?= $this->Url->build(['controller' => 'Cruises', 'action' => 'customerSideIndex'])?>>Cruises</a></h3>
                        <p>If you wanted to take a cruise!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_ihotel_list">
                        <img src="../../webroot/css/customerSide/img/services_2.png" alt="">
                        <h3> <a href=<?= $this->Url->build(['controller' => 'CarRentals', 'action' => 'customerSideIndex'])?>> Car Rental</a></h3>
                        <p>For you to be able to get around!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_ihotel_list">
                        <img src="../../webroot/css/customerSide/img/services_3.png" alt="">
                        <h3><a href=<?= $this->Url->build(['controller' => 'Translations', 'action' => 'customerSideIndex'])?>>Translations</a></h3>
                        <p>To help you understand the locals</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_ihotel_list">
                        <img src="../../webroot/css/customerSide/img/services_4.png" alt="">
                        <h3><a href=<?= $this->Url->build(['controller' => 'Insurances', 'action' => 'customerSideIndex'])?>>Insurance</a></h3>
                        <p>Be prepared for anything while travelling</p>
                    </div>
                </div>
            </div>
        </div>
    </section>



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

</main>
</body>



