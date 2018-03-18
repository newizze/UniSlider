<?php

/**
 * Get products
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

namespace Newizze\UniSlider\Block\Widget;

use Magento\Widget\Block\BlockInterface;
use Magento\Framework\View\Element\Template;

/**
 * Get products
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

class Products extends Template implements BlockInterface
{
    protected $_categoryFactory;

    /**
     * Products constructor.
     *
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Catalog\Model\CategoryFactory $categoryFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Catalog\Model\CategoryFactory $categoryFactory,
        array $data = array()
    ) {
        $this->_categoryFactory = $categoryFactory;
        parent::__construct($context, $data);
    }

    /**
     * Get array as option
     *
     * @param $categoryId
     * @return \Magento\Catalog\Model\Category
     */
    public function getCategory($categoryId)
    {
        $category = $this->_categoryFactory->create();
        $category->load($categoryId);
        return $category;
    }

    /**
     * Get array as option
     *
     * @param $categoryId
     * @return \Magento\Framework\Data\Collection\AbstractDb
     */
    public function getCategoryProducts($categoryId)
    {
        $products = $this->getCategory($categoryId)->getProductCollection();
        $products->addAttributeToSelect('*');
        return $products;
    }

    /**
     * Get array as option
     *
     * @param $categoryId
     * @return string
     */
    public function getProducts($categoryId)
    {
        $temp = $this->getCategoryProducts($categoryId);
        if ($temp) {
            $html = "";
            foreach ($temp as $k => $v) {
                $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
                $_product = $objectManager->get('Magento\Catalog\Model\Product')->load($v->getId());
                $imageHelper  = $objectManager->get('\Magento\Catalog\Helper\Image');
                $imageUrl = $imageHelper->init($_product, 'product_page_image_medium')
                    ->setImageFile($_product->getFile())->resize(1000, 1000)->getUrl();
                $html .= "<div>"
                            ."<span>"
                                ."<img src='$imageUrl' >"
                                ."<a class='{$v->getProductUrl()}'>{$v->getName()}</a>"
                            ."</span>"
                        ."</div>";
            }

            return $html;
        }
    }
}
