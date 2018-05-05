<?php
/**
 * Copyright (c) 2014-2026 Plugin Company
 *
 * This file is part of Product Page PDF for Magento 2, released under the MIT License.
 * See the LICENSE file in the project root.
 */

namespace PluginCompany\ProductPdf\Model\System\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class Linethickness extends AbstractOption implements ArrayInterface
{
    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        return array(
            '1px' => '1px',
            '2px' => '2px',
            '3px' => '3px',
            '4px' => '4px',
            '5px' => '5px',
            '6px' => '6px',
            '7px' => '7px',
            '8px' => '8px',
            '9px' => '9px',
            '10px' => '10px'
        );
    }
}