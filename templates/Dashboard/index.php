<!-- In src/Template/Dashboard/index.ctp -->

<h1>Dashboard</h1>
<ul>
    <li><a href="<?php echo $this->Url->build(['controller' => 'Bookings', 'action' => 'index']); ?>">Bookings</a></li>
    <li><a href="<?php echo $this->Url->build(['controller' => 'BookingsFlights', 'action' => 'index']); ?>">Bookings Flights</a></li>
    <li><a href="<?php echo $this->Url->build(['controller' => 'CarRentals', 'action' => 'index']); ?>">Car Rentals</a></li>
    <li><a href="<?php echo $this->Url->build(['controller' => 'Cruises', 'action' => 'index']); ?>">Cruises</a></li>
    <li><a href="<?php echo $this->Url->build(['controller' => 'FlightTravelDeals', 'action' => 'index']); ?>">Flight Travel Deals</a></li>
    <li><a href="<?php echo $this->Url->build(['controller' => 'Flights', 'action' => 'index']); ?>">Flights</a></li>
    <li><a href="<?php echo $this->Url->build(['controller' => 'Hotels', 'action' => 'index']); ?>">Hotels</a></li>
    <li><a href="<?php echo $this->Url->build(['controller' => 'Insurances', 'action' => 'index']); ?>">Insurances</a></li>
    <li><a href="<?php echo $this->Url->build(['controller' => 'Payments', 'action' => 'index']); ?>">Payments</a></li>
    <li><a href="<?php echo $this->Url->build(['controller' => 'Translations', 'action' => 'index']); ?>">Translations</a></li>
    <li><a href="<?php echo $this->Url->build(['controller' => 'TravelDeals', 'action' => 'index']); ?>">Travel Deals</a></li>
    <li><a href="<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'index']); ?>">Users</a></li>
</ul>
