<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FlightTravelDealsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FlightTravelDealsTable Test Case
 */
class FlightTravelDealsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FlightTravelDealsTable
     */
    protected $FlightTravelDeals;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.FlightTravelDeals',
        'app.Flights',
        'app.TravelDeals',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('FlightTravelDeals') ? [] : ['className' => FlightTravelDealsTable::class];
        $this->FlightTravelDeals = $this->getTableLocator()->get('FlightTravelDeals', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->FlightTravelDeals);

        parent::tearDown();
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\FlightTravelDealsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
