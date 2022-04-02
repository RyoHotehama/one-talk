<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TalksTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TalksTable Test Case
 */
class TalksTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TalksTable
     */
    protected $Talks;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Talks',
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
        $config = $this->getTableLocator()->exists('Talks') ? [] : ['className' => TalksTable::class];
        $this->Talks = $this->getTableLocator()->get('Talks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Talks);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TalksTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\TalksTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
