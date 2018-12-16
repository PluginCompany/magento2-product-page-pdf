<?php
/**
 * Copyright (c) 2014-2026 Plugin Company
 *
 * This file is part of Product Page PDF for Magento 2, released under the MIT License.
 * See the LICENSE file in the project root.
 */
namespace PluginCompany\ProductPdf\Plugin\View\Asset;

class MinificationPlugin
{

    public function aroundGetExcludes(
        \Magento\Framework\View\Asset\Minification $subject,
        callable $proceed,
        $contentType
    ) {
        $result = $proceed($contentType);
        if ($contentType == 'css') {
            $excludes = [
                '.*frontend.*PluginCompany_ProductPdf.*'
            ];
            return array_merge($result, $excludes);
        }
        return $result;
    }

}