<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BookingsFixture
 */
class BookingsFixture extends TestFixture
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
                'user_id' => 1,
                'start_date' => '2024-04-09',
                'end_date' => '2024-04-09',
                'destination' => 'Lorem ipsum dolor sit amet',
                'insurance_id' => 1,
                'hotel_id' => 1,
                'car_rental_id' => 1,
                'translation_id' => 1,
                'flight_id' => 1,
            ],
        ];
        parent::init();
    }
}
