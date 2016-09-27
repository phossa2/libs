<?php

namespace Phossa2\Uuid;

/**
 * dummy test
 */
class UuidTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * Tests Uuid::get()
     */
    public function testGet()
    {
        $this->assertTrue(32 === strlen(Uuid::get()));
    }
}

