<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FlightsFixture
 */
class FlightsFixture extends TestFixture
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
                'flight_number' => 'Lorem ipsum dolor sit amet',
                'departure_airport' => 'Lorem ipsum dolor sit amet',
                'arrival_airport' => 'Lorem ipsum dolor sit amet',
                'departure_date' => '2024-04-15',
                'arrival_date' => '2024-04-15',
                'price' => 1.5,
            ],
        ];
        parent::init();
    }
}
