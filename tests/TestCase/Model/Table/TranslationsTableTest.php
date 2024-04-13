<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TranslationsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TranslationsTable Test Case
 */
class TranslationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TranslationsTable
     */
    protected $Translations;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Translations',
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
        $config = $this->getTableLocator()->exists('Translations') ? [] : ['className' => TranslationsTable::class];
        $this->Translations = $this->getTableLocator()->get('Translations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Translations);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TranslationsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
