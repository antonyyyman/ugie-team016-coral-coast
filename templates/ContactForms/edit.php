<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ContactForm $contactForm
 */
    $this->Html->script(['jquery-3.2.1.min', 'popper.min', 'bootstrap.min', 'script'], ['block' => true]);
    $this->Html->css('contact-form', ['block' => true]);
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $contactForm->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $contactForm->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Contact Forms'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="contactForms form content">
            <?= $this->Form->create($contactForm) ?>
            <fieldset>
                <legend><?= __('Edit Contact Form') ?></legend>
                <?php
                    echo $this->Form->control('email', ['required' => true, 'label' => ['text' => 'Email', 'class' => 'required-asterisk']]);
                    echo $this->Form->control('phone_number', ['label' => 'Phone Number', 'id' => 'phone_number', 'required' => false]);
                    echo $this->Form->control('first_name', ['required' => true,'label' => ['text' => 'First name', 'class' => 'required-asterisk']]);
                    echo $this->Form->control('last_name', ['required' => true,'label' => ['text' => 'Last name', 'class' => 'required-asterisk']]);
                    echo $this->Form->control('query_nature', [
                        'type' => 'select',
                        'options' => $requestNatureOptions,
                        'empty' => 'Please select...',
                        'required' => true,
                        'label' => ['text' => 'Query Nature', 'class' => 'required-asterisk']
                    ]);
                    echo $this->Form->control('query', ['required' => true, 'type' => 'textarea', 'label' => ['text' => 'Query','class' => 'required-asterisk'],'class' => 'large-textarea']);
                ?>
            </fieldset>
            <p style="color:red"><span class="required">*</span> Indicates required field</p>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
