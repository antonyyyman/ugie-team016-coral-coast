<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HotelsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HotelsTable Test Case
 */
class HotelsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\HotelsTable
     */
    protected $Hotels;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Hotels',
        'app.Bookings',
        'app.Cruises',
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
        $config = $this->getTableLocator()->exists('Hotels') ? [] : ['className' => HotelsTable::class];
        $this->Hotels = $this->getTableLocator()->get('Hotels', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Hotels);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\HotelsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
