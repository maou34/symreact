<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use DateTimeImmutable;
use App\Entity\Invoice;
use App\Entity\Customer;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        $admin = new User;
        $admin->setFirstname('Florent')
            ->setLastname('Léger')
            ->setEmail('florent.leger@outlook.fr')
            ->setPassword($this->encoder->hashPassword($admin, 'password'))
            ->setRoles(['ROLE_ADMIN']);

        $manager->persist($admin);

        for ($c = 0; $c < 10; $c++) {
            $user = new User;

            $user->setFirstname($faker->firstName())
                ->setLastname($faker->lastName())
                ->setEmail("user" . $c + 1 . "@mon-mail.fr")
                ->setPassword($this->encoder->hashPassword($user, 'password'));

            $manager->persist($user);

            for ($ch = 0; $ch < mt_rand(5, 20); $ch++) {
                $chrono = 1;

                $customer = new Customer;
                $customer->setFirstname($faker->firstName())
                    ->setLastname($faker->lastName())
                    ->setCompany($faker->company())
                    ->setEmail($faker->email())
                    ->setUser($user);

                $manager->persist($customer);

                for ($i = 0; $i < mt_rand(3, 10); $i++) {
                    $invoice = new Invoice;

                    $invoice->setAmount($faker->randomFloat(2, 250, 5000))
                        ->setSentAt(new DateTimeImmutable())
                        ->setStatus($faker->randomElement(
                            [
                                'PAID', 'SENT', 'CANCELLED'
                            ]
                        ))
                        ->setCustomer($customer)
                        ->setChrono($chrono);

                    $manager->persist($invoice);

                    $chrono++;
                }
            }
        }

        $manager->flush();
    }
}
