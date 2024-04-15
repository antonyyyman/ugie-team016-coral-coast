<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Flight Entity
 *
 * @property int $id
 * @property string|null $flight_number
 * @property string|null $departure_airport
 * @property string|null $arrival_airport
 * @property \Cake\I18n\Date|null $departure_date
 * @property \Cake\I18n\Date|null $arrival_date
 * @property string|null $price
 *
 * @property \App\Model\Entity\Booking[] $bookings
 * @property \App\Model\Entity\FlightTravelDeal[] $flight_travel_deals
 * @property \App\Model\Entity\TravelDeal[] $travel_deals
 */
class Flight extends Entity
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
        'flight_number' => true,
        'departure_airport' => true,
        'arrival_airport' => true,
        'departure_date' => true,
        'arrival_date' => true,
        'price' => true,
        'bookings' => true,
        'flight_travel_deals' => true,
        'travel_deals' => true,
    ];
}
