<?php
/**
 * Copyright (c) 2014-2026 Plugin Company
 *
 * This file is part of Product Page PDF for Magento 2, released under the MIT License.
 * See the LICENSE file in the project root.
 */
namespace PluginCompany\ProductPdf\Block\Pdf\Content;

use PluginCompany\ProductPdf\Block\Pdf\Content;

class Price extends Content
{

    protected $_template = 'PluginCompany_ProductPdf::pdf/content/price.phtml';

    public function getPriceHtml()
    {
        if($this->isProductBundle()){
            return $this->getBundlePriceHtml();
        }
        return $this->getProduct()->getFormatedPrice();
    }

    public function getBundlePriceHtml()
    {
        return $this->getBlockHtmlWithProduct(
            'PluginCompany\ProductPdf\Block\Pdf\Content\Bundle\Price'
        );
    }

}

