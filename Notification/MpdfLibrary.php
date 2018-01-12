<?php
/**
 * Copyright (c) 2014-2026 Plugin Company
 *
 * This file is part of Product Page PDF for Magento 2, released under the MIT License.
 * See the LICENSE file in the project root.
 */
namespace PluginCompany\ProductPdf\Notification;

use Magento\Framework\Notification\MessageInterface;
use Magento\Framework\UrlInterface;

/**
 * Class MpdfLibrary
 */
class MpdfLibrary implements MessageInterface
{

    private $urlBuilder;

    public function __construct
    (
        UrlInterface $urlBuilder
    ) {
        $this->urlBuilder = $urlBuilder;
    }
    /**
     * Message identity
     */
    const MESSAGE_IDENTITY = 'plugincompany_mpdf_library_message';

    /**
     * Retrieve unique system message identity
     *
     * @return string
     */
    public function getIdentity()
    {
        return self::MESSAGE_IDENTITY;
    }

    /**
     * Check whether the system message should be shown
     *
     * @return bool
     */
    public function isDisplayed()
    {
        if(!class_exists('\\Mpdf\\Mpdf')){
            return true;
        }
        return false;
    }

    /**
     * Retrieve system message text
     *
     * @return \Magento\Framework\Phrase
     */
    public function getText()
    {
        return __(
            "<p><b>MPDF Library is not installed but required for the Product Page PDF extension</b></p>
             <p>Please <a href='{$this->getInfoUrl()}'>click here</a> for more information and steps to install the required library</p>"
        );
    }

    private function getInfoUrl()
    {
        return $this->urlBuilder->getUrl("productpagepdf/mpdf/index");
    }

    /**
     * Retrieve system message severity
     * Possible default system message types:
     * - MessageInterface::SEVERITY_CRITICAL
     * - MessageInterface::SEVERITY_MAJOR
     * - MessageInterface::SEVERITY_MINOR
     * - MessageInterface::SEVERITY_NOTICE
     *
     * @return int
     */
    public function getSeverity()
    {
        return self::SEVERITY_CRITICAL;
    }
}