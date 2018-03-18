<?php

/**
 * Display template about company
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
 * Display template about company
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

class DisplaySlider extends Template
{
    /**
     * element factory
     *
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
     * @return Element
     */



    public function prepareElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        $sliderExample = "<div class=\"single-item newizze__si slick-initialized slick-slider\" 
                                 style=\"width: 40%;margin-top: 20px;margin-bottom: -10px;\">
                              <div><img src=\"http://via.placeholder.com/50x50\" alt=''></div>   
                              <div><img src=\"http://via.placeholder.com/50x50\" alt=''></div>   
                              <div><img src=\"http://via.placeholder.com/50x50\" alt=''></div>   
                              <div><img src=\"http://via.placeholder.com/50x50\" alt=''></div>   
                              <div><img src=\"http://via.placeholder.com/50x50\" alt=''></div> 
                            </div>";
        $sliderSlickCss = '<link rel="stylesheet" 
href="http://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css">';
        $sliderSlickThemeCss = '<link rel="stylesheet" 
href="http://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css">';
        $sliderStyle="<style>
                            .slick-arrow{
                                background-color: #ccc;
                                border: 1px solid #ccc;
                                border-radius: 60%;
                            }
                            .slick-arrow:hover{
                                background-color: #ccc;
                                border: 1px solid #ccc;
                                border-radius: 60%;
                            }
                         </style>";
        $style = "text-align:-webkit-center;width:40%;margin-top:20px;margin-bottom:-20px;";
        $sliderItemOne = "<div class='single-item newizze__si' style='".$style."'>"
."<div ><img src = 'http://via.placeholder.com/50x50' alt = '' ></div >"
."<div ><img src = 'http://via.placeholder.com/50x50' alt = '' ></div >"
."<div ><img src = 'http://via.placeholder.com/50x50' alt = '' ></div >"
."<div ><img src = 'http://via.placeholder.com/50x50' alt = '' ></div >"
."<div ><img src = 'http://via.placeholder.com/50x50' alt = '' ></div ></div >";
        $style = "text-align: -webkit-center;width: 40%;margin-top: 20px;margin-bottom: -20px;";
        $sliderItemTwo = "<div class='single-item newizze__si' style='".$style."' >"
."<div ><img src = 'http://via.placeholder.com/50x50' alt = '' ></div >"
."<div ><img src = 'http://via.placeholder.com/50x50' alt = '' ></div >"
."<div ><img src = 'http://via.placeholder.com/50x50' alt = '' ></div >"
."<div ><img src = 'http://via.placeholder.com/50x50' alt = '' ></div >"
."<div ><img src = 'http://via.placeholder.com/50x50' alt = '' ></div ></div >";
        $sliderScript = "<script>
                                require.config({
                        deps: [
                            'jquery',
                        ],
                        paths: {
                            'slick': 'http://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min'
                        }
                    });
                    require(['slick', 'jquery'], function (slick, $) {
                        //newizze__si
                        var elem = $('.newizze__si');
                        $(\"[name = 'parameters[typeofsliders]']\").after($('.newizze__si'));
                        var index_of_slider = $(\"[name = 'parameters[typeofsliders]'] :selected\").val();
                        $(\"[name = 'parameters[typeofsliders]']\").change(function() {
                            index_of_slider = $(this).val();
                        
                            if(index_of_slider == 0){
                                $('.single-item').remove();
                                $(\"[name = 'parameters[typeofsliders]']\").after(
                                    \" ".$sliderItemOne." \"
                                );

                                $('.single-item').slick();
                            }
                            if(index_of_slider == 1){
                                $('.single-item').remove();
                                $(\"[name = 'parameters[typeofsliders]']\").after(
                                    \" ".$sliderItemTwo." \"
                                );

                                $('.single-item').slick({
                                  infinite: true,
                                  slidesToShow: 3,
                                  slidesToScroll: 3
                                });

                            }
                            if(index_of_slider == 2){
                                $('.single-item').remove();
                                $(\"[name = 'parameters[typeofsliders]']\").after(
                                    \" ".$sliderItemTwo." \"
                                );

                                $('.single-item').slick({
                                  dots: true,
                                  infinite: false,
                                  speed: 300,
                                  slidesToShow: 4,
                                  slidesToScroll: 4,
                                  
                                });
                            }
                            if(index_of_slider == 3){
                                $('.single-item').remove();
                                $(\"[name = 'parameters[typeofsliders]']\").after(
                                    \" ".$sliderItemTwo." \"
                                );

                                $('.single-item').slick({
                                  dots: true,
                                  infinite: true,
                                  speed: 300,
                                  slidesToShow: 1,
                                  centerMode: true,
                                  variableWidth: true
                                });
                            }
                            if(index_of_slider == 4){
                                $('.single-item').remove();
                                $(\"[name = 'parameters[typeofsliders]']\").after(
                                    \" ".$sliderItemTwo." \"
                                );

                                $('.single-item').slick({
                                  dots: true,
                                  infinite: true,
                                  speed: 300,
                                  slidesToShow: 1,
                                  adaptiveHeight: true
                                });
                            }
                            if(index_of_slider == 5){
                                $('.single-item').remove();
                                $(\"[name = 'parameters[typeofsliders]']\").after(
                                    \" ".$sliderItemTwo." \"
                                );

                                $('.single-item').slick({
                                  centerMode: true,
                                  centerPadding: '60px',
                                  slidesToShow: 3,
                                  
                                });
                            }
                            if(index_of_slider == 6){
                                $('.single-item').remove();
                                $(\"[name = 'parameters[typeofsliders]']\").after(
                                    \" ".$sliderItemTwo." \"
                                );

                                $('.single-item').slick({
                                  lazyLoad: 'ondemand',
                                  slidesToShow: 3,
                                  slidesToScroll: 1
                                });
                            }
                            if(index_of_slider == 7){
                                $('.single-item').remove();
                                $(\"[name = 'parameters[typeofsliders]']\").after(
                                    \" ".$sliderItemTwo." \"
                                );

                                $('.single-item').slick({
                                  slidesToShow: 3,
                                  slidesToScroll: 1,
                                  autoplay: true,
                                  autoplaySpeed: 2000,
                                });
                            }
                            if(index_of_slider == 8){
                                $('.single-item').remove();
                                $(\"[name = 'parameters[typeofsliders]']\").after(
                                    \" ".$sliderItemTwo." \"
                                );

                                $('.single-item').slick({
                                  dots: true,
                                  infinite: true,
                                  speed: 500,
                                  fade: true,
                                  cssEase: 'linear'
                                });
                            }
                            if(index_of_slider == 9){
                            $('.single-item').remove();
                                $(\"[name = 'parameters[typeofsliders]']\").after(
                                    \" ".$sliderItemTwo." \"
                                );

                                $('.single-item').slick();
                            }
                            
                        });
                    });
                           </script>";
        $html = $sliderExample.$sliderSlickCss.$sliderSlickThemeCss.$sliderStyle.$sliderScript;;
        $element->setData('after_element_html', $html);
        return $element;
    }
}
