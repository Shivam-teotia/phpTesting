<?php
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testReturnsFullName()
    {
        $user = new User;
        $user->first_name = 'Shivam';
        $user->surname = 'Teotia';
        $this->assertEquals('Shivam Teotia', $user->getFullName());
    }
    public function testFullNameEqualByDefault()
    {
        $user = new User;
        $this->assertEquals('', $user->getFullName());
    }
    public function testUserHasFirstName()
    {
        $user = new User;
        $user->first_name = 'Shivam';
        $this->assertEquals('Shivam', $user->first_name);
    }
}