<?php
declare(strict_types=1);

namespace Attachment\Test\TestCase\Model\Behavior;

use Attachment\Model\Behavior\AttachmentBehavior;
use Cake\TestSuite\TestCase;

/**
 * Attachment\Model\Behavior\AttachmentBehavior Test Case
 */
class AttachmentBehaviorTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \Attachment\Model\Behavior\AttachmentBehavior
     */
    protected $Attachment;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->Attachment = new AttachmentBehavior();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Attachment);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
