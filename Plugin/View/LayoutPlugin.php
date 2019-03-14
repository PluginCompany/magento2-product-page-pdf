<?php
/**
 * Copyright (c) 2014-2026 Plugin Company
 *
 * This file is part of Product Page PDF for Magento 2, released under the MIT License.
 * See the LICENSE file in the project root.
 */
namespace PluginCompany\ProductPdf\Plugin\View;

use Magento\Framework\App\Request\Http;
use Magento\Framework\App\RequestInterface;

class LayoutPlugin
{
    /**
     * @var Http
     */
    private $request;

    public function __construct(
        RequestInterface $request
    ) {
        $this->request = $request;
    }

    public function afterIsCacheable(\Magento\Framework\View\Layout $subject, $result)
    {
        $action = $this->request->getFullActionName();
        if($action == 'productpdf_download_file') return false;
        return $result;
    }
}
