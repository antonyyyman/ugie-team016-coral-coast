<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Booking $booking
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $insurances
 * @var \Cake\Collection\CollectionInterface|string[] $hotels
 * @var \Cake\Collection\CollectionInterface|string[] $carRentals
 * @var \Cake\Collection\CollectionInterface|string[] $translations
 * @var \Cake\Collection\CollectionInterface|string[] $flights
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Bookings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="bookings form content">
            <?= $this->Form->create($booking) ?>
            <fieldset>
                <legend><?= __('Add Booking') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
                    echo $this->Form->control('start_date', ['empty' => true]);
                    echo $this->Form->control('end_date', ['empty' => true]);
                    echo $this->Form->control('destination');
                    echo $this->Form->control('insurance_id', ['options' => $insurances, 'empty' => true]);
                    echo $this->Form->control('hotel_id', ['options' => $hotels, 'empty' => true]);
                    echo $this->Form->control('car_rental_id', ['options' => $carRentals, 'empty' => true]);
                    echo $this->Form->control('translation_id', ['options' => $translations, 'empty' => true]);
                    echo $this->Form->control('flight_id', ['options' => $flights, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
