<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'username' => 'Lorem ipsum dolor sit amet',
                'first_name' => 'Lorem ipsum dolor sit amet',
                'last_name' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'phone_number' => 'Lorem ipsum d',
                'is_staff' => 1,
                'nonce' => 'Lorem ipsum dolor sit amet',
                'nonce_expiry' => '2024-04-09 14:29:27',
                'created' => '2024-04-09 14:29:27',
                'modified' => '2024-04-09 14:29:27',
            ],
        ];
        parent::init();
    }
}
