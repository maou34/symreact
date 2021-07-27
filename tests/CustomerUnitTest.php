<?php

namespace App\Tests;

use App\Entity\Customer;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class CustomerUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $user = new User;
        $customer = new Customer;
        $customer->setFirstname('test')
            ->setLastname('test')
            ->setCompany('test')
            ->setEmail('test')
            ->setUser($user);

        $this->assertTrue($customer->getFirstname() === 'test');
        $this->assertTrue($customer->getLastname() === 'test');
        $this->assertTrue($customer->getCompany() === 'test');
        $this->assertTrue($customer->getEmail() === 'test');
        $this->assertTrue($customer->getUser() === $user);
    }

    public function testIsWrong(): void
    {
        $user = new User;
        $customer = new Customer;
        $customer->setFirstname('test')
            ->setLastname('test')
            ->setCompany('test')
            ->setEmail('test')
            ->setUser($user);

        $this->assertFalse($customer->getFirstname() === 'false');
        $this->assertFalse($customer->getLastname() === 'false');
        $this->assertFalse($customer->getCompany() === 'false');
        $this->assertFalse($customer->getEmail() === 'false');
        $this->assertFalse($customer->getUser() === new User);
    }

    public function testIsEmpty(): void
    {
        $customer = new Customer;

        $this->assertEmpty($customer->getFirstname());
        $this->assertEmpty($customer->getLastname());
        $this->assertEmpty($customer->getCompany());
        $this->assertEmpty($customer->getEmail());
        // $this->assertEmpty($customer->getUser());
    }
}
