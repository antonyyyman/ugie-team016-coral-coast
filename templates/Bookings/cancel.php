<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Booking $booking
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
$this->setLayout('defaultadmin');
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

<div class="table-responsive">
    <?php if (isset($booking) && $booking->id) : ?>
        <?= $this->Form->create($booking, ['url' => ['action' => 'cancel', $booking->id], 'type' => 'post']) ?>
        <fieldset>
            <legend><?= __('Cancel Booking') ?></legend>
            <?php
            echo $this->Form->control('cancel_reason', [
                'type' => 'select',
                'options' => [
                    'No longer needed' => 'No longer needed',
                    'Change of plan' => 'Change of plan',
                    'Others' => 'Others',
                ],
                'default' => 'No longer needed',
                'label' => ['text' => 'Reason for cancellation', 'class' => 'form-label'],
            ]);
            echo $this->Form->control('custom_reason', [
                'type' => 'text',
                'label' => 'If Others, please specify the reason...',
                'style' => 'margin-top: 10px;',
            ]);
            echo 'This reason will be emailed to the relevant customer automatically.';
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
        <?= $this->Form->end() ?>
    <?php else : ?>
        <p>Invalid booking ID.</p>
    <?php endif; ?>
</div>
