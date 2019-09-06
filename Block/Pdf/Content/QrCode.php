<?php
/**
 * Copyright (c) 2014-2026 Plugin Company
 *
 * This file is part of Product Page PDF for Magento 2, released under the MIT License.
 * See the LICENSE file in the project root.
 */
namespace PluginCompany\ProductPdf\Block\Pdf\Content;
use PluginCompany\ProductPdf\Block\Pdf\Content;

class QrCode extends Content
{

    protected $_template = 'PluginCompany_ProductPdf::pdf/content/qr_code.phtml';

    public function getProductUrl()
    {
        return $this->getProduct()
            ->getProductUrl(false);
    }

    public function getSize()
    {
        return $this->getConfig('size');
    }

    public function getConfigFlag($field)
    {
        return $this->getGroupConfigFlag('qr_code/' . $field);
    }

    public function getConfig($field)
    {
        return $this->getGroupConfig('qr_code/' . $field);
    }

}

