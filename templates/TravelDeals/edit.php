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
$this->setLayout('defaultadmin');
?>

<head>
<style>
        header {
            margin-bottom: 20px;
        }
        .content-container {
            padding-top: 20px;
        }
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }
        main {
            flex: 1; 
            padding: 100px; 
        }
        .spacer-for-fixed-header {
        height: 100px; 
        }

</style>
</head>

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

                    //for flights
                    echo $this->Form->control('flights._ids', [
                        'type' => 'select',
                        'multiple' => 'checkbox',
                        'options' => $flight_pnt_detail,
                        'label' => __('Select Flights')
                    ]);

                    echo $this->Form->control('insurance_id', ['options' => $insurances, 'empty' => true]);
                    echo $this->Form->control('hotel_id', ['options' => $hotels, 'empty' => true]);
                    echo $this->Form->control('cruise_id');
                    echo $this->Form->control('car_rental_id', ['options' => $carRentals, 'empty' => true]);
                    echo $this->Form->control('translation_id', ['options' => $translations, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
