<?php
/**
 * Copyright (c) 2014-2026 Plugin Company
 *
 * This file is part of Product Page PDF for Magento 2, released under the MIT License.
 * See the LICENSE file in the project root.
 */
namespace PluginCompany\ProductPdf\Block\Adminhtml\Config;

use Magento\Framework\View\Element\Template;

class CodeFlaskCss extends Template
{

    protected $_template = 'PluginCompany_ProductPdf::config/codeflask_css.phtml';

    public function isProductPdfConfigPage()
    {
        return $this->getRequest()->getParam('section') == 'plugincompany_productpdf';
    }

    protected function _toHtml()
    {
        if(!$this->isProductPdfConfigPage()) {
            return '';
        }
        return parent::_toHtml();
    }

    public function getCodeFlaskCssUrl()
    {
        return $this->_assetRepo->createAsset(
            'PluginCompany_ProductPdf::css/codeflask.css')
            ->getUrl();
    }

}