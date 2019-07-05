<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Publicidades Model
 *
 * @property \App\Model\Table\ImagenesTable|\Cake\ORM\Association\BelongsTo $Imagenes
 * @property \App\Model\Table\VideosTable|\Cake\ORM\Association\BelongsTo $Videos
 *
 * @method \App\Model\Entity\Publicidad get($primaryKey, $options = [])
 * @method \App\Model\Entity\Publicidad newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Publicidad[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Publicidad|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Publicidad saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Publicidad patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Publicidad[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Publicidad findOrCreate($search, callable $callback = null, $options = [])
 */
class PublicidadesTable extends Table
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

        $this->setTable('publicidades');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Imagenes', [
            'foreignKey' => 'imagen_id'
        ]);
        $this->belongsTo('Videos', [
            'foreignKey' => 'video_id'
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
            ->scalar('nombre')
            ->maxLength('nombre', 150)
            ->requirePresence('nombre', 'create')
            ->allowEmptyString('nombre', false);

        $validator
            ->scalar('tipo')
            ->requirePresence('tipo', 'create')
            ->allowEmptyString('tipo', false);

        $validator
            ->scalar('url_video_externo')
            ->allowEmptyString('url_video_externo');

        $validator
            ->scalar('url_img_externa')
            ->allowEmptyString('url_img_externa');

        $validator
            ->dateTime('creado')
            ->allowEmptyDateTime('creado');

        $validator
            ->dateTime('modificado')
            ->allowEmptyDateTime('modificado');

        $validator
            ->boolean('habilitado')
            ->allowEmptyString('habilitado', false);

        $validator
            ->integer('orden')
            ->allowEmptyString('orden');

        $validator
            ->scalar('ir_a_url')
            ->allowEmptyString('ir_a_url');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['imagen_id'], 'Imagenes'));
        $rules->add($rules->existsIn(['video_id'], 'Videos'));

        return $rules;
    }
}
