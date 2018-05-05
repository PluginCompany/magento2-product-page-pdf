<?php
/**
 * Copyright (c) 2014-2026 Plugin Company
 *
 * This file is part of Product Page PDF for Magento 2, released under the MIT License.
 * See the LICENSE file in the project root.
 */

namespace PluginCompany\ProductPdf\Model\System\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class Attachment extends AbstractOption implements ArrayInterface
{

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        return array(
            0 => 'New Tab',
            1 => 'File Download',
       );
    }
}