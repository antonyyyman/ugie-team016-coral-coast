<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ContactForm> $contactForms
 */

    if($this->Identity->get('is_staff') == true){
        $this->Html->script(['jquery-3.2.1.min', 'popper.min', 'bootstrap.min', 'script'], ['block' => true]);
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

<h3 class="text-center"><?= __('Contact Forms') ?></h3>
<?php if ($this->Identity->get('is_staff') == true) {
    echo $this->Html->link(__('New Contact Form'), ['action' => 'add'], ['class' => 'btn btn-primary float-right']);
}
?>
<div class="container">
    <?php foreach ($contactForms as $contactForm): ?>
        <div class="card card-body mb-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title"> Reference #: <?= h($contactForm->id) ?></h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="card-text"><strong><?= __('Email') ?></strong>: <?= h($contactForm->email) ?></p>
                            <p class="card-text"><strong><?= __('Phone Number') ?></strong>: <?= h($contactForm->phone_number) ?></p>
                        </div>
                        <div class="col-md-6">
                            <p class="card-text"><strong><?= __('First Name') ?></strong>: <?= h($contactForm->first_name) ?></p>
                            <p class="card-text"><strong><?= __('Last Name') ?></strong>: <?= h($contactForm->last_name) ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="card-text"><strong><?= __('Query Nature') ?></strong>: <?= h($contactForm->query_nature) ?></p>
                            <p class="card-text"><strong><?= __('Query') ?></strong>:
                                <?php
                                // Check if text needs to be truncated
                                $isLongText = strlen(h($contactForm->query)) > 150;
                                // If true truncate, else just show text
                                if ($isLongText) {
                                    $truncatedText = $this->Text->truncate(h($contactForm->query), 150, [
                                        'ellipsis' => '...',
                                        'exact' => false,
                                        'html' => false
                                    ]);
                                    echo '<span class="text-preview">' . $truncatedText . '</span>';
                                    echo '<span class="full-text hidden">' . h($contactForm->query) . '</span>';
                                    echo '<span class="toggle-text" onclick="toggleText(this)" style="color: blue; cursor: pointer; text-decoration: underline;">Show More</span>';
                                } else {
                                    echo '<span>' . h($contactForm->query) . '</span>';
                                }
                                ?>
                            </p>
                        </div></div>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $contactForm->id], ['class' => 'btn btn-primary btn-sm']) ?>
                            <?php if ($this->Identity->get('is_staff') == true) {
                                echo $this->Html->link(__('Edit'), ['action' => 'edit', $contactForm->id], ['class' => 'btn btn-warning btn-sm']);
                                echo '&nbsp;';
                                echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $contactForm->id], ['class' => 'btn btn-danger btn-sm', 'confirm' => __('Are you sure you want to delete # {0}?', $contactForm->id)]);
                            }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
