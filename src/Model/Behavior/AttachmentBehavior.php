<?php
declare(strict_types=1);

namespace Attachment\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;

/**
 * Attachment behavior
 */
class AttachmentBehavior extends Behavior
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
        'table' => 'attachments',
        'path' => WWW_ROOT . 'attachments',
        'fields' => []
    ];
}
