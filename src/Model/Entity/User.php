<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $first_name
 * @property string $last_name
 * @property string $password
 * @property string $email
 * @property string|null $phone_number
 * @property bool|null $is_staff
 * @property string|null $nonce
 * @property \Cake\I18n\DateTime|null $nonce_expiry
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Booking[] $bookings
 */
class User extends Entity
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
        'username' => true,
        'first_name' => true,
        'last_name' => true,
        'password' => true,
        'email' => true,
        'phone_number' => true,
        'is_staff' => true,
        'nonce' => true,
        'nonce_expiry' => true,
        'created' => true,
        'modified' => true,
        'bookings' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var list<string>
     */
    protected array $_hidden = [
        'password',
    ];

        /**
     * Generate display field for User entity
     *
     * @return string Display field
     * @see \App\Model\Entity\User::$user_full_display
     */
    protected function _getUserFullDisplay(): string
    {
        return $this->first_name . ' ' . $this->last_name . ' (' . $this->email . ')';
    }

    /**
     * Generate Full Name of a user
     *
     * @return string Full Name
     * @see \App\Model\Entity\User::$full_name
     */
    protected function _getFullName(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Hashing password for User entity
     *
     * @param string $password Password field
     * @return string|null hashed password
     * @see \App\Model\Entity\User::$password
     */
    protected function _setPassword(string $password): ?string
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }

        return $password;
    }


    /**
     * Generate User information string of a user
     *
     * @return string User info string
     * @see \App\Model\Entity\User::$user_info_string
     */
    protected function _getUserInfoString(): string
    {
        return $this->first_name . ' ' . $this->last_name . ' (Email: ' . $this->email . ', Phone: ' . $this->phone_number . ')';
    }

}
