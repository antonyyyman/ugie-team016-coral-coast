<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cruise Entity
 *
 * @property int $id
 * @property string|null $company
 * @property string|null $description
 * @property string|null $price
 * @property int|null $hotel_id
 *
 * @property \App\Model\Entity\Hotel $hotel
 */
class Cruise extends Entity
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
        'price' => true,
        'hotel_id' => true,
        'hotel' => true,
    ];
}