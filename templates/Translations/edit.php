<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Translation $translation
 */
$this->setLayout("defaultadmin");
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $translation->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $translation->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Translations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="translations form content">
            <?= $this->Form->create($translation) ?>
            <fieldset>
                <legend><?= __('Edit Translation') ?></legend>
                <?php
                    echo $this->Form->control('language_from');
                    echo $this->Form->control('language_to');
                    echo $this->Form->control('description');
                    echo $this->Form->control('price');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
