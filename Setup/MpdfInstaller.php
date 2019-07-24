<?php
/**
 * Copyright (c) 2014-2026 Plugin Company
 *
 * This file is part of Product Page PDF for Magento 2, released under the MIT License.
 * See the LICENSE file in the project root.
 */
namespace PluginCompany\ProductPdf\Setup;

use PluginCompany\ProductPdf\Setup\Composer\ComposerRequire;

class MpdfInstaller
{
    /**
     * @var ComposerRequire
     */
    private $composerRequire;

    public function __construct(
        ComposerRequire $composerRequire
    ) {
        $this->composerRequire = $composerRequire;
    }

    public function runInstall()
    {
        ini_set('memory_limit', -1);
        $this->composerRequire->requirePackage(['mpdf/mpdf']);
        return $this;
    }

    static public function isMpdfInstalled()
    {
        if(class_exists('\\Mpdf\\Mpdf')){
            return true;
        }
        return false;
    }
}