<?php
/**
 * Copyright (c) 2014-2026 Plugin Company
 *
 * This file is part of Product Page PDF for Magento 2, released under the MIT License.
 * See the LICENSE file in the project root.
 */
namespace PluginCompany\ProductPdf\Block\Adminhtml\Mpdf;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use PluginCompany\ProductPdf\Setup\MpdfInstaller;

class Index extends Template
{

    protected $_template = "PluginCompany_ProductPdf::mpdf/index.phtml";

    /**
     * Constructor
     *
     * @param Context $context
     * @param array $data
     */
    public function __construct(
        Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    public function isMpdfInstalled()
    {
        return MpdfInstaller::isMpdfInstalled();
    }
}
