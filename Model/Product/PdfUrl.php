<?php
/**
 * Copyright (c) 2014-2026 Plugin Company
 *
 * This file is part of Product Page PDF for Magento 2, released under the MIT License.
 * See the LICENSE file in the project root.
 */
namespace PluginCompany\ProductPdf\Model\Product;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Url;
use Magento\Store\Model\StoreManager;
use Magento\Store\Model\StoreManagerInterface;

class PdfUrl
{
    /**
     * @var StoreManager
     */
    private $storeManager;

    /** @var  ProductInterface */
    private $product;

    private $storeId = 0;

    /**
     * @var RequestInterface
     */
    private $request;
    /**
     * @var Url
     */
    private $urlBuilder;

    /**
     * PdfUrl constructor.
     * @param StoreManagerInterface $storeManager
     * @param RequestInterface $request
     * @param Url $urlBuilder
     */
    public function __construct(
        StoreManagerInterface $storeManager,
        RequestInterface $request,
        Url $urlBuilder
    ) {
        $this->storeManager = $storeManager;
        $this->request = $request;
        $this->urlBuilder = $urlBuilder;
    }

    /**
     * @return $this
     */
    public function getPdfUrl()
    {
        if(!$this->getProduct() || !$this->getProductId()) {
            return;
        }
        return $this->getPdfUrlForCurrentScope();
    }

    private function getProductId()
    {
        return $this->getProduct()->getId();
    }

    /**
     * @return ProductInterface
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param ProductInterface $product
     * @return $this
     */
    public function setProduct($product)
    {
        $this->product = $product;
        return $this;
    }

    private function getPdfUrlForCurrentScope()
    {
        $this->urlBuilder->setScope($this->getFrontendStore());
        return $this->urlBuilder
            ->getUrl('productpdf/download/file',
                [
                    'id' => $this->getProductId(),
                    'name' => $this->getFileName(),
                    '_secure' => $this->isSecure(),
                    '_nosid' => true
                ]
            );
    }

    private function getFileName()
    {
        return urlencode(
            str_replace(
                array(' ','/'),
                array('_', ''),
                trim($this->getProduct()->getName()) . '.pdf')
        );
    }

    private function isSecure()
    {
        return (bool)$this->request->isSecure();
    }

    private function getFrontendStore()
    {
        return $this->storeManager->getStore(
            $this->getFrontendStoreId()
        );
    }

    public function getFrontendBaseUrl()
    {
        /** @var \Magento\Store\Model\Store $store */
        $store = $this->storeManager->getStore($this->getStoreId());
        return $store->getBaseUrl();
    }

    public function getFrontendStoreId()
    {
        if($this->storeId) {
            return $this->storeId;
        }
        if($this->getCurrentStoreId()) {
            return $this->getCurrentStoreId();
        }
        $this->getDefaultStoreId();
        return $this->getDefaultStoreId();
    }

    private function getCurrentStoreId()
    {
        return $this->storeManager->getStore()->getId();
    }

    private function getDefaultStoreId()
    {
        return $this->storeManager
            ->getDefaultStoreView()
            ->getStoreId();
    }

    /**
     * @param int $storeId
     * @return $this
     */
    public function setStoreId($storeId)
    {
        $this->storeId = $storeId;
        return $this;
    }


}