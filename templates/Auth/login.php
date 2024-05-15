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
    
    body {
        background-color: #3498db; 
        font-family: Arial, sans-serif;
    }
    .login-container {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .login-box {
        position: relative;
        background-color: #fff; 
        color: #333; 
        padding: 40px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
    }
    
    .login-image {
        margin-bottom: 20px;
        width: 400px; 
        height: 90px; 
        border-radius: 50%;
    }

    
    .login-image img {
        width: 100px%;
        height: 100%;
        border-radius: 50%;
    }
    

    .login-box h2 {
        margin-bottom: 20px;
        color: #3498db; 
    }
    .form-control {
        margin-bottom: 20px;
        padding: 10px;
        border: 1px solid #ccc; 
        border-radius: 4px;
        width: 100%;
        box-sizing: border-box;
    }
    .form-control:focus {
        outline: none;
        border-color: #3498db; 
    }
    .btn-login {
        display: block;
        margin: 0 auto;
        background-color: orange; 
        color: #fff; 
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    .btn-login:hover {
        background-color: #e67e22; 
    }
    .forgot-password-link {
        display: inline-block;
        color: #f39c12; 
        text-decoration: none;
        margin-top: 10px;
    }
    .forgot-password-link:hover {
        text-decoration: underline;
    }
    .register-link {
        color: #3498db; 
        text-decoration: none;
    }
    .register-link:hover {
        text-decoration: underline;
    }
</style>



<div class="login-container">
    <div class="login-box">
        <div class="login-image"><?= $this->ContentBlock->image('logo'); ?></div>
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
            echo $this->Form->control('remember_me', [
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
        <?= $this->Html->link('Go to Homepage', '/pages/home', ['class' => 'button button-clear']) ?>
    </div>
</div>
