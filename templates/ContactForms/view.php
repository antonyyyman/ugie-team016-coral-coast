<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ContactForm $contactForm
 */
    $this->Html->script('script', ['block' => true]);
    $this->Html->css('contact-form', ['block' => true]);
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Contact Form'), ['action' => 'edit', $contactForm->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Contact Form'), ['action' => 'delete', $contactForm->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contactForm->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Contact Forms'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Contact Form'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="contactForms view content">
            <h3><?= h($contactForm->email) ?></h3>
            <table>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($contactForm->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone Number') ?></th>
                    <td><?= h($contactForm->phone_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('First Name') ?></th>
                    <td><?= h($contactForm->first_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Name') ?></th>
                    <td><?= h($contactForm->last_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Query Nature') ?></th>
                    <td><?= h($contactForm->query_nature) ?></td>
                </tr>
                <tr>
                <th><?= __('Query') ?></th>
                <td>
                    <div class="content-container">
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
                    </div>
                    </td>
                </tr>
                <tr>
                    <th><?= __('Reference Number') ?></th>
                    <td><?= $this->Number->format($contactForm->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($contactForm->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($contactForm->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
