<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Booking $booking
 */
$this->setLayout("defaultadmin");
?>

<head>
    <style>
        .StripeElement {
            box-sizing: border-box;
            height: 40px;
            padding: 10px 12px;
            border: 1px solid transparent;
            border-radius: 4px;
            background-color: white;
            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }

        #card-errors {
            color: #fa755a;
            text-align: left;
            font-size: 13px;
            line-height: 17px;
            margin-top: 8px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button.btn {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }

        button.btn:hover {
            background-color: #0056b3;
        }

    </style>
</head>

<div class="row">
    <div class="column column-100" style="margin: 0 auto;">
        <div class="bookings view content">
            <h3><?= h($booking->id) ?></h3>
            <?= $this->Form->create($booking, ['url' => ['action' => 'changestatus', $booking->id, 'method' => 'post']]) ?>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $booking->hasValue('user') ? $this->Html->link($booking->user->user_info_string, ['controller' => 'Users', 'action' => 'view', $booking->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Destination') ?></th>
                    <td><?= h($booking->destination) ?></td>
                </tr>
                <tr>
                    <th><?=__('Flights')?></th>
                    <td><?php if (!empty($booking->flights)): ?>
                            <ul>
                                <?php foreach ($booking->flights as $flight): ?>
                                    <li><?= $this->Html->link(h($flight->number), ['controller' => 'Flights', 'action' => 'view', $flight->id]) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            N/A
                        <?php endif; ?></td>
                </tr>
                <tr>
                    <th><?= __('Hotel') ?></th>
                    <td><?= $booking->hasValue('hotel') ? $this->Html->link($booking->hotel->name, ['controller' => 'Hotels', 'action' => 'view', $booking->hotel->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Car Rental') ?></th>
                    <td><?= $booking->hasValue('car_rental') ? $this->Html->link($booking->car_rental->id, ['controller' => 'CarRentals', 'action' => 'view', $booking->car_rental->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Insurance') ?></th>
                    <td><?= $booking->hasValue('insurance') ? $this->Html->link($booking->insurance->id, ['controller' => 'Insurances', 'action' => 'view', $booking->insurance->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Translation') ?></th>
                    <td><?= $booking->hasValue('translation') ? $this->Html->link($booking->translation->id, ['controller' => 'Translations', 'action' => 'view', $booking->translation->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($booking->id) ?></td>
                </tr>

                <tr>
                    <th><?= __('Travel Deal Id') ?></th>
                    <td><?= $booking->travel_deal_id === null ? '' : $this->Number->format($booking->travel_deal_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Total Price') ?></th>
                    <td><?= $booking->total_price === null ? '' : $this->Number->format($booking->total_price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Start Date') ?></th>
                    <td><?= h($booking->start_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('End Date') ?></th>
                    <td><?= h($booking->end_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Booking Status') ?></th>
                    <td><?= $booking->booking_status ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Payment Id') ?></th>
                    <td><?= $payment->id === null ? '' : $this->Number->format($payment->id) ?></td>
                </tr>
            </table>

            <div style="margin-right:12px;font-size:20px;">Total Price:
                <span style="color:#e74343;">
                    <?= $this->Number->format($booking->total_price, [
                        'places' => 2,
                        'before' => '$',
                    ]);?>
                </span>
            </div>

            <form action="charge.php" method="POST" id="payment-form">
                <div>
                    <label for="card-element">
                        Credit or debit card
                    </label>
                    <div id="card-element">
                        <!-- Stripe elements goes here automatically -->
                    </div>
                    <div id="card-errors" role="alert"></div>
                </div>

                <button type="submit">Submit Payment</button>
            </form>

            <?= $this->Form->end() ?>
        </div>
    </div>
</div>


<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripe = Stripe('pk_test_51PFDCjC4SRSYpdkURdxb1ni6CPp01vZoczO6RaaYiBTQLlgEwzY5ptSaudvYtwFAwGvXqTIGGyLhLgkUkuB3LSg600RrlLVadU'); // my public test key
    var elements = stripe.elements();

    var card = elements.create('card');
    card.mount('#card-element');

    card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // submit form handler
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        stripe.createToken(card).then(function(result) {
            if (result.error) {
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                stripeTokenHandler(result.token);
            }
        });
    });

    // send token to server
    function stripeTokenHandler(token) {
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        form.submit();
    }
</script>
