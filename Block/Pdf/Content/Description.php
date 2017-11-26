<?php
/**
 * Copyright (c) 2014-2026 Plugin Company
 *
 * This file is part of Product Page PDF for Magento 2, released under the MIT License.
 * See the LICENSE file in the project root.
 */
namespace Plugincompany\ProductPdf\Block\Pdf\Content;

use Plugincompany\ProductPdf\Block\Pdf\Content;

class Description extends Content
{
    protected $_template = 'PluginCompany_ProductPdf::pdf/content/description.phtml';

    protected function _beforeToHtml()
    {
        if(!$this->canRender()){
            $this->setTemplate('');
        }
        return parent::_beforeToHtml();
    }

    private function canRender()
    {
        return (bool)$this->getProduct()->getDescription();
    }
}

