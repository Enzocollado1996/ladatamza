<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Imagenes Model
 *
 * @property \App\Model\Table\ArticuloImagenTable|\Cake\ORM\Association\HasMany $ArticuloImagen
 *
 * @method \App\Model\Entity\Imagen get($primaryKey, $options = [])
 * @method \App\Model\Entity\Imagen newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Imagen[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Imagen|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Imagen saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Imagen patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Imagen[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Imagen findOrCreate($search, callable $callback = null, $options = [])
 */
class ImagenesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
        
        $this->addBehavior('Proffer.Proffer', [
            'filename' => [
                'dir' => 'file_url',
                'thumbnailSizes' => [
                    //'square' => ['w' => 100, 'h' => 100],
                    //'large' => ['w' => 250, 'h' => 250]
                ]
            ]
        ]);
        
        $this->setTable('imagenes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        /*$this->hasMany('ArticuloImagen', [
            'foreignKey' => 'imagen_id'
        ]);*/
        
        $this->belongsToMany('Articulos', [
            'foreignKey' => 'imagen_id',
            'targetForeignKey' => 'articulo_id',
            'joinTable' => 'articulo_imagen'             
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('filename')
            ->maxLength('filename', 255)
            ->requirePresence('filename', 'create')
            ->allowEmptyFile('filename', false);

        $validator
            ->scalar('descripcion')
            ->allowEmptyString('descripcion');

        $validator
            ->scalar('comentario')
            ->allowEmptyString('comentario');

        $validator
            ->scalar('tipo')
            ->allowEmptyString('tipo');

        $validator
            ->scalar('url')
            ->allowEmptyString('url');
        
        $validator
            ->dateTime('creado')
            ->requirePresence('creado', 'create')
            ->allowEmptyDateTime('creado', false);

        $validator
            ->dateTime('modificado')
            ->allowEmptyDateTime('modificado');

        return $validator;
    }
}
