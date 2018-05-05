<?php
/**
 * Copyright (c) 2014-2026 Plugin Company
 *
 * This file is part of Product Page PDF for Magento 2, released under the MIT License.
 * See the LICENSE file in the project root.
 */
namespace PluginCompany\ProductPdf\Block\Pdf\Content;

use PluginCompany\ProductPdf\Block\Pdf\Content;
use PluginCompany\ProductPdf\Model\System\Config\Source\ShowPrice;

class CustomOptions extends Content
{
    protected $_template = 'PluginCompany_ProductPdf::pdf/content/options/custom.phtml';

    public function canShowPrice()
    {
        if($this->getShowPriceSetting() == ShowPrice::SHOW_PRICE) {
            return true;
        }
        if($this->getShowPriceSetting() == ShowPrice::HIDE_PRICE) {
            return false;
        }
        return parent::canShowPrice();
    }

    private function getShowPriceSetting()
    {
        return (int)$this->getGroupConfig('custom_options/show_price');
    }

}

