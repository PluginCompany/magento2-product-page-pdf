<?php
/**
 * Copyright (c) 2014-2026 Plugin Company
 *
 * This file is part of Product Page PDF for Magento 2, released under the MIT License.
 * See the LICENSE file in the project root.
 */
namespace PluginCompany\ProductPdf\Block\Pdf\Content;

use PluginCompany\ProductPdf\Block\Pdf\Content;

class ConfigurableOptions extends Content
{
    protected $_template = 'PluginCompany_ProductPdf::pdf/content/options/configurable.phtml';

    public function getOptions(){
        try{
            $options = $this->getProduct()
                ->getTypeInstance(true)
                ->getConfigurableAttributesAsArray($this->getProduct());
            if (sizeof($options) > 0) {
                return (array) $options;
            }
        } catch (\Exception $e) {
            $this->_logger->debug($e->getMessage());
        }
        return false;
    }

    public function getPricingValueText($value)
    {
        if (!$value['use_default_value']){
            return '';
        }
        if(!isset($value['pricing_value'])) {
            return '';
        }

        if ($value['pricing_value']>0) {
            $text = $value['pricing_value'];
            if ($value['is_percent'] === "1") {
                $text = number_format($text, 2);
                return '+ ' . $text . '%';
            } else {
                return '+ ' . $this->formatCurrency($text);
            }
        }
        return '';
    }
}

