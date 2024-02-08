<?php

class User
{
    public $first_name;
    public $surname;
    public $email;
    protected $mailer;
    /**
     * @param Mailer
     */
    public function setMailer(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }
    public function getFullName()
    {
        return trim("$this->first_name $this->surname");
    }
    public function notify($message)
    {
        return $this->mailer->sendMessage($this->email, $message);
    }
}