<?php
use Migrations\AbstractMigration;

class VideosPublicacion extends AbstractMigration
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
        $table->addColumn('nombre_publicidad', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->save();
    }
}
