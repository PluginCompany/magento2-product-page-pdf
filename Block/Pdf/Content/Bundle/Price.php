<?php
/**
 * Copyright (c) 2014-2026 Plugin Company
 *
 * This file is part of Product Page PDF for Magento 2, released under the MIT License.
 * See the LICENSE file in the project root.
 */
namespace PluginCompany\ProductPdf\Block\Pdf\Content\Bundle;

use PluginCompany\ProductPdf\Block\Pdf\Content;

class Price extends Content
{

    protected $_template = 'PluginCompany_ProductPdf::pdf/content/bundle_price.phtml';

    public function getFormattedMinimalPrice()
    {
        return $this->formatCurrency(
            $this->getMinimalPrice()
        );
    }

    private function getMinimalPrice()
    {
        return $this->getPriceModel()
            ->getMinimalPrice()
            ->getValue();
    }
    public function getFormattedMaximalPrice()
    {
        return $this->formatCurrency(
            $this->getMaximalPrice()
        );
    }

    private function getMaximalPrice()
    {
        return $this->getPriceModel()
            ->getMaximalPrice()
            ->getValue();
    }

    private function getPriceModel()
    {
        return $this->getProduct()
            ->getPriceInfo()
            ->getPrice('final_price');
    }
}

