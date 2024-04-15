<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TravelDeal Entity
 *
 * @property int $id
 * @property \Cake\I18n\Date|null $start_date
 * @property \Cake\I18n\Date|null $end_date
 * @property string|null $description
 * @property string|null $total_price
 * @property int|null $insurance_id
 * @property int|null $hotel_id
 * @property int|null $cruise_id
 * @property int|null $car_rental_id
 * @property int|null $translation_id
 *
 * @property \App\Model\Entity\Insurance $insurance
 * @property \App\Model\Entity\Hotel $hotel
 * @property \App\Model\Entity\CarRental $car_rental
 * @property \App\Model\Entity\Translation $translation
 * @property \App\Model\Entity\Flight $flight
 * @property \App\Model\Entity\FlightTravelDeal[] $flight_travel_deals
 */
class TravelDeal extends Entity
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
        'start_date' => true,
        'end_date' => true,
        'description' => true,
        'total_price' => true,
        'insurance_id' => true,
        'hotel_id' => true,
        'cruise_id' => true,
        'car_rental_id' => true,
        'translation_id' => true,
        'insurance' => true,
        'hotel' => true,
        'car_rental' => true,
        'translation' => true,
        'flight' => true,
        'flight_travel_deals' => true,
    ];
}
