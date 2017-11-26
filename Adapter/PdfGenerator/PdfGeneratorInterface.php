<?php
/**
 * Copyright (c) 2014-2026 Plugin Company
 *
 * This file is part of Product Page PDF for Magento 2, released under the MIT License.
 * See the LICENSE file in the project root.
 */
namespace PluginCompany\ProductPdf\Adapter\PdfGenerator;

use Magento\Framework\View\Element\AbstractBlock;

interface PdfGeneratorInterface
{
    /**
     * @param AbstractBlock $block
     * @return string
     */
    public function generate(AbstractBlock $block);

    /**
     * @param $value
     * @return $this
     */
    public function setDefaultFont($value);

    /**
     * @param $value
     * @return $this
     */
    public function setMarginLeft($value);

    /**
     * @param $value
     * @return $this
     */
    public function setMarginRight($value);

    /**
     * @param $value
     * @return $this
     */
    public function setMarginTop($value);

    /**
     * @param $value
     * @return $this
     */
    public function setMarginBottom($value);

    /**
     * @param $value
     * @return $this
     */
    public function setMarginHeader($value);

    /**
     * @param $value
     * @return $this
     */
    public function setMarginFooter($value);

    /**
     * @param $value
     * @return $this
     */
    public function setOrientation($value);

    /**
     * @param $value
     * @return $this
     */
    public function setFileName($value);

    /**
     * @param $value
     * @return $this
     */
    public function setHtmlFooter($value);
}