<?php
use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
    protected static $queue;
    protected function setUp(): void
    {
        $this->queue = new Queue;
        // static::$queue->clear();
    }
    protected function tearDown(): void
    {
        unset($this->queue);
    }
    // public static function setUpBeforeClass(): void
    // {
    //     static::$queue = new Queue;
    // }
    // public static function tearDownAfterClass(): void
    // {
    //     static::$queue = null;
    // }
    public function testNewQueueIsEmpty()
    {
        $this->assertEquals(0, $this->queue->getCount());
    }
    public function testAnItemIsAddedToTheQueen()
    {
        $this->queue->push('green');
        $this->assertEquals(1, $this->queue->getCount());
    }
    public function testAnItemIsRemovedFromQueen()
    {
        $this->queue->push('green');
        $item = $this->queue->pop();
        $this->assertEquals(0, $this->queue->getCount());
        $this->assertEquals('green', $item);
    }
    public function testAnItemIsRemovedFromTheFromOfTheQueue()
    {
        $this->queue->push('first');
        $this->queue->push('second');
        $this->assertEquals('first', $this->queue->pop());
    }
    public function testMaxNumberOfItemsCanBeAdded()
    {
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {
            $this->queue->push($i);
        }
        $this->assertEquals(Queue::MAX_ITEMS, $this->queue->getCount());
    }
    public function testExceptionThrownWhenAddingAnItemToFullQueue()
    {
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {
            $this->queue->push($i);
        }
        $this->expectException(QueueException::class);
        $this->expectExceptionMessage("Queue is full");
        $this->queue->push('New');
    }
}