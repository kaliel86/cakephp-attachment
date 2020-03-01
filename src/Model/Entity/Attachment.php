<?php
declare(strict_types=1);

namespace Attachment\Model\Entity;

use Cake\ORM\Entity;

/**
 * Attachment Entity
 *
 * @property int $id
 * @property string $model
 * @property int $foreign_key
 * @property int $position
 * @property string $field
 * @property string|null $title
 * @property string|null $legend
 * @property string|null $alternative_text
 * @property string $filename
 * @property int $size
 * @property string $mime
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property \Cake\I18n\FrozenTime|null $created
 */
class Attachment extends Entity
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
        'model' => true,
        'foreign_key' => true,
        'position' => true,
        'field' => true,
        'title' => true,
        'legend' => true,
        'alternative_text' => true,
        'filename' => true,
        'size' => true,
        'mime' => true,
        'modified' => true,
        'created' => true,
    ];
}
