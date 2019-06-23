<?php
namespace App\Model\Table;

use App\Model\Entity\Articulo;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;
use Cake\Datasource\EntityInterface;
use ArrayObject;

/**
 * Articulos Model
 *
 * @property |\Cake\ORM\Association\HasMany $ArticuloImagen
 *
 * @method \App\Model\Entity\Articulo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Articulo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Articulo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Articulo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Articulo saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Articulo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Articulo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Articulo findOrCreate($search, callable $callback = null, $options = [])
 */
class ArticulosTable extends Table
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

        $this->setTable('articulos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        /*$this->hasMany('ArticuloImagen', [
            'foreignKey' => 'articulo_id'
        ]);*/
        $this->belongsToMany('Imagenes', [
            'foreignKey' => 'articulo_id',
            'targetForeignKey' => 'imagen_id',
            'joinTable' => 'articulo_imagen',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
    }

    public function afterDelete(Event $event, EntityInterface $entity, ArrayObject $options){
        if(!empty($entity->imagenes)){
            foreach($entity->imagenes as $imagen){
                $this->Imagenes->delete($imagen);
            }  
        }        
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
            ->scalar('titulo')
            ->maxLength('titulo', 150)
            ->requirePresence('titulo', 'create')
            ->allowEmptyString('titulo', false);

        $validator
            ->scalar('descripcion')
            ->requirePresence('descripcion', 'create')
            ->allowEmptyString('descripcion', false);

        $validator
            ->scalar('texto')
            ->requirePresence('texto', 'create')
            ->allowEmptyString('texto', false);

        $validator
            ->scalar('palabras_claves')
            ->maxLength('palabras_claves', 200)
            ->requirePresence('palabras_claves', 'create')
            ->allowEmptyString('palabras_claves', false);

        $validator
            ->dateTime('publicado')
            ->allowEmptyDateTime('publicado');

        $validator
            ->boolean('habilitado')
            ->requirePresence('habilitado', 'create')
            ->allowEmptyString('habilitado', false);

        $validator
            ->dateTime('creado')
            ->allowEmptyDateTime('creado');

        $validator
            ->dateTime('modificado')
            ->allowEmptyDateTime('modificado');

        $validator
            ->boolean('tiene_imagen')
            ->allowEmptyFile('tiene_imagen');

        $validator
            ->boolean('tiene_video')
            ->allowEmptyString('tiene_video');

        $validator
            ->integer('visitas')
            ->allowEmptyString('visitas');

        $validator
            ->scalar('zona')
            ->requirePresence('zona', 'create')
            ->allowEmptyString('zona', false);

        return $validator;
    }
}
