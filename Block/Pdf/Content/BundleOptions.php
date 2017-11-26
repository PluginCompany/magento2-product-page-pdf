<?php
/**
 * Copyright (c) 2014-2026 Plugin Company
 *
 * This file is part of Product Page PDF for Magento 2, released under the MIT License.
 * See the LICENSE file in the project root.
 */
namespace Plugincompany\ProductPdf\Block\Pdf\Content;

use Plugincompany\ProductPdf\Block\Pdf\Content;

class BundleOptions extends Content
{
    protected $_template = 'PluginCompany_ProductPdf::pdf/content/options/bundle.phtml';

    /**
     * Return an array of bundle product options
     *
     * @return array
     */
    public function getOptions()
    {
        return $this->getLayout()
            ->createBlock('Magento\Bundle\Block\Catalog\Product\View\Type\Bundle')
            ->setProduct($this->getProduct())
            ->getOptions();
    }

    public function getFullImageUrl($path)
    {
        return $this->getFullProductImageUrl($path);
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

