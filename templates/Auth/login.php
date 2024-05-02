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
<style>
    /* CSS for centering the login box */
    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .row {
        justify-content: center; /* Center horizontally */
    }
</style>

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
//Set box to be checked if there is a value saved, assuming user wants to keep their email remembered.
'checked' => !empty($rememberedEmail),
]);
?>
</fieldset>

<?= $this->Form->button('Login') ?>
<?= $this->Html->link('Forgot password?', ['controller' => 'Auth', 'action' => 'forgetPassword'], ['class' => 'button button-outline']) ?>
<?= $this->Form->end() ?>

<hr class="hr-between-buttons">

<?= $this->Html->link('Register new user', ['controller' => 'Auth', 'action' => 'register'], ['class' => 'button button-clear']) ?>
<?= $this->Html->link('Go to Homepage', '/pages/home', ['class' => 'button button-clear']) ?>
