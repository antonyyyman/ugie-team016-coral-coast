<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CarRental Entity
 *
 * @property int $id
 * @property string|null $company
 * @property string|null $description
 * @property string|null $plate
 * @property string|null $brand
 * @property string|null $price
 *
 * @property \App\Model\Entity\Booking[] $bookings
 * @property \App\Model\Entity\TravelDeal[] $travel_deals
 */
class CarRental extends Entity
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
        'company' => true,
        'description' => true,
        'plate' => true,
        'brand' => true,
        'price' => true,
        'bookings' => true,
        'travel_deals' => true,
    ];
}
