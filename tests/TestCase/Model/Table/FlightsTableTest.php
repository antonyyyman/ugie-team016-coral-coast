<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FlightsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FlightsTable Test Case
 */
class FlightsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FlightsTable
     */
    protected $Flights;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Flights',
        'app.Bookings',
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
        $config = $this->getTableLocator()->exists('Flights') ? [] : ['className' => FlightsTable::class];
        $this->Flights = $this->getTableLocator()->get('Flights', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Flights);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\FlightsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
