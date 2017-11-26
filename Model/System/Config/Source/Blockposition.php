<?php
/**
 * Copyright (c) 2014-2026 Plugin Company
 *
 * This file is part of Product Page PDF for Magento 2, released under the MIT License.
 * See the LICENSE file in the project root.
 */

namespace PluginCompany\ProductPdf\Model\System\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class Blockposition implements ArrayInterface
{

    public function toOptionArray()
    {
        $options = array();
        foreach($this->toArray() as $k => $v){
            $options[] = array(
                'label' => $v,
                'value' => $k
            );
        }
        return $options;
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        return [
            '.product-info-main .towishlist' => __('Add to Wish List'),
            '.product-info-main .tocompare' => __('Add to Compare'),
            '.product-info-main .mailto.friend' => __('Email'),
            '.product-info-main .page-title' => __('Page / Product Title'),
            '.product-info-main .product-reviews-summary' => __('Review Summary'),
            '.product-info-main .product-reviews-summary' => __('Review Summary'),
            '.product-info-price' => __('Product Price Section'),
            '.product-info-price .price-box' => __('Product Price'),
            '.product-info-stock-sku' => __('Stock / SKU'),
            '.product-options-wrapper' => __('Product Options'),
            '.product-options-bottom' => __('Product Options Bottom'),
            '.product-options-bottom .field.qty' => __('QTY input box'),
            '#product-addtocart-button, #bundle-slide' => __('Add to Cart button'),
            '.product.attribute.description' => __('Product Description'),
            '.additional-attributes-wrapper' => __('More Information'),
            'custom_selector' => __('Use Custom CSS Selector'),
        ];
    }
}