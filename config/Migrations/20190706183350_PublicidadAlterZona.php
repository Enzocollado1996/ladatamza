<?php
use Migrations\AbstractMigration;

class PublicidadAlterZona extends AbstractMigration
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
        $table
        ->addColumn('zona', 'enum', [
            'values' => ['SUR', 'CENTRO', 'NORTE','NINGUNA']
        ])
        ->save();
    }
}
