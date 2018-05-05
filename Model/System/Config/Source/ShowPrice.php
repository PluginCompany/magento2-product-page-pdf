<?php
/**
 * Copyright (c) 2014-2026 Plugin Company
 *
 * This file is part of Product Page PDF for Magento 2, released under the MIT License.
 * See the LICENSE file in the project root.
 */
namespace PluginCompany\ProductPdf\Model\System\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class ShowPrice extends AbstractOption implements ArrayInterface
{

    const USE_DEFAULT = 0;
    const SHOW_PRICE = 1;
    const HIDE_PRICE = 2;

    public function toArray()
    {
        return array(
            0 => 'Use general title & price section settings',
            1 => 'Yes',
            2 => 'No',
        );
    }

}