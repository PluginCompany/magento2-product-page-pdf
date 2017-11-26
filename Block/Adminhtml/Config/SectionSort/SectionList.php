<?php
/**
 * Copyright (c) 2014-2026 Plugin Company
 *
 * This file is part of Product Page PDF for Magento 2, released under the MIT License.
 * See the LICENSE file in the project root.
 */

namespace PluginCompany\ProductPdf\Block\Adminhtml\Config\SectionSort;

use Magento\Framework\View\Element\Template;

class SectionList extends Template
{
    protected $_template = 'PluginCompany_ProductPdf::config/sectionsort/list.phtml';

    public function getValue()
    {
        $value = parent::getValue();
        if(!$value){
            return false;
        }
        return json_decode($value, true);
    }

}