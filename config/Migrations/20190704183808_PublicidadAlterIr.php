<?php
use Migrations\AbstractMigration;

class PublicidadAlterIr extends AbstractMigration
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
        $table->addColumn('ir_a_url', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->save();
    }
}
