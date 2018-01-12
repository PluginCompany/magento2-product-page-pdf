<?php
/**
 * Copyright (c) 2014-2026 Plugin Company
 *
 * This file is part of Product Page PDF for Magento 2, released under the MIT License.
 * See the LICENSE file in the project root.
 */
namespace PluginCompany\ProductPdf\Model;

use Magento\Framework\Filesystem\Io\FileFactory;
use Magento\Framework\Model\Context;
use Magento\Framework\Module\Dir\Reader;

class FontDirIO
{
    /** @var FileFactory */
    private $ioFileFactory;

    /** @var \Magento\Framework\Filesystem\Io\File  */
    private $io;

    /** @var Reader */
    private $moduleDirReader;

    public function __construct(
        Context $context,
        FileFactory $ioFileFactory,
        Reader $moduleDirReader
    )
    {
        $this->ioFileFactory = $ioFileFactory;
        $this->io = $this->ioFileFactory->create();
        $this->moduleDirReader = $moduleDirReader;
        return $this;
    }

    public function getAdditionalFontsForMpdf()
    {
        $fonts = array();
        foreach($this->readFontDir() as $fontDir){
            $this->io->open(array('path' => $fontDir['id']));
            $fontKey = $fontDir['text'];
            $fonts[$fontKey] = array(
                'R' => $fontKey . '/' . $this->getRegularFont(),
                'B' => $fontKey . '/' . $this->getBoldFont(),
                'I' => $fontKey . '/' . $this->getItalicFont(),
                'BI' => $fontKey . '/' . $this->getBoldItalicFont()
            );
        }
        return $fonts;
    }

    public function readFontDir()
    {
        $this->io->open(array('path' => $this->getGoogleFontDir()));
        return $this->io->ls();
    }

    public function getGoogleFontDir()
    {
        return $this->moduleDirReader->getModuleDir(null, 'PluginCompany_ProductPdf')
            . '/view/base/googlefonts/';
    }

    /**
     * @return \Magento\Framework\Filesystem\Io\File
     */
    public function getIo()
    {
        return $this->io;
    }

    /**
     * @return Reader
     */
    public function getModuleDirReader()
    {
        return $this->moduleDirReader;
    }



}

