<?php

namespace App\Tests;

use App\Entity\Invoice;
use App\Entity\Customer;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

class InvoiceUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $customer = new Customer;
        $invoice = new Invoice;
        $datetime = new DateTimeImmutable();

        $invoice->setAmount(20.20)
            ->setStatus('true')
            ->setChrono('10')
            ->setSentAt($datetime)
            ->setCustomer($customer);

        $this->assertTrue($invoice->getAmount() === 20.20);
        $this->assertTrue($invoice->getStatus() === 'true');
        $this->assertTrue($invoice->getChrono() === 10);
        $this->assertTrue($invoice->getSentAt() === $datetime);
        $this->assertTrue($invoice->getCustomer() === $customer);
    }

    public function testIsWrong(): void
    {
        $customer = new Customer;
        $invoice = new Invoice;
        $datetime = new DateTimeImmutable();

        $invoice->setAmount(20.20)
            ->setStatus('true')
            ->setChrono('10')
            ->setSentAt($datetime)
            ->setCustomer($customer);

        $this->assertFalse($invoice->getAmount() === 1.20);
        $this->assertFalse($invoice->getStatus() === 'false');
        $this->assertFalse($invoice->getChrono() === 2);
        $this->assertFalse($invoice->getSentAt() === new DateTimeImmutable());
        $this->assertFalse($invoice->getCustomer() === new Customer);
    }

    public function testIsEmpty(): void
    {
        $invoice = new Invoice;

        $this->assertEmpty($invoice->getAmount());
        $this->assertEmpty($invoice->getStatus());
        $this->assertEmpty($invoice->getChrono());
        $this->assertEmpty($invoice->getSentAt());
        $this->assertEmpty($invoice->getCustomer());
    }
}
