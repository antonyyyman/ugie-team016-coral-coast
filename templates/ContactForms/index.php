<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ContactForm> $contactForms
 */
    $this->Html->script('script', ['block' => true]);
    $this->Html->css('contact-form', ['block' => true]);
?>

<head>
    <style>
        body {
            border: 1px solid #ccc;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
            font-size: 16px;
            vertical-align: middle;
            text-align: center;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f9f9f9;
        }
        thead {
            position: sticky;
            top: 0;
            background-color: #fff;
            z-index: 10;
        }
        .actions {
            display: inline-block;
            vertical-align: middle;
            justify-content: space-around;
            padding: 10px 0;

            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .button-link {
            display: block;
            box-sizing: border-box;
            width: 95%;
            margin: 4px 0;
            text-align: center;
            padding: 8px 0;
            border: 1px solid #ccc;
            background-color: #fefefe;
            text-decoration: none;
            color: #333;
            border-radius: 5px;
        }
        .button-link:hover {
            background-color: #e7e7e7;
            border-color: #adadad;
        }

        td:nth-child(7) {
        text-align: left;
        width:50%; 
        max-width: 250px;
        word-wrap: break-word;
        }
    </style>
</head>

<div class="contactForms index content">
    <h3><?= __('Contact Forms') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', 'Reference #') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('phone_number') ?></th>
                    <th><?= $this->Paginator->sort('first_name') ?></th>
                    <th><?= $this->Paginator->sort('last_name') ?></th>
                    <th><?= $this->Paginator->sort('query_nature') ?></th>
                    <th><?= $this->Paginator->sort('query') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contactForms as $contactForm): ?>
                <tr>
                    <td><?= $this->Number->format($contactForm->id) ?></td>
                    <td><?= h($contactForm->email) ?></td>
                    <td><?= h($contactForm->phone_number) ?></td>
                    <td><?= h($contactForm->first_name) ?></td>
                    <td><?= h($contactForm->last_name) ?></td>
                    <td><?= h($contactForm->query_nature) ?></td>
                    <td>
                    <div class="content-container">
                        <?php
                        $truncatedText = $this->Text->truncate(h($contactForm->query), 150, [
                            'ellipsis' => '...',
                            'exact' => false,
                            'html' => false
                        ]);
                        echo '<span class="text-preview">' . $truncatedText . '</span>';
                        if (strlen(h($contactForm->query)) > 150) {
                            echo '<span class="full-text hidden">' . h($contactForm->query) . '</span>';
                            echo '<span class="toggle-text" onclick="toggleText(this)" style="color: blue; cursor: pointer; text-decoration: underline;">Show More</span>';
                        } else {
                            echo '<span>' . h($contactForm->query) . '</span>';
                        }
                        ?>
                    </div>
                    </td>
                    <td><?= h($contactForm->created) ?></td>
                    <td><?= h($contactForm->modified) ?></td>                  
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $contactForm->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contactForm->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $contactForm->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contactForm->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
