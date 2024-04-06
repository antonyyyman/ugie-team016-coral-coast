<?php
/**
 * @var \App\View\AppView $this
 */

use Cake\Core\Configure;

$debug = Configure::read('debug');
$rememberedEmail = isset($_COOKIE['remembered_email']) ? $_COOKIE['remembered_email'] : '';

$this->layout = 'login';
$this->assign('title', 'Login');
?>
<div class="container login">
    <div class="row">
        <div class="column column-50 column-offset-25">
            <div class="users form content">

                <?= $this->Form->create() ?>

                <fieldset>

                    <legend style="text-align:center;">Login</legend>

                    <?= $this->Flash->render() ?>

                    <?php

                    echo $this->Form->control('email', [
                        'type' => 'email',
                        'required' => true,
                        'autofocus' => true,
                        'value' => $rememberedEmail,
                    ]);
                    echo $this->Form->control('password', [
                        'type' => 'password',
                        'required' => true,
                        'value' => "",
                    ]);
                    echo $this->Form->control('remember_me',[
                        'type' => 'checkbox',
                        'label' => 'Remember me',
                        'value' => '1',
                        'checked' => !empty($rememberedEmail),
                    ]);
                    ?>
                </fieldset>

                <?= $this->Form->button('Login') ?>
                <?= $this->Html->link('Forgot password?', ['controller' => 'Auth', 'action' => 'forgetPassword'], ['class' => 'button button-outline']) ?>
                <?= $this->Form->end() ?>

                <hr class="hr-between-buttons">

                <?= $this->Html->link('Register new user', ['controller' => 'Auth', 'action' => 'register'], ['class' => 'button button-clear']) ?>
                <?= $this->Html->link('Go to Homepage', '/', ['class' => 'button button-clear']) ?>
            </div>
        </div>
    </div>
</div>
