<?php
declare(strict_types=1);

namespace Attachment\Model\Behavior;

use ArrayObject;
use Cake\Datasource\EntityInterface;
use Cake\Event\EventInterface;
use Cake\ORM\Behavior;
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
        // $this->setupAssociations();
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
                ->setTarget($this->attachmentsTable)
                ->setJoinType('LEFT')
                ->setForeignKey('foreign_key')
                ->setProperty($field)
                ->setSort([$assocName . '.position' => 'ASC'])
                ->setConditions([
                    $assocName . '.model' => $currentTable->getAlias(),
                    $assocName . '.field' => $field
                ]);
        }

        //debug($currentTable->associations());
    }

    public function beforeSave(EventInterface $event, EntityInterface $entity, ArrayObject $options)
    {
        foreach ($this->getConfig('fields') as $field => $type) {

            /*
             * TODO change accessible fields in setup association
             * https://book.cakephp.org/4/en/orm/saving-data.html#changing-accessible-fields
             */
            $entity->setAccess($field, true);
            $data = $entity->get($field);
            debug($data);
        }
        die();
    }
}
