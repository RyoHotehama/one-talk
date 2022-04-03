<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PetitionTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PetitionTable Test Case
 */
class PetitionTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PetitionTable
     */
    protected $Petition;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Petition',
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
        $config = $this->getTableLocator()->exists('Petition') ? [] : ['className' => PetitionTable::class];
        $this->Petition = $this->getTableLocator()->get('Petition', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Petition);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PetitionTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\PetitionTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
