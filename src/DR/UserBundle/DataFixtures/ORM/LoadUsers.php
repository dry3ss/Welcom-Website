<?php

/*
 * This file is part of the Symfony package.
*
* (c) Fabien Potencier <fabien@symfony.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace DR\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

use DR\UserBundle\Entity\User;

/**
 * Defines the sample data to load in the database when running the unit and
 * functional tests. Execute this command to load the data:
 *
 *   $ php bin/console doctrine:fixtures:load
 *
 * See http://symfony.com/doc/current/bundles/DoctrineFixturesBundle/index.html
 *
 * @author Ryan Weaver <weaverryan@gmail.com>
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 */
class LoadUsers implements FixtureInterface, ContainerAwareInterface
{
	/**
	 * @var ContainerInterface
	 */
	private $container;

	public function setContainer(ContainerInterface $container = null)
	{
		$this->container = $container;
	}

	/**
	 * {@inheritdoc}
	 */
	public function load(ObjectManager $manager)
	{
		$this->loadUsers($manager);
	}

	private function loadUsers(ObjectManager $manager)
	{
		$passwordEncoder = $this->container->get('security.password_encoder');

		$johnUser = new User();
		$johnUser->setUsername('john_user');
		$johnUser->setEmail('john_user@symfony.com');
		$encodedPassword = $passwordEncoder->encodePassword($johnUser, '123456789');
		$johnUser->setPassword($encodedPassword);
		$johnUser->setEnabled(true);
		$manager->persist($johnUser);

		$annaAdmin = new User();
		$annaAdmin->setUsername('anna_admin');
		$annaAdmin->setEmail('anna_admin@symfony.com');
		$annaAdmin->setRoles(['ROLE_ADMIN']);
		$encodedPassword = $passwordEncoder->encodePassword($annaAdmin, '123456789') ;  
		$annaAdmin->setPassword($encodedPassword);
		$annaAdmin->setEnabled(true);
		$manager->persist($annaAdmin);
		
		$TomSAdmin = new User();
		$TomSAdmin->setUsername('tom_super_admin');
		$TomSAdmin->setEmail('tom_super_admin@symfony.com');
		$TomSAdmin->setRoles(['ROLE_SUPER_ADMIN']);
		$encodedPassword = $passwordEncoder->encodePassword($TomSAdmin, '123456789');
		$TomSAdmin->setPassword($encodedPassword);
		$TomSAdmin->setEnabled(true);
		$manager->persist($TomSAdmin);

		$manager->flush();
	}
}
