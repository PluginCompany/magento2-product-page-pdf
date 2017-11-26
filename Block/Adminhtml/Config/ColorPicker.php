<?php
/**
 * Copyright (c) 2014-2026 Plugin Company
 *
 * This file is part of Product Page PDF for Magento 2, released under the MIT License.
 * See the LICENSE file in the project root.
 */
namespace PluginCompany\ProductPdf\Block\Adminhtml\Config;
use Magento\Backend\Block\Template\Context;
use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

class ColorPicker extends Field {
    private $element;

    public function __construct(
        Context $context, array $data = []
    ) {
        parent::__construct($context, $data);
    }

    protected function _getElementHtml(AbstractElement $element) {
        $this->element = $element;
        $html = $element->getElementHtml();
        $html .= $this->getColorPickerJS();
        return $html;
    }

    private function getColorPickerJs()
    {
        return $this->getLayout()
                ->createBlock('Magento\Framework\View\Element\Template')
                ->setTemplate("PluginCompany_ProductPdf::config/element/colorpicker_js.phtml")
                ->setElementJSON($this->getElementAsJSON())
                ->setElementHtmlId($this->element->getHtmlId())
                ->toHtml();
    }

    private function getElementAsJSON()
    {
        return json_encode($this->element->getData());
    }
}