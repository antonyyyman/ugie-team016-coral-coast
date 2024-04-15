<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Booking Entity
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $payment_id
 * @property \Cake\I18n\Date|null $start_date
 * @property \Cake\I18n\Date|null $end_date
 * @property string|null $destination
 * @property int|null $insurance_id
 * @property int|null $hotel_id
 * @property int|null $car_rental_id
 * @property int|null $translation_id
 * @property int|null $flight_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Payment $payment
 * @property \App\Model\Entity\Insurance $insurance
 * @property \App\Model\Entity\Hotel $hotel
 * @property \App\Model\Entity\CarRental $car_rental
 * @property \App\Model\Entity\Translation $translation
 * @property \App\Model\Entity\Flight[] $flights
 */
class Booking extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'user_id' => true,
        'payment_id' => true,
        'start_date' => true,
        'end_date' => true,
        'destination' => true,
        'insurance_id' => true,
        'hotel_id' => true,
        'car_rental_id' => true,
        'translation_id' => true,
        'flight_id' => true,
        'user' => true,
        'payment' => true,
        'insurance' => true,
        'hotel' => true,
        'car_rental' => true,
        'translation' => true,
        'flights' => true,
    ];
}
