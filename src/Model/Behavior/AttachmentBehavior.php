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
        'fields' => []
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

        foreach ($this->getConfig('fields') as $field => $type) {
            $assocType = $type == 'many' ? 'hasMany' : 'hasOne';

            $assocName = $this->attachmentsTable->getAlias() . '_' . $field;
            if ($assocType === 'many') {
                $assoc = $currentTable->hasMany($assocName);
            } else {
                $assoc = $currentTable->hasMany($assocName);
            }

            $assoc
                ->setJoinType('LEFT')
                ->setForeignKey('foreign_key')
                ->setProperty($field)
                ->setSort([$assocName . '.position' => 'ASC'])
                ->setConditions([
                    $assocName . '.model' => $currentTable->getAlias(),
                    $assocName . '.field' => $field
                ]);

            $currentTable->hasMany('cool');
        }

        debug($currentTable->associations());
    }

    protected function setupHasOne(string $field, Table $table): void
    {

    }

    protected function setupHasMany(string $field, Table $table): void
    {
        $table->hasMany('Attachments_');
    }
}
