<?php
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
    }
    // public function testOrderIsProcessed()
    // {
    //     $gateway = $this->getMockBuilder('PaymentGateway')
    //         ->setMethods(['charge'])
    //         ->getMock();
    //     $gateway
    //         ->method('charge')
    //         ->willReturn(true);
    //     $order = new Order($gateway);
    //     $order->amount = 200;
    //     $this->assertTrue($order->process());
    // }
    public function testOrderIsProcessedUsingMockery()
    {
        $gateway = Mockery::mock('PaymentGateway');
        $gateway->shouldReceive('charge')
            ->once()
            ->with(200)
            ->andReturn(true);
        $order = new Order($gateway);
        $order->amount = 200;
        $this->assertTrue($order->process());
    }
}