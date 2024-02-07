<?php
use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
    public function testNewQueueIsEmpty()
    {
        $queue = new Queue;
        $this->assertEquals(0, $queue->getCount());
        return $queue;
    }
    public function testAnItemIsAddedToTheQueen(Queue $queue)
    {
        $queue->push('green');
        $this->assertEquals(1, $queue->getCount());
    }
    public function testAnItemIsRemovedFromQueen()
    {
        $queue = new Queue;
        $queue->push('green');
        $queue->pop();
        $this->assertEquals(0, $queue->getCount());
    }
}