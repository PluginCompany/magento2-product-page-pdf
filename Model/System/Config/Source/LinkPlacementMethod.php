<?php
/**
 * Copyright (c) 2014-2026 Plugin Company
 *
 * This file is part of Product Page PDF for Magento 2, released under the MIT License.
 * See the LICENSE file in the project root.
 */
namespace PluginCompany\ProductPdf\Model\System\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;

/**
 * Class
 */
class LinkPlacementMethod implements OptionSourceInterface
{
    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options = [
            [
                'label' => __('Insert Before'),
                'value' => 'insertBefore'
            ],
            [
                'label' => __('Insert After'),
                'value' => 'insertAfter',
            ],
            [
                'label' => __('Prepend To'),
                'value' => 'prependTo',
            ],
            [
                'label' => __('Append To'),
                'value' => 'appendTo',
            ],
        ];
        return $options;
    }
}

