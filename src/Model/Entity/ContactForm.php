<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ContactForm Entity
 *
 * @property int $id
 * @property string $email
 * @property string|null $phone_number
 * @property string $first_name
 * @property string $last_name
 * @property string $query
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 */
class ContactForm extends Entity
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
        'email' => true,
        'phone_number' => true,
        'first_name' => true,
        'last_name' => true,
        'query' => true,
        'created' => true,
        'modified' => true,
    ];
}
