<?php
/**
 * Copyright (c) 2014-2026 Plugin Company
 *
 * This file is part of Product Page PDF for Magento 2, released under the MIT License.
 * See the LICENSE file in the project root.
 */

namespace PluginCompany\ProductPdf\Controller\Download;

use Magento\Catalog\Model\ProductFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Registry;
use PluginCompany\ProductPdf\Adapter\PdfGenerator\Mpdf;
use PluginCompany\ProductPdf\Adapter\PdfGenerator\PdfGeneratorInterface;
use Psr\Log\LoggerInterface;
use PluginCompany\ProductPdf\Controller\Download\File\CallExit;

class File extends Action {

    /**
     * @var ProductFactory
     */
    protected $catalogProductFactory;

    /**
     * @var Registry
     */
    protected $registry;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var PdfGeneratorInterface
     */
    private $pdfGenerator;

    private $product;

    private $pdfBlock;
    /**
     * @var CallExit
     */
    private $callExit;

    public function __construct(
        Context $context,
        ProductFactory $catalogProductFactory,
        Registry $registry,
        LoggerInterface $logger,
        Mpdf $pdfGenerator,
        CallExit $callExit
    ) {
        $this->catalogProductFactory = $catalogProductFactory;
        $this->registry = $registry;
        $this->logger = $logger;
        $this->pdfGenerator = $pdfGenerator;
        $this->callExit = $callExit;
        parent::__construct(
            $context
        );
    }

    public function execute()
    {
        if (!$this->getProductId()) {
            return $this->getResponse()->setBody(__("Error downloading file"));
        }
        try {
            return $this->runExecute();
        } catch (\Exception $e){
            $this->logger->log(500, $e->getMessage());
        }
    }

    private function runExecute()
    {
        $this->registerProduct();
        if($this->getRequest()->getParam('html')){
            return $this->printHtml();
        }
        return $this->generatePdf();
    }
    private function registerProduct()
    {
        $this->registry->register(
            'current_product',
            $this->getProduct()
        );
        $this->registry->register(
            'product',
            $this->getProduct()
        );
        return $this;
    }

    private function printHtml()
    {
        return $this->getResponse()
            ->setBody(
                $this->getPdfBlock()->toHtml()
            );
    }

    private function getPdfBlock()
    {
        if (!$this->hasPdfBlock()) {
            $this->initPdfBlock();
        }
        return $this->pdfBlock;
    }

    private function hasPdfBlock()
    {
        return isset($this->pdfBlock);
    }

    private function initPdfBlock()
    {
        $this->pdfBlock = $this->getNewPdfBlock();
        return $this;
    }

    private function getNewPdfBlock()
    {
        return $this->_view->getLayout()
            ->createBlock('PluginCompany\ProductPdf\Block\Pdf')
            ->setProduct($this->getProduct());
    }

    private function getProduct()
    {
        if (!$this->hasProduct()) {
            $this->initProduct();
        }
        return $this->product;
    }

    private function hasProduct()
    {
        return isset($this->product);
    }

    private function initProduct()
    {
        $this->product = $this->catalogProductFactory->create()
            ->load($this->getProductId());
        return $this;
    }

    private function getProductId()
    {
        return $this->getRequest()->getParam('id');
    }

    private function generatePdf()
    {
        $this->addFooterToPdf();
        $this->streamPdf();
        $this->callExit();
    }

    private function addFooterToPdf()
    {
        if(!$this->getPdfBlock()->canShowFooter()) {
            return $this;
        }
        $this->pdfGenerator
            ->setMarginBottom(15)
            ->setHtmlFooter($this->getPdfBlock()->getFooterHtml())
        ;
        return $this;
    }


    private function streamPdf()
    {
        $this->pdfGenerator
            ->setFileName($this->getFileName())
            ->generate($this->getPdfBlock());
    }

    private function getFileName()
    {
        return urldecode(str_replace(' ', '_', $this->getProduct()->getName())).'.pdf';
    }

    /**
     * Call exit
     *
     * @return void
     */
    protected function callExit()
    {
        $this->callExit->doCallExit();
    }

}
