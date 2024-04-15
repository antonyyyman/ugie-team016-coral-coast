<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TravelDealsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TravelDealsTable Test Case
 */
class TravelDealsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TravelDealsTable
     */
    protected $TravelDeals;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.TravelDeals',
        'app.Insurances',
        'app.Hotels',
        'app.CarRentals',
        'app.Translations',
        'app.Flights',
        'app.FlightTravelDeals',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TravelDeals') ? [] : ['className' => TravelDealsTable::class];
        $this->TravelDeals = $this->getTableLocator()->get('TravelDeals', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->TravelDeals);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TravelDealsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\TravelDealsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
