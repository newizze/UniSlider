<?php

/**
 * Type of slider
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
 * Type of slider
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

class TypesOfSliders implements \Magento\Framework\Option\ArrayInterface
{

    /**
     * Get options as array
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array('value' => '0', 'label' => __('Single Item ')),
            array('value' => '1', 'label' => __('Multiple Items')),
            array('value' => '2', 'label' => __('Responsive Display')),
            array('value' => '3', 'label' => __('Variable Width')),
            array('value' => '4', 'label' => __('Adaptive Height')),
            array('value' => '5', 'label' => __('Center Mode')),
            array('value' => '6', 'label' => __('Lazy Loading')),
            array('value' => '7', 'label' => __('Autoplay')),
            array('value' => '8', 'label' => __('Fade')),
            array('value' => '9', 'label' => __('Slider Syncing'))
        );
    }
}
