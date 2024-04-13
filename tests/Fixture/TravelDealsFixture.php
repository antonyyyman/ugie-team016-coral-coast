<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TravelDealsFixture
 */
class TravelDealsFixture extends TestFixture
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
                'start_date' => '2024-04-09',
                'end_date' => '2024-04-09',
                'description' => 'Lorem ipsum dolor sit amet',
                'total_price' => 1.5,
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
