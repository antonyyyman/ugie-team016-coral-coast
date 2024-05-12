<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ContactForm $contactForm
 */
$this->Html->script('script', ['block' => true]);
$this->Html->css('contact-form', ['block' => true]);
?>
<div class="row">
    <div class="column column-80">
        <div class="contact-form" style="margin-bottom: 20px;">
            <?= $this->Form->create($contactForm, ['class' => 'contact-form']) ?>
            <fieldset>
                <legend><?= __('Contact Us') ?></legend>
                <div class="form-group">
                    <?= $this->Form->control('email', ['required' => true, 'label' => ['text' => 'Email', 'class' => 'required-asterisk'], 'class' => 'form-control']) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('phone_number', ['label' => 'Phone Number', 'id' => 'phone_number', 'required' => false, 'class' => 'form-control']) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('first_name', ['required' => true, 'label' => ['text' => 'First name', 'class' => 'required-asterisk'], 'class' => 'form-control']) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('last_name', ['required' => true, 'label' => ['text' => 'Last name', 'class' => 'required-asterisk'], 'class' => 'form-control']) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('query_nature', [
                        'type' => 'select',
                        'options' => $requestNatureOptions,
                        'empty' => 'Please select...',
                        'required' => true,
                        'label' => ['text' => 'Query Nature', 'class' => 'required-asterisk'],
                        'class' => 'form-control'
                    ]) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('query', ['required' => true, 'type' => 'textarea', 'label' => ['text' => 'Query', 'class' => 'required-asterisk'], 'class' => 'form-control large-textarea']) ?>
                </div>
            </fieldset>
            <p style="color:red"><span class="required">*</span> Indicates required field</p>

            <div style="text-align: center;">
                <?= $this->Form->button(__('Submit'), ['style' => 'background-color: #4a90e2; color: white;']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
        <div style="text-align: center; margin-bottom: 20px;">
            <?= $this->Html->link('Go to Homepage', ['controller' => 'Pages', 'action' => 'display', 'home'], ['class' => 'btn btn-secondary']) ?>
        </div>
    </div>
</div>
