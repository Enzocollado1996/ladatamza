<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ImagenesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ImagenesTable Test Case
 */
class ImagenesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ImagenesTable
     */
    public $Imagenes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Imagenes',
        'app.ArticuloImagen'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Imagenes') ? [] : ['className' => ImagenesTable::class];
        $this->Imagenes = TableRegistry::getTableLocator()->get('Imagenes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Imagenes);

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
}
