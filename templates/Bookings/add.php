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
$this->setLayout("defaultadmin");
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
                    echo $this->Form->control('user_id', ['disabled' => true, 'value' => $user_id]);
                    echo $this->Form->control('start_date', ['empty' => true, 'id' => 'start-date']);
                    echo $this->Form->control('end_date', ['empty' => true, 'id' => 'end-date']);
                    echo $this->Form->control('destination');
                    echo $this->Form->control('hotel_id', ['options' => $hotels, 'empty' => true]);
                    echo $this->Form->control('car_rental_id', ['options' => $carRentals, 'empty' => true]);
                    echo $this->Form->control('insurance_id', ['options' => $insurances, 'empty' => true]);
                    echo $this->Form->control('translation_id', ['options' => $translations, 'empty' => true]);
                    echo $this->Form->control('payment_id');
                    echo $this->Form->control('travel_deal_id');
//                    echo $this->Form->control('total_price');
//                    echo $this->Form->control('booking_status');
                    echo $this->Form->hidden('booking_status', ['value' => '1']);

                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<!--// js to stop form submission in front end-->
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        const startDateInput = document.getElementById('start-date');
        const endDateInput = document.getElementById('end-date');
        const form = document.querySelector('form');

        form.addEventListener('submit', function (event) {
            const startDate = new Date(startDateInput.value);
            const endDate = new Date(endDateInput.value);

            if (startDate > endDate) {
                alert('Return Date Cannot be Eailier than Start Date');
                event.preventDefault();
            }
        });
    });
</script>
