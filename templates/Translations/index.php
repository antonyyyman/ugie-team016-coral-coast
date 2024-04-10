<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Translation> $translations
 */
?>
<div class="translations index content">
    <?= $this->Html->link(__('New Translation'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Translations') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('from_language') ?></th>
                    <th><?= $this->Paginator->sort('to_language') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th><?= $this->Paginator->sort('price') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($translations as $translation): ?>
                <tr>
                    <td><?= $this->Number->format($translation->id) ?></td>
                    <td><?= h($translation->from_language) ?></td>
                    <td><?= h($translation->to_language) ?></td>
                    <td><?= h($translation->description) ?></td>
                    <td><?= $translation->price === null ? '' : $this->Number->format($translation->price) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $translation->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $translation->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $translation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $translation->id)]) ?>
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