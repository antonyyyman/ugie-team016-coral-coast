<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ContactForm> $contactForms
 */
?>
<div class="contactForms index content">
    <h3><?= __('Contact Forms') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('phone_number') ?></th>
                    <th><?= $this->Paginator->sort('first_name') ?></th>
                    <th><?= $this->Paginator->sort('last_name') ?></th>
                    <th><?= $this->Paginator->sort('query') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('query_nature') ?></th>
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
                    <td><?= h($contactForm->query) ?></td>
                    <td><?= h($contactForm->created) ?></td>
                    <td><?= h($contactForm->modified) ?></td>
                    <td><?= h($contactForm->query_nature) ?></td>
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
