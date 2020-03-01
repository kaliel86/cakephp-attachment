<?php
declare(strict_types=1);

namespace Attachment\Test\TestCase\Model\Table;

use Attachment\Model\Table\AttachmentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * Attachment\Model\Table\AttachmentsTable Test Case
 */
class AttachmentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \Attachment\Model\Table\AttachmentsTable
     */
    protected $Attachments;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'plugin.Attachment.Attachments',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Attachments') ? [] : ['className' => AttachmentsTable::class];
        $this->Attachments = TableRegistry::getTableLocator()->get('Attachments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Attachments);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
