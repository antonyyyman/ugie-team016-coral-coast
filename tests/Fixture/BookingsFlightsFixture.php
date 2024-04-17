<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BookingsFlightsFixture
 */
class BookingsFlightsFixture extends TestFixture
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
                'booking_id' => 1,
                'flight_id' => 1,
            ],
        ];
        parent::init();
    }
}
