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
            <?= $this->Form->create($contactForm, ['onsubmit' => 'return validatePhoneNumber()']) ?>
            <fieldset>
                <legend><?= __('Add Contact Form') ?></legend>
                <?php
                    echo $this->Form->control('email');
                    echo $this->Form->control('phone_number', ['label' => 'Phone Number', 'id' => 'phone_number']);
                    echo $this->Form->control('first_name');
                    echo $this->Form->control('last_name');
                    echo $this->Form->control('request_nature', [
                        'type' => 'select',
                        'options' => $requestNatureOptions,
                        'empty' => 'Please select...',
                        'required' => true
                    ]);
                    echo $this->Form->control('query');             
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<script>
function validatePhoneNumber() {
    var phoneNumber = document.getElementById('phone_number').value;
    if (!phoneNumber.startsWith('04') || phoneNumber.length !== 10) {
        alert('Phone number must start with "04" and be exactly 10 digits long.');
        return false; // Prevent form submission
    }
    return true; // Allow form submission
}
</script>
