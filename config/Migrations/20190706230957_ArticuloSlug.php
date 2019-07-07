<?php
use Migrations\AbstractMigration;

class ArticuloSlug extends AbstractMigration
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
        $table->addColumn('slug', 'string', [
            'limit' => 100
        ]);
        $table->addIndex(['slug'], ['unique' => true]);
        $table->save();
        
    }
}
