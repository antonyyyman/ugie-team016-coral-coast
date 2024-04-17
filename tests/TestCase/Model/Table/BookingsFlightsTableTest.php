<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BookingsFlightsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BookingsFlightsTable Test Case
 */
class BookingsFlightsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BookingsFlightsTable
     */
    protected $BookingsFlights;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.BookingsFlights',
        'app.Bookings',
        'app.Flights',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('BookingsFlights') ? [] : ['className' => BookingsFlightsTable::class];
        $this->BookingsFlights = $this->getTableLocator()->get('BookingsFlights', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->BookingsFlights);

        parent::tearDown();
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\BookingsFlightsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
