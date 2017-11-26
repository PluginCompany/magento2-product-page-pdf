<?php
/**
 * Copyright (c) 2014-2026 Plugin Company
 *
 * This file is part of Product Page PDF for Magento 2, released under the MIT License.
 * See the LICENSE file in the project root.
 */
namespace PluginCompany\ProductPdf\Block\Pdf\Content;
use PluginCompany\ProductPdf\Block\Pdf\Content;

class TitleAndPrice extends Content
{

    protected $_template = 'PluginCompany_ProductPdf::pdf/content/title_and_price.phtml';

    public function getProductPriceHtml()
    {
        return $this->getBlockHtmlWithProduct(
            'PluginCompany\ProductPdf\Block\Pdf\Content\Price'
        );
    }

    public function getProductTitleFontFamily()
    {
        if($this->getConfigFlag('use_custom_product_title_font')){
            return $this->getConfig('product_title_fontfamily');
        }
        return $this->getDefaultFont();
    }

    public function getPriceFontFamily()
    {
        if($this->getConfigFlag('use_custom_price_font')){
            return $this->getConfig('price_font_family');
        }
        return $this->getDefaultFont();
    }

    public function getConfigFlag($field)
    {
        return $this->getGroupConfigFlag('title_price/' . $field);
    }

    public function getConfig($field)
    {
        return $this->getGroupConfig('title_price/' . $field);
    }

}

