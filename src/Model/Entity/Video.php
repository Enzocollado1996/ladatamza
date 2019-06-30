<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Video Entity
 *
 * @property int $id
 * @property string $titulo
 * @property string|null $url_externa
 * @property \Cake\I18n\FrozenTime $creado
 * @property \Cake\I18n\FrozenTime|null $modificado
 * @property \Cake\I18n\FrozenTime $publicado
 * @property string $nombre
 */
class Video extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'titulo' => true,
        'url_externa' => true,
        'creado' => true,
        'modificado' => true,
        'publicado' => true,
        'nombre' => true
    ];
}
