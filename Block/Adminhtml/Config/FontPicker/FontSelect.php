<?php
/**
 * Copyright (c) 2014-2026 Plugin Company
 *
 * This file is part of Product Page PDF for Magento 2, released under the MIT License.
 * See the LICENSE file in the project root.
 */
namespace PluginCompany\ProductPdf\Block\Adminhtml\Config\FontPicker;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use PluginCompany\ProductPdf\Model\FontReader;

class FontSelect
    extends Template
{
    protected $_template = 'PluginCompany_ProductPdf::config/font_select.phtml';

    /**
     * @var \PluginCompany\ProductPdf\Model\FontReaderFactory
     */
    protected $fontReader;

    public function __construct(
        Context $context,
        FontReader $fontReader,
        array $data = []
    ) {
        $this->fontReader = $fontReader;
        parent::__construct(
            $context,
            $data
        );
    }


    public function getFontData()
    {
        return $this->fontReader->getFontImageData();
    }
}