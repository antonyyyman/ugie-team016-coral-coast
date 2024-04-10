<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CarRental $carRental
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $carRental->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $carRental->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Car Rentals'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="carRentals form content">
            <?= $this->Form->create($carRental) ?>
            <fieldset>
                <legend><?= __('Edit Car Rental') ?></legend>
                <?php
                    echo $this->Form->control('company');
                    echo $this->Form->control('description');
                    echo $this->Form->control('plate');
                    echo $this->Form->control('brand');
                    echo $this->Form->control('price');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
