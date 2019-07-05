<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PublicidadesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PublicidadesTable Test Case
 */
class PublicidadesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PublicidadesTable
     */
    public $Publicidades;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Publicidades',
        'app.Imagenes',
        'app.Videos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Publicidades') ? [] : ['className' => PublicidadesTable::class];
        $this->Publicidades = TableRegistry::getTableLocator()->get('Publicidades', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Publicidades);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
