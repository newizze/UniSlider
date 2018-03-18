<?php

/**
 * Get slider
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

use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

/**
 * Get slider
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

class Slider extends Template implements BlockInterface
{
    protected $_template = "widget/slider.phtml";

    /**
     * Get array as option
     *
     * @param $dirName
     * @return string
     */
    public function getPathToImages($dirName)
    {
        $pathDir = "pub/media/wysiwyg/$dirName";
        $path = "";
        if (is_dir($pathDir)) {
            foreach (scandir($pathDir) as $index => $img) {
                if ($index > 1)
                    $path .= "<div><img src='$pathDir/$img'></div>";
            }

            return $path;
        } else {
            return "<span style='background: #ff0000;padding:10px;font-size:20px'>Wrong directory</span>";
        }
    }

}