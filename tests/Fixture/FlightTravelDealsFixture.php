<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FlightTravelDealsFixture
 */
class FlightTravelDealsFixture extends TestFixture
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
                'flight_id' => 1,
                'travel_deal_id' => 1,
            ],
        ];
        parent::init();
    }
}
