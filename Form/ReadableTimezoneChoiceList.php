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

use Symfony\Component\Form\Extension\Core\ChoiceList\TimezoneChoiceList as TimezoneChoiceList;

/**
 * Represents a choice list
 *
 * @author Bertrand Fan <bertrand@fan.net>
 */
class ReadableTimezoneChoiceList extends TimezoneChoiceList
{
	
	public $timezones_data;
	
	public function __construct($timezones_data) {
		
		$this->timezones_data = $timezones_data;
		
	}
	
    /**
     * Stores the available timezone choices
     * @var array
     */
    static protected $timezones;

    /**
     * Returns the timezone choices.
     *
     * The choices are generated from timezones.yml. They are cached during a single request,
     * so multiple timezone fields on the same page don't lead to unnecessary
     * overhead.
     *
     * @return array The timezone choices
     */
    public function getChoices()
    {
        if (null !== static::$timezones) {
            return static::$timezones;
        }

		foreach ($this->timezones_data as $php_tz => $readable_tz) {
			static::$timezones[$php_tz] = $readable_tz;
		}

        return static::$timezones;
    }
}
