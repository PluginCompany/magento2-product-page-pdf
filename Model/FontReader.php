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
use Magento\Framework\Registry;

class FontReader
{
    /** @var FileFactory */
    private $ioFileFactory;

    /** @var \Magento\Framework\Filesystem\Io\File  */
    private $io;

    /** @var Registry */
    private $registry;

    /** @var Reader */
    private $moduleDirReader;

    public function __construct(
        Context $context,
        Registry $registry,
        FileFactory $ioFileFactory,
        Reader $moduleDirReader
    )
    {
        $this->ioFileFactory = $ioFileFactory;
        $this->io = $this->ioFileFactory->create();
        $this->registry = $registry;
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

    private function readFontDir()
    {
        $this->io->open(array('path' => $this->getGoogleFontDir()));
        return $this->io->ls();
    }

    public function getGoogleFontDir()
    {
        return $this->moduleDirReader->getModuleDir(null, 'PluginCompany_ProductPdf')
            . '/view/base/googlefonts/';
    }

    private function getRegularFont()
    {
        return $this->getFontFile('-Regular.ttf');
    }

    private function getBoldFont()
    {
        return $this->getFontFile('-Bold.ttf');
    }

    private function getItalicFont()
    {
        if($font = $this->getFontFile('-Italic.ttf')){
            return $font;
        }
        return $this->getFontFile('-Regular.ttf');
    }

    private function getBoldItalicFont()
    {
        if($font = $this->getFontFile('-BoldItalic.ttf')){
            return $font;
        }
        return $this->getFontFile('-Bold.ttf');
    }

    private function getFontFile($suffix)
    {
        foreach($this->io->ls() as $file) {
            if(stristr($file['text'], $suffix)){
                return $file['text'];
            }
        }
        return false;
    }

    public function getFontImageData()
    {
        if($this->registry->registry('font_image_data')){
            return $this->registry->registry('font_image_data');
        }
        $images = array();
        foreach($this->readFontDir() as $fontDir) {
            $imageData = $this->generateImageData($fontDir);
            $images[$imageData['identifier']] = $imageData;
        }
        ksort($images);
        $this->registry->register('font_image_data', $images);
        return $images;
    }

    private function generateImageData($fontDir)
    {
        $this->io->open(array('path' => $fontDir['id']));
        return array(
            'identifier' => $fontDir['text'],
            'file' => $this->getImageFontFile($fontDir),
            'title' => $this->getFontTitle($fontDir),
            'image_base64' => $this->generateImage($fontDir)
        );
    }

    private function getImageFontFile($fontDir)
    {
        return $fontDir['id'] . DIRECTORY_SEPARATOR . $this->getRegularFont();
    }

    private function generateImage($fontDir)
    {
        $image = $this->generateBaseImage();
        $this->addText($image, $fontDir);
        return $this->convertBase64Image($image);
    }

    private function addText($image, $fontDir)
    {
        $grey = imagecolorallocate($image, 66, 66, 66);
        imagettftext ( $image , 18, 0, 0 , 33 , $grey, $this->getImageFontFile($fontDir), $this->getFontTitle($fontDir));
        return $this;
    }

    private function convertBase64Image($image)
    {
        ob_start();
        imagepng($image);
        $buffer = ob_get_clean();
        return base64_encode($buffer);
    }

    private function generateBaseImage()
    {
        $image = imagecreatetruecolor(270, 50);
        $white = imagecolorallocate($image, 255, 255, 255);
        imagefill($image, 0, 0, $white);
        return $image;
    }

    private function getFontTitle($fontDir)
    {
        $metadata = $this->io->read($fontDir['id'] . '/METADATA.pb');
        preg_match('/"(.*?)"/', $metadata, $matches);
        return isset($matches[1]) ? $matches[1] : FALSE;
    }

}
