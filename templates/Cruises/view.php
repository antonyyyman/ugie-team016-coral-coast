<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cruise $cruise
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Cruise'), ['action' => 'edit', $cruise->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Cruise'), ['action' => 'delete', $cruise->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cruise->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Cruises'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Cruise'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="cruises view content">
            <h3><?= h($cruise->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Company') ?></th>
                    <td><?= h($cruise->company) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($cruise->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($cruise->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price') ?></th>
                    <td><?= $cruise->price === null ? '' : $this->Number->format($cruise->price) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
