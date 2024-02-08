<?php
class Order
{
    public $amount = 0;
    /**
     * @var PaymentGateway
     */
    protected $gateway;

    /**
     * @return void
     */
    public function __construct(PaymentGateway $gateway)
    {
        $this->gateway = $gateway;
    }

    /**
     * @return  boolean
     */
    public function process()
    {
        return $this->gateway->charge($this->amount);
    }
}