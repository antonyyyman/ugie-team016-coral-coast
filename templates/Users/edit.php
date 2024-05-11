<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
if($this->Identity->get('is_staff') == true){
    $this->Html->script('script', ['block' => true]);
    $this->Html->css('contact-form', ['block' => true]);
    //$this->setLayout("defaultadmin");
} else {
    $this->setLayout("unauthorised");
}
?>

<head>
<style>
        header {
            margin-bottom: 20px;
        }
        .content-container {
            padding-top: 20px;
        }
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }
        main {
            flex: 1; 
            padding: 100px; 
        }
        .spacer-for-fixed-header {
        height: 100px; 
        }

</style>
</head>

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Edit User') ?></legend>
                <?php
                    echo $this->Form->control('username');
                    echo $this->Form->control('first_name');
                    echo $this->Form->control('last_name');
                    echo $this->Form->control('password');
                    echo $this->Form->control('email');
                    echo $this->Form->control('phone_number');
                    echo $this->Form->control('is_staff');
                    echo $this->Form->control('nonce');
                    echo $this->Form->control('nonce_expiry', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
