<?php
/**
 * @var \App\View\AppView $this
 */

$this->layout = 'login';
$this->assign('title', 'Forget Password');
?>

<style>
    body, html {
        height: 100%;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .login .form {
        max-width: 600px; /* Adjusted width */
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

    .form p {
        margin-bottom: 15px;
    }

    .form .column {
        margin-bottom: 15px;
    }

    .form .button {
        width: 100%;
        margin-top: 20px;
    }

    .hr-between-buttons {
        margin: 20px 0;
        border: 0;
        border-top: 1px solid #ccc;
    }

    .button-outline {
        display: inline-block;
        background-color: transparent;
        color: #333;
        border: 1px solid #333;
        padding: 8px 16px;
        border-radius: 4px;
        text-decoration: none;
        transition: background-color 0.3s, color 0.3s;
    }

    .button-outline:hover {
        background-color: #333;
        color: #fff;
    }

    .back-to-login {
        text-align: center;
    }
</style>

<div class="container login">
    <div class="row">
        <div class="column column-50 column-offset-25">

            <div class="users form content">
                <?= $this->Form->create() ?>

                <fieldset>
                    <legend>Forget Password</legend>

                    <?= $this->Flash->render() ?>

                    <p>Enter your email address registered with our system below to reset your password: </p>

                    <div class="column">
                        <?= $this->Form->control('email', [
                            'type' => 'email',
                            'required' => true,
                            'autofocus' => true,
                            'label' => false,
                            'placeholder' => 'Email'
                        ]); ?>
                    </div>
                </fieldset>

                <?= $this->Form->button('Send verification email', ['class' => 'button']) ?>
                <?= $this->Form->end() ?>

                <hr class="hr-between-buttons">

                <div class="back-to-login">
                    <?= $this->Html->link('Back to login', ['controller' => 'Auth', 'action' => 'login'], ['class' => 'button button-outline']) ?>
                </div>

            </div>
        </div>
    </div>
</div>
