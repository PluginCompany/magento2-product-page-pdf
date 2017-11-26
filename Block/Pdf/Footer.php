<?php
/**
 * Copyright (c) 2014-2026 Plugin Company
 *
 * This file is part of Product Page PDF for Magento 2, released under the MIT License.
 * See the LICENSE file in the project root.
 */
namespace PluginCompany\ProductPdf\Block\Pdf;

use PluginCompany\ProductPdf\Block\Pdf;

class Footer extends Pdf
{

    protected $_template = 'PluginCompany_ProductPdf::pdf/footer.phtml';

    public function canShowProductUrl()
    {
        return $this->getConfigFlag('show_url');
    }

    public function getProductUrl()
    {
        return $this->getProduct()
            ->getProductUrl(false);
    }

    public function canShowTimeStamp()
    {
        return $this->getConfigFlag('show_timestamp');
    }

    public function getTimeStamp()
    {
        return $this->formatDate();
    }

    public function getConfig($field)
    {
        return parent::getFooterConfig($field);
    }

    public function getConfigFlag($field){
        return parent::getFooterConfigFlag($field);
    }


}