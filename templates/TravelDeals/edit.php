<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TravelDeal $travelDeal
 * @var string[]|\Cake\Collection\CollectionInterface $insurances
 * @var string[]|\Cake\Collection\CollectionInterface $hotels
 * @var string[]|\Cake\Collection\CollectionInterface $carRentals
 * @var string[]|\Cake\Collection\CollectionInterface $translations
 * @var string[]|\Cake\Collection\CollectionInterface $flights
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $travelDeal->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $travelDeal->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Travel Deals'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="travelDeals form content">
            <?= $this->Form->create($travelDeal) ?>
            <fieldset>
                <legend><?= __('Edit Travel Deal') ?></legend>
                <?php
                    echo $this->Form->control('start_date', ['empty' => true]);
                    echo $this->Form->control('end_date', ['empty' => true]);
                    echo $this->Form->control('description');
                    echo $this->Form->control('total_price');
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
