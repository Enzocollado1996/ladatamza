<?php
use Migrations\AbstractMigration;

class Publicidades extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('publicidades');
        
        $table->addColumn('nombre', 'string', [
            'default' => null,
            'limit' => 150,
            'null' => false,
        ]);
        $table->addColumn('tipo', 'enum', [
            'values' => ['INICIAL', 'RULETA']
        ]);
        $table->addColumn('url_video_externo', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('url_img_externa', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('creado', 'datetime', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('modificado', 'datetime', [
            'default' => null,
            'null' => true,
        ]);        
        $table->addPrimaryKey([
            'id',
        ]);
        $table->create();
    }
}
