<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Translation $translation
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Translations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="translations form content">
            <?= $this->Form->create($translation) ?>
            <fieldset>
                <legend><?= __('Add Translation') ?></legend>
                <?php
                    echo $this->Form->control('from_language');
                    echo $this->Form->control('to_language');
                    echo $this->Form->control('description');
                    echo $this->Form->control('price');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
