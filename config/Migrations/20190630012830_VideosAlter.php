<?php
use Migrations\AbstractMigration;

class VideosAlter extends AbstractMigration
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
        $table = $this->table('videos');
        $table->addColumn('publicado', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->save();
    }
}
