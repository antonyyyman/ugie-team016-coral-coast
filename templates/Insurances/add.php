<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Insurance $insurance
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Insurances'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="insurances form content">
            <?= $this->Form->create($insurance) ?>
            <fieldset>
                <legend><?= __('Add Insurance') ?></legend>
                <?php
                    echo $this->Form->control('supplier');
                    echo $this->Form->control('level');
                    echo $this->Form->control('description');
                    echo $this->Form->control('price');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
