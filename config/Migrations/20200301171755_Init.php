<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class Init extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('attachments')
            ->addColumn('model', 'string', ['null' => false])
            ->addColumn('foreign_key', 'integer')
            ->addColumn('position', 'integer')
            ->addColumn('field', 'string')
            ->addColumn('title', 'string', ['null' => true])
            ->addColumn('legend', 'text', ['null' => true])
            ->addColumn('alternative_text', 'string', ['null' => true])
            ->addColumn('filename', 'string')
            ->addColumn('size', 'integer', ['length' => 20, 'signed' => false])
            ->addColumn('mime', 'string')
            ->addIndex(['model', 'foreign_key'])
            ->addColumn('modified', 'datetime', ['default' => null, 'null' => true])
            ->addColumn('created', 'datetime', ['default' => null, 'null' => true]);
        $table->create();
    }
}
