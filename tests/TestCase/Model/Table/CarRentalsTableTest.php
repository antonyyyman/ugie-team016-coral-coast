<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CarRentalsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CarRentalsTable Test Case
 */
class CarRentalsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CarRentalsTable
     */
    protected $CarRentals;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.CarRentals',
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
        $config = $this->getTableLocator()->exists('CarRentals') ? [] : ['className' => CarRentalsTable::class];
        $this->CarRentals = $this->getTableLocator()->get('CarRentals', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->CarRentals);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CarRentalsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
