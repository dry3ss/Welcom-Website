<?php

namespace DR\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class DRUserBundle extends Bundle
{
	
	public function getParent()
	{
		return 'FOSUserBundle';
	}
	
}
