<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

$this->layout = 'login';
$this->assign('title', 'Register new user');
?>

<style>
    .register {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .register .form {
        max-width: 400px;
        width: 100%;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form legend {
        font-size: 1.2rem;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .form .row {
        margin-bottom: 15px;
    }

    .form .column {
        flex: 1;
        margin-right: 10px;
    }

    .form .column:last-child {
        margin-right: 0;
    }

    .form .button {
        width: 100%;
        margin-top: 20px;
    }

    .float-right {
        float: right;
    }
</style>

<div class="container register">
    <div class="users form content">
        <?= $this->Form->create($user) ?>

        <fieldset>
            <legend>Register new user</legend>

            <?= $this->Flash->render() ?>

            <div class="row">
                <div class="column">
                    <?= $this->Form->control('first_name', ['placeholder' => 'First Name']); ?>
                </div>
                <div class="column">
                    <?= $this->Form->control('last_name', ['placeholder' => 'Last Name']); ?>
                </div>
            </div>

            <div class="row">
                <div class="column">
                    <?= $this->Form->control('email', ['placeholder' => 'Email']); ?>
                </div>
                <div class="column">
                    <?= $this->Form->control('username', ['placeholder' => 'Username']); ?>
                </div>
            </div>

            <div class="row">
                <div class="column">
                    <?= $this->Form->control('phone_number', ['placeholder' => 'Phone Number']); ?>
                </div>
            </div>

            <div class="row">
                <div class="column">
                    <?= $this->Form->control('password', [
                        'placeholder' => 'Password',
                        'value' => '',  // Ensure password is not sent back to the client side
                    ]); ?>
                </div>
                <div class="column">
                    <?= $this->Form->control('password_confirm', [
                        'type' => 'password',
                        'placeholder' => 'Retype Password',
                        'value' => '',  // Ensure password is not sent back to the client side
                    ]); ?>
                </div>
            </div>

            <div class="row">
                <div class="column">
                    <?= $this->Form->control('avatar', ['type' => 'file', 'label' => 'Choose Avatar']); ?>
                </div>
            </div>

        </fieldset>

        <div class="row">
            <div class="column">
                <?= $this->Form->button('Register', ['class' => 'button']) ?>
            </div>
            <div class="column">
                <?= $this->Html->link('Back to login', ['controller' => 'Auth', 'action' => 'login'], ['class' => 'button button-outline float-right']) ?>
            </div>
        </div>

        <?= $this->Form->end() ?>

    </div>
</div>
