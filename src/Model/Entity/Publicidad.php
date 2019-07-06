<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Publicidad Entity
 *
 * @property int $id
 * @property string $nombre
 * @property string $tipo
 * @property string|null $url_video_externo
 * @property string|null $url_img_externa
 * @property \Cake\I18n\FrozenTime|null $creado
 * @property \Cake\I18n\FrozenTime|null $modificado
 * @property int|null $imagen_id
 * @property int|null $video_id
 * @property bool $habilitado
 * @property int|null $orden
 * @property string|null $ir_a_url
 *
 * @property \App\Model\Entity\Imagen $imagen
 * @property \App\Model\Entity\Video $video
 */
class Publicidad extends Entity
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
        'nombre' => true,
        'tipo' => true,
        'url_video_externo' => true,
        'url_img_externa' => true,
        'creado' => true,
        'modificado' => true,
        'imagen_id' => true,
        'video_id' => true,
        'habilitado' => true,
        'orden' => true,
        'ir_a_url' => true,
        'imagen' => true,
        'video' => true,
        'zona' => true
    ];
}
