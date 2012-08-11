<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bert\TimezoneBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\TimezoneType as TimezoneType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ReadableTimezoneType extends TimezoneType
{

	public $timezones_data;
	
	public function __construct($timezones_data) {
		
		$this->timezones_data = $timezones_data;
		
	}

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'choices' => $this->timezones_data,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'choice';
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'readabletimezone';
    }
}
