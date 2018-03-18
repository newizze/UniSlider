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

namespace Newizze\UniSlider\Block\Widget;

use Magento\Widget\Block\BlockInterface;
use Magento\Framework\View\Element\Template;

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

class TypeOfSliders extends Template implements BlockInterface
{

    /**
     * Get Types
     *
     * @param int $index
     * @param int $slideShow
     * @param int $slideScroll
     * @return string
     */
    public function getTypeOfIndex($index, $slideShow = 0, $slideScroll = 0)
    {
        $dataArray = array();
        $dataArrayFor = array();
        $typeOfTemp = "";
        switch ($index) {
            case 0:
                //Single Item
                $typeOfTemp = "Single Item";
                $dataArray = null;
                break;
            case 1:
                //Multiple Items
                $dataArray = $this->dataArrayForO($slideShow, $slideScroll);
                break;
            case 2:
                //Responsive Display
                $typeOfTemp = "Responsive Display";
                $responsive = "[ { breakpoint: 1024, settings: { slidesToShow: 3, slidesToScroll: 3,"
                ."infinite: true, dots: true }}, { breakpoint: 600, settings: { slidesToShow: 2, slidesToScroll: 2 } },"
                ."{ breakpoint: 480, settings: { slidesToShow: 1, slidesToScroll: 1 } }]";
                $dataArray = $this->dataArrayForT($slideScroll, $slideScroll, $responsive);
                break;
            case 3:
                //Variable Width
                $typeOfTemp = "Variable Width";
                $dataArray = $this->dataArrayForTh();
                break;
            case 4:
                //Adaptive Height
                $typeOfTemp = "Adaptive Height";
                $dataArray = $this->dataArrayForF();
                break;
            case 5:
                //Center Mode
                $typeOfTemp = "Center Mode";
                $responsive = "[{breakpoint: 768,settings: {arrows: false,centerMode: true,centerPadding: \'40px\',"
                ."slidesToShow: 3}},{breakpoint: 480,settings: {arrows: false,centerMode: true,centerPadding: \'40px\',"
                ."slidesToShow: 1}}]";
                $dataArray = $this->dataArrayForFi($slideShow, $responsive);
                break;
            case 6:
                //Lazy Loading
                $typeOfTemp = "Lazy Loading";
                $dataArray = $this->dataArrayForS($slideShow, $slideScroll);
                break;
            case 7:
                 //Autoplay
                $typeOfTemp = "Autoplay";
                 $dataArray = $this->dataArrayForSe($slideShow, $slideScroll);
                break;
            case 8:
                //Fade
                $typeOfTemp = "Fade";
                $dataArray = $this->dataArrayForE();
                break;
            case 9:
                //Slider Syncing
                $typeOfTemp = "Slider Syncing";
                $dataArray = $this->dataArrayForN();
                $dataArrayFor = $this->dataArrayForNF();
                break;
            case 10:
                //Right to Left
                $typeOfTemp = "Right to Left";
                $dataArray = $this->dataArrayForTe();

                break;
            default:
                $dataArray = null;
                break;
        }

        if ($dataArray == null)
            return $this->getP(null)."\n //$typeOfTemp";
        else
            return $this->getP(array($dataArray, $dataArrayFor))."\n //$typeOfTemp";
    }

    /**
     * Get array as option
     *
     * @param $slideShow
     * @param $slideScroll
     * @return array
     */
    public function dataArrayForO($slideShow, $slideScroll)
    {
        return array(
            'infinity' => 'true',
            'slidesToShow' => ($slideShow > 0)? $slideShow : 3,
            'slidesToScroll' => ($slideScroll > 0)? $slideScroll : 3
        );
    }

    /**
     * Get array as option
     *
     * @param $slideShow
     * @param $slideScroll
     * @param $responsive
     * @return array
     */
    public function dataArrayForT($slideShow, $slideScroll, $responsive)
    {
        return array(
            'dots' => 'true',
            'infinite' => 'false',
            'speed' => '300',
            'slidesToShow' => ($slideShow > 0)? $slideShow : 4,
            'slidesToScroll' => ($slideScroll > 0)? $slideScroll : 4,
            'responsive' => $responsive
        );
    }

    /**
     * Get array as option
     *
     * @return array
     */
    public function dataArrayForTh()
    {
       return array(
           'dots' => 'true',
           'infinite' => 'true',
           'speed' => '300',
           'slidesToShow' => 1,
           'centerMode' => 'true',
           'variableWidth' => 'true'
       );
    }

    /**
     * Get array as option
     *
     * @return array
     */
    public function dataArrayForF()
    {
        return array(
            'dots' => 'true',
            'infinite' => 'true',
            'speed' => '300',
            'slidesToShow' => 1,
            'adaptiveHeight' => 'true'
        );
    }

    /**
     * Get array as option
     *
     * @param $slideShow
     * @param $responsive
     * @return array
     */
    public function dataArrayForFi($slideShow, $responsive)
    {
        return array(
            'centerMode' => 'true',
            'centerPadding' => '60px',
            'slidesToShow' => ($slideShow > 0)? $slideShow : 3,
            'responsive' => $responsive
        );
    }

    /**
     * Get array as option
     *
     * @param $slideShow
     * @param $slideScroll
     * @return array
     */
    public function dataArrayForS($slideShow, $slideScroll)
    {
        return array(
            'lazyLoad' => 'ondemand',
            'slidesToShow' => ($slideShow > 0)? $slideShow : 3,
            'slidesToScroll' => ($slideScroll > 0)? $slideScroll : 1
        );
    }

    /**
     * Get array as option
     *
     * @param $slideShow
     * @param $slideScroll
     * @return array
     */
    public function dataArrayForSe($slideShow, $slideScroll)
    {
        return array(
            'autoplay' => 'true',
            'autoplaySpeed' => '2000',
            'slidesToShow' => ($slideShow > 0)? $slideShow : 1,
            'slidesToScroll' => ($slideScroll > 0)? $slideScroll : 1
        );
    }

    /**
     * Get array as option
     *
     * @return array
     */
    public function dataArrayForE()
    {
        return array(
            'dots' => 'true',
            'infinite' => 'true',
            'speed' => '500',
            'fade' => 'true',
            'cssEase' => 'linear',
        );
    }

    /**
     * Get array as option
     *
     * @return array
     */
    public function dataArrayForN()
    {
        return array(
            'slidesToShow' => '1',
            'slidesToScroll' => '1',
            'arrows' => 'false',
            'fade' => 'true',
            'asNavFor' => "'.newizze__elements_for'",
        );
    }

    /**
     * Get array as option
     *
     * @return array
     */
    public function dataArrayForNF()
    {
        return array(
            'slidesToShow' => '3',
            'slidesToScroll' => '1',
            'asNavFor' => "'.newizze__elements'",
            'dots' => 'true',
            'centerMode' => 'true',
            'focusOnSelect' => 'true'
        );
    }

    /**
     * Get array as option
     *
     * @return array
     */
    public function dataArrayForTe()
    {
        return array(
            'rtl' => 'true'
        );
    }

    /**
     * Get array as option
     *
     * @param $p
     * @return string
     */
    public function getP($p)
    {
        $jsParams = $jsParamsFor = "";
        $jsData = "";
        if (is_array($p)) {
            if (isset($p[0])) {
                foreach ($p[0] as $param => $value) {
                    $jsParams .= $param." : ".$value.",\n";
                }

                $jsParams = $this->prepareArr($jsParams);
                $jsData .= $this->prepareJs($jsParams);
            }

            //if isset parameter forNav
            if (!empty($p[1])) {
                foreach ($p[1] as $param => $value) {
                    $jsParamsFor .= $param." : ".$value.",\n";
                }

                $jsParamsFor = $this->prepareArr($jsParamsFor);
                $jsData .= $this->prepareJs($jsParamsFor, true);
            }
        } else {
            $jsParams = '';
            $jsParams = $this->prepareArr($jsParams);
            $jsData .= $this->prepareJs($jsParams);
        }

        return $jsData;
    }

    /**
     * Get array as option
     *
     * @param $js
     * @param bool $for
     * @return string
     */
    public function prepareArr($js, $for = false)
    {
        $classLeft = "fa fa-angle-left newizze__slider_direction newizze__slider_left";
        $classRight = "fa fa-angle-right newizze__slider_direction newizze__slider_right";
        $left = 'prevArrow : \'<i class="'.$classLeft.'" aria-hidden="true"></i>\','."\n";
        $right = 'nextArrow : \'<i class="'.$classRight.'" aria-hidden="true"></i>\''."\n";
        if (!$for)
            return '{'."\n".$js."\n".$left."\n".$right."\n".'}';
        else
            return '{'.substr($js, 0, -1).'}';
    }

    /**
     * Get array as option
     *
     * @param $php
     * @param bool $for
     * @return string
     */
    public function prepareJs($php, $for = false)
    {
        if (!$for)
            return '$(".newizze__elements").slick('.$php.');';
        else
            return '$(".newizze__elements_for").slick('.$php.');';
    }

}
