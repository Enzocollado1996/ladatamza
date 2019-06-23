<?php
use Migrations\AbstractMigration;

class ArticulosImagenes extends AbstractMigration
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
        $table = $this->table('articulo_imagen');
        $table->addColumn('articulo_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('imagen_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addPrimaryKey([
            'id',
        ]);
        $table->addIndex('articulo_id');
        $table->addIndex('imagen_id');
        $table->save();
    }
}
