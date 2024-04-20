<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ContactForm $contactForm
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Contact Forms'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="contactForms form content">
            <?= $this->Form->create($contactForm) ?>
            <fieldset>
                <legend><?= __('Add Contact Form') ?></legend>
                <?php
                    echo $this->Form->control('email', ['required' => true, 'label' => 'Email*']);
                    echo $this->Form->control('phone_number', ['label' => 'Phone Number', 'id' => 'phone_number', 'required' => false]);
                    echo $this->Form->control('first_name', ['required' => true, 'label' => 'First name*']);
                    echo $this->Form->control('last_name', ['required' => true, 'label' => 'Last name*']);
                    echo $this->Form->control('query_nature', [
                        'type' => 'select',
                        'options' => $requestNatureOptions,
                        'empty' => 'Please select...',
                        'required' => true,
                        'label' => 'Query Nature*'
                    ]);
                    echo $this->Form->control('query', ['required' => true, 'label' => 'Query*']);             
                ?>
            </fieldset>
            <p><span class="required">*</span> Indicates required field</p>
            <?= $this->Form->button(__('Submit')) ?> 
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
