<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cruise $cruise
 */
$this->setLayout("defaultadmin");
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $cruise->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cruise->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Cruises'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="cruises form content">
            <?= $this->Form->create($cruise) ?>
            <fieldset>
                <legend><?= __('Edit Cruise') ?></legend>
                <?php
                    echo $this->Form->control('company');
                    echo $this->Form->control('description');
                    echo $this->Form->control('price');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
