<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Articulo Entity
 *
 * @property int $id
 * @property string $titulo
 * @property string $descripcion
 * @property string $texto
 * @property string $palabras_claves
 * @property \Cake\I18n\FrozenTime|null $publicado
 * @property bool $habilitado
 * @property \Cake\I18n\FrozenTime|null $creado
 * @property \Cake\I18n\FrozenTime|null $modificado
 * @property bool|null $tiene_imagen
 * @property bool|null $tiene_video
 * @property int|null $visitas
 * @property string $zona
 */
class Articulo extends Entity
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
        '*' => true,
        'imagenes' => true,
        'id' => false,
    ];
}
