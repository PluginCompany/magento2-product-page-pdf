<?php
/**
 * Copyright (c) 2014-2026 Plugin Company
 *
 * This file is part of Product Page PDF for Magento 2, released under the MIT License.
 * See the LICENSE file in the project root.
 */

namespace PluginCompany\ProductPdf\Model\System\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class Attachment implements ArrayInterface
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
        return array(
            0 => 'New Tab',
            1 => 'File Download',
       );
    }
}