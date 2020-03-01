<?php
declare(strict_types=1);

namespace Attachment\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

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
        'associations' => []
    ];
    /**
     * @var \Cake\ORM\Table
     */
    private $attachmentsTable;

    /**
     * @param array $config
     */
    public function initialize(array $config): void
    {
        $this->attachmentsTable = TableRegistry::getTableLocator()->get($this->getConfig('table'));
        $this->setupAssociations();
    }

    protected function setupAssociations()
    {
        $currentTable = $this->getTable();

        $currentTable->hasMany('Attachments_images')
            ->setJoinType('LEFT')
            ->setForeignKey('foreign_key')
            ->setProperty('images');

        debug($currentTable->associations());
    }
}
