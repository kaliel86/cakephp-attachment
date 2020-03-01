<?php
declare(strict_types=1);

namespace Attachment\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Attachments Model
 *
 * @method \Attachment\Model\Entity\Attachment newEmptyEntity()
 * @method \Attachment\Model\Entity\Attachment newEntity(array $data, array $options = [])
 * @method \Attachment\Model\Entity\Attachment[] newEntities(array $data, array $options = [])
 * @method \Attachment\Model\Entity\Attachment get($primaryKey, $options = [])
 * @method \Attachment\Model\Entity\Attachment findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \Attachment\Model\Entity\Attachment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Attachment\Model\Entity\Attachment[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \Attachment\Model\Entity\Attachment|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Attachment\Model\Entity\Attachment saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Attachment\Model\Entity\Attachment[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \Attachment\Model\Entity\Attachment[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \Attachment\Model\Entity\Attachment[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \Attachment\Model\Entity\Attachment[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AttachmentsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('attachments');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('model')
            ->maxLength('model', 255)
            ->requirePresence('model', 'create')
            ->notEmptyString('model');

        $validator
            ->integer('foreign_key')
            ->requirePresence('foreign_key', 'create')
            ->notEmptyString('foreign_key');

        $validator
            ->integer('position')
            ->requirePresence('position', 'create')
            ->notEmptyString('position');

        $validator
            ->scalar('field')
            ->maxLength('field', 255)
            ->requirePresence('field', 'create')
            ->notEmptyString('field');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->allowEmptyString('title');

        $validator
            ->scalar('legend')
            ->allowEmptyString('legend');

        $validator
            ->scalar('alternative_text')
            ->maxLength('alternative_text', 255)
            ->allowEmptyString('alternative_text');

        $validator
            ->scalar('filename')
            ->maxLength('filename', 255)
            ->requirePresence('filename', 'create')
            ->notEmptyFile('filename');

        $validator
            ->nonNegativeInteger('size')
            ->requirePresence('size', 'create')
            ->notEmptyString('size');

        $validator
            ->scalar('mime')
            ->maxLength('mime', 255)
            ->requirePresence('mime', 'create')
            ->notEmptyString('mime');

        return $validator;
    }
}
