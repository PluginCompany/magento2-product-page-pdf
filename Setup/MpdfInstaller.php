<?php
/**
 * Copyright (c) 2014-2026 Plugin Company
 *
 * This file is part of Product Page PDF for Magento 2, released under the MIT License.
 * See the LICENSE file in the project root.
 */
namespace PluginCompany\ProductPdf\Setup;

use Magento\Framework\App\Filesystem\DirectoryList;
use PluginCompany\ProductPdf\System\Exec;

class MpdfInstaller
{
    /** @var Exec */
    private $exec;

    /** @var DirectoryList */
    private $directoryList;

    public function __construct(
        Exec $exec,
        DirectoryList $directoryList
    ) {
        $this->exec = $exec;
        $this->directoryList = $directoryList;
        return $this;
    }

    public function runInstall()
    {
        putenv('COMPOSER_HOME=' . $this->getRootDir() . '/vendor/bin/composer');
        $this->exec
            ->execute(
                "cd {$this->getRootDir()};
                 {$this->exec->getPhpExecutable()} ./vendor/bin/composer require --no-interaction mpdf/mpdf"
            );
        $this->exec
            ->execute(
                "cd {$this->getRootDir()};
                chmod -Rf 777 ./vendor/mpdf"
            );
        return $this;
    }

    private function getRootDir()
    {
        return $this->directoryList->getRoot();
    }

    static public function isMpdfInstalled()
    {
        if(class_exists('\\Mpdf\\Mpdf')){
            return true;
        }
        return false;
    }
}