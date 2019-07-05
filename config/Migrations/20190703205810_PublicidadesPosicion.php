<?php
use Migrations\AbstractMigration;

class PublicidadesPosicion extends AbstractMigration
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
        $table->addColumn('orden', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true,
        ]);
        $table->save();
    }
}
