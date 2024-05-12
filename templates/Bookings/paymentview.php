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
            border: 1px solid #ccd0d5;
            border-radius: 4px;
            background-color: white;
            box-shadow: 0 1px 3px 0 rgba(50,50,93,.1);
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
            font-size: 16px;
            font-family: 'Helvetica Neue', Helvetica, sans-serif;
        }

        .StripeElement--focus, .StripeElement:hover {
            box-shadow: 0 1px 3px 0 rgba(50, 50, 93, 0.2), 0 1px 3px 0 rgba(0, 0, 0, 0.1);
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        #card-errors {
            color: #fa755a;
            text-align: left;
            font-size: 13px;
            line-height: 17px;
            margin-top: 8px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #6b7c93;
            font-weight: 300;
            letter-spacing: 0.025em;
        }

        button.btn {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 4px;
            background-color: #24b47e;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button.btn:hover {
            background-color: #159570;
        }

        .payment-form {
            width: 100%;
            max-width: 500px;
            margin: 20px auto;
            background-color: #f6f9fc;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(50,50,93,0.11), 0 1px 3px rgba(0,0,0,0.08);
        }

    </style>
</head>

<div class="row">
    <div class="column column-100" style="margin: 0 auto;">
        <div class="bookings view content">
            <h3><?= h($booking->id) ?></h3>
            <?= $this->Form->create($booking, ['url' => ['action' => 'charge', $booking->id], 'id' => 'payment-form']) ?>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $booking->hasValue('user') ? $this->Html->link($booking->user->user_info_string, ['controller' => 'Users', 'action' => 'view', $booking->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Booking ID') ?></th>
                    <td><?= $this->Number->format($booking->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Destination') ?></th>
                    <td><?= (!empty($booking->destination)) ? h($booking->destination) : '/' ?></td>
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
                            /
                        <?php endif; ?></td>
                </tr>
                <tr>
                    <th><?= __('Hotel') ?></th>
                    <td><?= $booking->hasValue('hotel') ? $this->Html->link($booking->hotel->name, ['controller' => 'Hotels', 'action' => 'view', $booking->hotel->id]) : '/' ?></td>
                </tr>
                <tr>
                    <th><?= __('Car Rental') ?></th>
                    <td><?= $booking->hasValue('car_rental') ? $this->Html->link($booking->car_rental->id, ['controller' => 'CarRentals', 'action' => 'view', $booking->car_rental->id]) : '/' ?></td>
                </tr>
                <tr>
                    <th><?= __('Insurance') ?></th>
                    <td><?= $booking->hasValue('insurance') ? $this->Html->link($booking->insurance->id, ['controller' => 'Insurances', 'action' => 'view', $booking->insurance->id]) : '/' ?></td>
                </tr>
                <tr>
                    <th><?= __('Translation') ?></th>
                    <td><?= $booking->hasValue('translation') ? $this->Html->link($booking->translation->id, ['controller' => 'Translations', 'action' => 'view', $booking->translation->id]) : '/' ?></td>
                </tr>

                <tr>
                    <th><?= __('Travel Deal ID') ?></th>
                    <td><?= $booking->travel_deal_id === null ? '/' : $this->Number->format($booking->travel_deal_id) ?></td>
                </tr>
                <!--                <tr>-->
                <!--                    <th>--><?php //= __('Total Price') ?><!--</th>-->
                <!--                    <td>--><?php //= $booking->total_price === null ? '' : $this->Number->format($booking->total_price) ?><!--</td>-->
                <!--                </tr>-->
                <tr>
                    <th><?= __('Start Date') ?></th>
                    <td><?= (!empty($booking->start_date)) ? h($booking->start_date) : 'Not Specified' ?></td>
                </tr>
                <tr>
                    <th><?= __('End Date') ?></th>
                    <td><?= (!empty($booking->end_date)) ? h($booking->end_date) : 'Not Specified' ?></td>
                </tr>
                <tr>
                    <th><?= __('Booking Status') ?></th>
                    <td><?= $booking->booking_status ? __('Active') : __('Cancelled'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Payment ID') ?></th>
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

            <div class="payment-form">
                <label for="card-element">
                    Credit or debit card
                </label>
                <div id="card-element">
                    <!-- Stripe elements goes here automatically -->
                </div>
                <div id="card-errors" role="alert"></div>
            </div>

            <button type="submit" class="btn">Submit Payment</button>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<script src="https://js.stripe.com/v3/"></script>
<script>
    // my stripe key
    var stripe = Stripe('pk_test_51PFDCjC4SRSYpdkURdxb1ni6CPp01vZoczO6RaaYiBTQLlgEwzY5ptSaudvYtwFAwGvXqTIGGyLhLgkUkuB3LSg600RrlLVadU');
    var elements = stripe.elements();
    //
    // create card element on web page
    var card = elements.create('card', {
        style: {
            base: {
                fontSize: '16px',
                color: '#32325d',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        }
    });
    card.mount('#card-element');

    card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // to handle the submission of form
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        var amountInDollars = <?= json_encode($booking->total_price) ?>; // PHP variable to js
        var amountInCents = amountInDollars * 100; // change out of cent

        stripe.createToken(card).then(function(result) {
            if (result.error) {
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                stripeTokenHandler(result.token, amountInCents);
            }
        });
    });

    function stripeTokenHandler(token, amount) {
        var form = document.getElementById('payment-form');
        var hiddenInputToken = document.createElement('input');
        hiddenInputToken.setAttribute('type', 'hidden');
        hiddenInputToken.setAttribute('name', 'stripeToken');
        hiddenInputToken.setAttribute('value', token.id);
        form.appendChild(hiddenInputToken);

        var hiddenInputAmount = document.createElement('input'); // store amount
        hiddenInputAmount.setAttribute('type', 'hidden');
        hiddenInputAmount.setAttribute('name', 'amount');
        hiddenInputAmount.setAttribute('value', amount);
        form.appendChild(hiddenInputAmount);

        form.submit();
    }

</script>
