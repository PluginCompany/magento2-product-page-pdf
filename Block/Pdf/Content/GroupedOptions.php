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
use PluginCompany\ProductPdf\Model\System\Config\Source\ShowPrice;

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
        return (int)$this->getGroupConfig('grouped_product/show_price');
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

