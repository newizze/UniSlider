<?php

/**
 * Get category
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
 * Get category
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

class GetCategories implements \Magento\Framework\Option\ArrayInterface
{

    /**
     * Get options as array
     *
     * @return array
     */
    public function toOptionArray()
    {
        return $this->getCategoryCollection();
    }


    /**
     * Get options as array
     *
     * @return array
     */
    public function getCategoryCollection()
    {
        $objectManager =  \Magento\Framework\App\ObjectManager::getInstance();

        $categoryHelper = $objectManager->get('\Magento\Catalog\Helper\Category');
        $categories = $categoryHelper->getStoreCategories();
        $cat = array();
        foreach ($categories as $c) {
            $cat[] = array('value' => $c->getId(), 'label' => __($c->getName()));
        }

        return $cat;
    }

}