<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ContactFormsFixture
 */
class ContactFormsFixture extends TestFixture
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
                'email' => 'Lorem ipsum dolor sit amet',
                'phone_number' => 'Lorem ipsum d',
                'first_name' => 'Lorem ipsum dolor sit amet',
                'last_name' => 'Lorem ipsum dolor sit amet',
                'query' => 'Lorem ipsum dolor sit amet',
                'created' => 1713245762,
                'modified' => 1713245762,
                'query_nature' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
