<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ContactForm $contactForm
 */

 $this->Html->scriptBlock("
    document.addEventListener('DOMContentLoaded', function() {
        var message = " . json_encode($this->Flash->render('flash', ['element' => 'success'])) . ";
        if (message) {
            alert(message);
            window.location.href = '" . $this->Url->build(['controller' => 'Pages', 'action' => 'display', 'home']) . "';
        }
    });
", ['block' => true]);
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
                    echo $this->Form->control('email');
                    echo $this->Form->control('phone_number', ['default' => null]);
                    echo $this->Form->control('first_name');
                    echo $this->Form->control('last_name');
                    echo $this->Form->control('query',['type' => 'textarea', 'style' => 'width: 100%; height: 300px; resize: none; overflow-y: auto;']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?> All fields required unless marked optional
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
