<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ConsentTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ConsentTable Test Case
 */
class ConsentTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ConsentTable
     */
    protected $Consent;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Consent',
        'app.Users',
        'app.Yours',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Consent') ? [] : ['className' => ConsentTable::class];
        $this->Consent = $this->getTableLocator()->get('Consent', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Consent);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ConsentTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ConsentTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
