<?php

/**
 * Is infinity
 *
 * PHP version 7.1.8
 *
 * @category  Mage2
 * @package   Newizze_UniSlider
 * @author    Newizze <info@newizze.com>
 * @author    Eldar Mavlikhanov <eld.mav@gmail.com>
 * @copyright 2018 Newizze
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html GNU GENERAL PUBLIC LICENSE
 * @link      https://newizze.com/
 */

namespace Newizze\UniSlider\Model\Config\Source;

/**
 * Is infinity
 *
 * PHP version 7.1.8
 *
 * @category  Mage2
 * @package   Newizze_UniSlider
 * @author    Newizze <info@newizze.com>
 * @author    Eldar Mavlikhanov <eld.mav@gmail.com>
 * @copyright 2018 Newizze
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html GNU GENERAL PUBLIC LICENSE
 * @link      https://newizze.com/
 */

class Infinity implements \Magento\Framework\Option\ArrayInterface
{

    /**
     * Get options as array
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            0 => array(
                'label' => 'Enable',
                'value' => 'true'
            ),
            1 => array(
                'label' => 'Disable',
                'value' => 'false'
            )
        );
    }
}