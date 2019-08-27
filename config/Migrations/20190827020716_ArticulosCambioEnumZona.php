<?php
use Migrations\AbstractMigration;

class ArticulosCambioEnumZona extends AbstractMigration
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
        $table->removeColumn('zona');
        $table->addColumn('zona', 'enum', [
            'values' => ['SUR', 'CENTRO', 'NORTE', 'GENERAL', 'SOCIALES']
        ]);
        $table->save();

    }
}
