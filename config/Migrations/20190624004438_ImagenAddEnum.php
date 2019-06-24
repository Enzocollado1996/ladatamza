<?php
use Migrations\AbstractMigration;

class ImagenAddEnum extends AbstractMigration
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
        $table = $this->table('imagenes');
        $table
        ->addColumn('tipo', 'enum', [
            'values' => ['NOTICIA', 'PUBLICIDAD']
        ])
        ->save();
    }
}
