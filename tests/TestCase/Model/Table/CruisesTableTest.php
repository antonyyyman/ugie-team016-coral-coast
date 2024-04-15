<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CruisesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CruisesTable Test Case
 */
class CruisesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CruisesTable
     */
    protected $Cruises;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Cruises',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Cruises') ? [] : ['className' => CruisesTable::class];
        $this->Cruises = $this->getTableLocator()->get('Cruises', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Cruises);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CruisesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
