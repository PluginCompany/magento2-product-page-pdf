<?php
/**
 * Copyright (c) 2014-2026 Plugin Company
 *
 * This file is part of Product Page PDF for Magento 2, released under the MIT License.
 * See the LICENSE file in the project root.
 */
namespace PluginCompany\ProductPdf\Block\Pdf\Content;

use Magento\Catalog\Model\Product;
use PluginCompany\ProductPdf\Block\Pdf\Content;

class GroupedOptions extends Content
{
    protected $_template = 'PluginCompany_ProductPdf::pdf/content/options/grouped.phtml';

    public function getAssociatedProducts()
    {
        return $this->getProduct()->getTypeInstance(true)
            ->getAssociatedProducts($this->getProduct());
    }

    public function getFullImageUrl(Product $item)
    {
        $item->getResource()->load($item, $item->getEntityId());
        return $this->getFullProductImageUrl($item->getImage());
    }

    public function getFormattedItemPrice($item)
    {
        return $this->formatCurrency(
            $this->getItemPrice($item)
        );
    }

    private function getItemPrice($item)
    {
        return $item->getPrice();
    }

}

