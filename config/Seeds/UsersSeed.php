<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

use Authentication\PasswordHasher\DefaultPasswordHasher;;
use Cake\ORM\TableRegistry;
/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run(): void
    {
        $data = [
            [
                'username' => 'user1',
                'first_name' => 'First',
                'last_name' => 'User',
                'password' => (new DefaultPasswordHasher())->hash('password1'),
                'email' => 'user1@example.com',
                'phone_number' => '1234567890',
                'is_staff' => false
            ],
            [
                'username' => 'user2',
                'first_name' => 'Second',
                'last_name' => 'User',
                'password' => (new DefaultPasswordHasher())->hash('password2'),
                'email' => 'user2@example.com',
                'phone_number' => '0987654321',
                'is_staff' => true
            ],
            [
                'username' => 'user3',
                'first_name' => 'Third',
                'last_name' => 'User',
                'password' => (new DefaultPasswordHasher())->hash('password3'),
                'email' => 'user3@example.com',
                'phone_number' => '1234507890',
                'is_staff' => false
            ]
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
