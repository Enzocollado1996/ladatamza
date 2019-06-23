<?php
use Migrations\AbstractMigration;

class Initial extends AbstractMigration
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
        $table = $this->table('articulos');
        $table->addColumn('url', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('url_rss', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('titulo', 'string', [
            'default' => null,
            'limit' => 150,
            'null' => false,
        ]);
        $table->addColumn('descripcion', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('texto', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('palabras_claves', 'string', [
            'default' => null,
            'limit' => 200,
            'null' => false,
        ]);
        $table->addColumn('publicado', 'datetime', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('habilitado', 'boolean', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('creado', 'datetime', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('modificado', 'datetime', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('tiene_imagen', 'boolean', [
            'default' => false,
            'null' => true,
        ]);
        $table->addColumn('tiene_video', 'boolean', [
            'default' => false,
            'null' => true,
        ]);
        $table->addColumn('visitas', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true,
        ]);
        $table->addPrimaryKey([
            'id',
        ]);
        $table->create();
    }
}
