<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CarRental $carRental
 */
$this->setLayout("defaultadmin");
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Car Rentals'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="carRentals form content">
            <?= $this->Form->create($carRental) ?>
            <fieldset>
                <legend><?= __('Add Car Rental') ?></legend>
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
