<?php
/**
 * Choose img
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

use Magento\Framework\Data\Form\Element\AbstractElement as Element;
use Magento\Backend\Block\Template\Context as TemplateContext;
use Magento\Framework\Data\Form\Element\Factory as FormElementFactory;
use Magento\Backend\Block\Template;

/**
 * Choose img
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

class ImageChooser extends Template
{
    /**
     * @var \Magento\Framework\Data\Form\Element\Factory
     */
    protected $_elementFactory;

    /**
     * @param TemplateContext $context
     * @param FormElementFactory $elementFactory
     * @param array $data
     */
    public function __construct(TemplateContext $context, FormElementFactory $elementFactory, $data = array())
    {
        $this->_elementFactory = $elementFactory;
        parent::__construct($context, $data);
    }

    /**
     * Prepare chooser element HTML
     *
     * @param Element $element
     * @return Element
     */
    public function prepareElementHtml(Element $element)
    {
        $config = $this->_getData('config');
$sourceUrl = $this->getUrl('cms/wysiwyg_images/index', array('target_element_id'=>$element->getId(),'type'=>'file'));

        /** @var \Magento\Backend\Block\Widget\Button $chooser */
        $chooser = $this->getLayout()->createBlock('Magento\Backend\Block\Widget\Button')
        ->setType('button')->setClass('btn-chooser')
        ->setLabel($config['button']['open'])->setOnClick('MediabrowserUtility.openDialog(\''. $sourceUrl .'\')')
        ->setDisabled($element->getReadonly());

        /** @var \Magento\Framework\Data\Form\Element\Text $input */
        $input = $this->_elementFactory->create("text", array('data' => $element->getData()));
        $input->setId($element->getId());
        $input->setForm($element->getForm());
        $input->setClass("widget-option input-text admin__control-text");
        if ($element->getRequired()) {
            $input->addClass('required-entry');
        }

        $element->setData('after_element_html', $input->getElementHtml() . $chooser->toHtml());

        return $element;
    }
}