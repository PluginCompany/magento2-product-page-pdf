<?php
/**
 * Copyright (c) 2014-2026 Plugin Company
 *
 * This file is part of Product Page PDF for Magento 2, released under the MIT License.
 * See the LICENSE file in the project root.
 */
namespace PluginCompany\ProductPdf\Block\Adminhtml\Config;

use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

class SectionSort
    extends Field
{
    /**
     * @var AbstractElement
     */
    private $element;

    /**
     * @param AbstractElement $element
     * @return string
     */
    protected function _getElementHtml(AbstractElement $element)
    {
        $this->element = $element;
        $element->setType('hidden');
        return $this->generateHtml();
    }


    private function getFontSelectHtml()
    {

        return $this->getLayout()
            ->createBlock('PluginCompany\ProductPdf\Block\Adminhtml\Config\SectionSort\SectionList')
            ->setElementHtmlId($this->element->getHtmlId())
            ->setHtmlId($this->element->getHtmlId() . '-sort')
            ->setValue($this->element->getValue())
            ->toHtml();
    }

    private function generateHtml()
    {
        return
            $this->element->getElementHtml()
            . $this->getFontSelectHtml();

        return $this;
    }

}