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
        return $this->getPriceHtmlBox();
    }

    public function getBundlePriceHtml()
    {
        return $this->getBlockHtmlWithProduct(
            'PluginCompany\ProductPdf\Block\Pdf\Content\Bundle\Price'
        );
    }

    private function getPriceHtmlBox()
    {
        return $this->getPriceWithTaxBox($this->getProduct());
    }

    private function getPriceWithTaxBox(\Magento\Catalog\Model\Product $product)
    {
        $priceRender = $this->getLayout()->getBlock('product.price.render.default');
        if(!$priceRender) {
            $priceRender = $this->getLayout()->createBlock(
                \Magento\Framework\Pricing\Render::class,
                'product.price.render.default',
                ['data' => ['price_render_handle' => 'catalog_product_prices']]
            );
        }

        $price = '';
        if($priceRender) {
            $price = $priceRender->render(
                \Magento\Catalog\Pricing\Price\FinalPrice::PRICE_CODE,
                $product,
                [
                    'display_minimal_price' => true,
                    'use_link_for_as_low_as' => false,
                    'zone' => \Magento\Framework\Pricing\Render::ZONE_ITEM_VIEW,
                    'list_category_page' => true
                ]
            );
        }
        if(stristr($price, 'price-excluding-tax-product')) {
            $price = preg_replace('/(<span id="price-excluding-tax-product.*?data-label=")(.*?)(".*?)(<span class="price")/s',
                "<br>$1$2$3<span class='price-label-ex-tax'>$2: </span>$4", $price);
        }
        $price = preg_replace('/(<span class="price-label">.*?span>)/', '$1<br>', $price);
        return $price;
    }

}

