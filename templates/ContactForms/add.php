<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ContactForm $contactForm
 */
$this->Html->script('script', ['block' => true]);
$this->Html->css('contact-form', ['block' => true]);
?>

<header id="menu-jk" class="container-fluid fixed-top">
        <div class="row">
            <div class="col-md-3 logo">
            <a href=<?= $this->Url->build(['controller' => 'pages', 'action' => 'home'])?>>
                <img src="../webroot/img/logo_coralcoast.png" alt="Coral Coast Logo">
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
                $buttonClass = $this->Identity->isLoggedIn() ? 'logout-button' : 'login-button';
                echo $this->Html->link(
                    $this->Identity->isLoggedIn() ? 'Logout' : 'Log in',
                    $this->Identity->isLoggedIn() ? ['controller' => 'Auth', 'action' => 'logout'] : ['controller' => 'Auth', 'action' => 'login'],
                    ['class' => 'button button-outline ' . $buttonClass]);
                ?>
            </div>
            <div class>

            </div>
        </div>
</header>

<div class="row">
    <div class="column column-80">
        <div class="contact-form" style="margin-bottom: 20px;">
            <?= $this->Form->create($contactForm, ['class' => 'contact-form']) ?>
            <fieldset>
                <legend><?= __('Contact Us') ?></legend>
                <div class="form-group">
                    <?= $this->Form->control('email', ['required' => true, 'label' => ['text' => 'Email', 'class' => 'required-asterisk'], 'class' => 'form-control']) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('phone_number', ['label' => 'Phone Number', 'id' => 'phone_number', 'required' => false, 'class' => 'form-control']) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('first_name', ['required' => true, 'label' => ['text' => 'First name', 'class' => 'required-asterisk'], 'class' => 'form-control']) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('last_name', ['required' => true, 'label' => ['text' => 'Last name', 'class' => 'required-asterisk'], 'class' => 'form-control']) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('query_nature', [
                        'type' => 'select',
                        'options' => $requestNatureOptions,
                        'empty' => 'Please select...',
                        'required' => true,
                        'label' => ['text' => 'Query Nature', 'class' => 'required-asterisk'],
                        'class' => 'form-control'
                    ]) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('query', ['required' => true, 'type' => 'textarea', 'label' => ['text' => 'Query', 'class' => 'required-asterisk'], 'class' => 'form-control large-textarea']) ?>
                </div>
            </fieldset>
            <p style="color:red"><span class="required">*</span> Indicates required field</p>

            <div style="text-align: center;">
                <?= $this->Form->button(__('Submit'), ['style' => 'background-color: #4a90e2; color: white;']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
        <div style="text-align: center; margin-bottom: 20px;">
            <?= $this->Html->link('Go to Homepage', ['controller' => 'Pages', 'action' => 'display', 'home'], ['class' => 'btn btn-secondary']) ?>
        </div>
    </div>
</div>
    <!-- 
<footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <h2>About Us</h2>
                    <p>
                    Coral Coast Travel has been a specialist in Southeast Asian Travel since 1984, now expanding to international travel.
                    </p>
                    <p>We prioritise modern travel experiences through an end-to-end online platform, offering worldwide travel options including cruises and air travel, along with accommodation, car rentals, travel insurance, and translation services. </p>
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
                    <address class="md-margin-bottom-40">
                        Coral Coast <br>
                        Wellington Rd, <br>
                        Clayton, VIC <br>
                    </address>
                    <a href= <?= $this->Url->build(['controller' => 'ContactForms', 'action' => 'add'])?>>Make an enquiry</a>
                </div>
            </div>
        </div>


    </footer>

-->