<?php

namespace App\Tests;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $user = new User();
        $user->setEmail('test@test.com')
            ->setfirstname('prenom')
            ->setLastname('nom')
            ->setPassword('password')
            ->setRoles(['role', 'ROLE_USER']);

        $this->assertTrue($user->getEmail() === 'test@test.com');
        $this->assertTrue($user->getFirstname() === 'prenom');
        $this->assertTrue($user->getLastname() === 'nom');
        $this->assertTrue($user->getPassword() === 'password');
        $this->assertTrue($user->getRoles() === ['role', 'ROLE_USER']);
    }

    public function testIsFalse(): void
    {
        $user = new User();
        $user->setEmail('test@test.com')
            ->setfirstname('prenom')
            ->setLastname('nom')
            ->setPassword('password')
            ->setRoles(['role', 'ROLE_USER']);

        $this->assertFalse($user->getEmail() === 'false@test.com');
        $this->assertFalse($user->getFirstname() === 'false');
        $this->assertFalse($user->getLastname() === 'false');
        $this->assertFalse($user->getPassword() === 'false');
        $this->assertFalse($user->getRoles() === ['false']);
    }

    public function testIsEmpty(): void
    {
        $user = new User();

        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getFirstname());
        $this->assertEmpty($user->getLastname());
        // $this->assertEmpty($user->getPassword());
        // $this->assertEmpty($user->getRoles([]));
    }
}
