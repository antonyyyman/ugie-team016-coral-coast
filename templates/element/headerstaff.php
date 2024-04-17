<header id="menu-jk" class="container-fluid">
        <div class="row">
            <div class="col-md-3 logo">
            <a href="/team016-app_fit3047/pages/home">
                <img src="/team016-app_fit3047/webroot/img/logo_coralcoast.png" alt="Coral Coast Logo">
            </a>
                 <a data-toggle="collapse" data-target="#menu" href="#menu"><i class="fas d-block d-lg-none  small-menu fa-bars"></i></a>
            </div>
            <div id="menu" class="col-lg-6 col-md-9 d-none d-md-block navs">
                <ul>
                <li><a href=<?= $this->Url->build(['controller' => 'Dashboard', 'action' => 'index'])?>>Dashboard</a></li>
                    <li><a href=<?= $this->Url->build(['controller' =>'Bookings', 'action' => 'index'])?>>Bookings</a></li>
                    <li><a href="<?= $this->Url->build(['controller' => 'Flights', 'action' => 'index'])?>">Flights</a></li>
                    <li><a href=<?= $this->Url->build(['controller' => 'Hotels', 'action' => 'index'])?>>Hotels</a></li>
                    <li><a href="/team016-app_fit3047/payments">Payments</a></li>
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
