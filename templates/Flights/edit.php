<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Flight $flight
 */
$this->setLayout("defaultadmin");
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $flight->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $flight->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Flights'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="flights form content">
            <?= $this->Form->create($flight) ?>
            <fieldset>
                <legend><?= __('Edit Flight') ?></legend>
                <?php
                    echo $this->Form->control('number');
                    echo $this->Form->control('departure_airport');
                    echo $this->Form->control('arrival_airport');
                    echo $this->Form->control('departure_date', ['empty' => true]);
                    echo $this->Form->control('arrival_date', ['empty' => true]);
                    echo $this->Form->control('price');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
