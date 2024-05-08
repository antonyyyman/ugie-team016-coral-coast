<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Booking $booking
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $insurances
 * @var string[]|\Cake\Collection\CollectionInterface $hotels
 * @var string[]|\Cake\Collection\CollectionInterface $carRentals
 * @var string[]|\Cake\Collection\CollectionInterface $translations
 * @var string[]|\Cake\Collection\CollectionInterface $flights
 */
$this->setLayout("defaultadmin");
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $booking->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $booking->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Bookings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="bookings form content">
            <?= $this->Form->create($booking) ?>
            <fieldset>
                <legend><?= __('Edit Booking') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['disabled' => true, 'value' => $user_id]);
                    echo $this->Form->control('start_date', ['empty' => true, 'id' => 'start-date']);
                    echo $this->Form->control('end_date', ['empty' => true, 'id' => 'end-date']);
                    echo $this->Form->control('destination');

                    echo $this->Form->control('hotel_id', ['options' => $hotels, 'empty' => true]);
                    echo $this->Form->control('car_rental_id', ['options' => $carRentals, 'empty' => true]);
                    echo $this->Form->control('insurance_id', ['options' => $insurances, 'empty' => true]);
                    echo $this->Form->control('translation_id', ['options' => $translations, 'empty' => true]);
                    echo $this->Form->control('travel_deal_id');

                    echo $this->Form->control('total_price', ["disabled"=>true]);
//                    echo $this->Form->control('payment_id');

                    $bookingStatus = $booking['booking_status'] ?? false;
                    if ($bookingStatus == true) {
                        echo 'Booking Active!';
                    }
                    else {
                        echo 'Booking Cancelled!';
                    }
                    echo '   Click checkbox below to change booking status';

                    echo $this->Form->control('booking_status');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>



// js to stop form submission in front end
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        const startDateInput = document.getElementById('start-date');
        const endDateInput = document.getElementById('end-date');
        const form = document.querySelector('form');

        form.addEventListener('submit', function (event) {
            const startDate = new Date(startDateInput.value);
            const endDate = new Date(endDateInput.value);

            if (startDate > endDate) {
                alert('Return Date Cannot be Earlier than Start Date');
                event.preventDefault();
            }
        });
    });
</script>
