<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Hotel Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $location
 *
 * @property \App\Model\Entity\Booking[] $bookings
 * @property \App\Model\Entity\Cruise[] $cruises
 * @property \App\Model\Entity\TravelDeal[] $travel_deals
 */
class Hotel extends Entity
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
        'name' => true,
        'location' => true,
        'bookings' => true,
        'cruises' => true,
        'travel_deals' => true,
    ];
}
