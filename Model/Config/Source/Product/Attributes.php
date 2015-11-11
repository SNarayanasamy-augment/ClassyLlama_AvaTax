<?php

namespace ClassyLlama\AvaTax\Model\Config\Source\Product;

use Magento\Catalog\Api\ProductAttributeRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

class Attributes implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @var ProductAttributeRepositoryInterface
     */
    protected $productAttributeRepository = null;

    /**
     * @var SearchCriteriaInterface
     */
    protected $searchCriteria = null;

    /**
     * @param ProductAttributeRepositoryInterface $productAttributeRepository
     * @param SearchCriteriaInterface $searchCriteria
     */
    public function __construct(
        ProductAttributeRepositoryInterface $productAttributeRepository,
        SearchCriteriaInterface $searchCriteria
    ) {
        $this->productAttributeRepository = $productAttributeRepository;
        $this->searchCriteria = $searchCriteria;
    }

    /**
     * @return array
     */
    public function toOptionArray()
    {
        $options = [
            ['value' => '', 'label' => __('No Attribute')],
        ];
        $attributes = $this->getAttributes();

        foreach ($attributes as $attribute) {
            if (in_array($attribute->getBackendType(), ['static', 'varchar', 'text']) && $attribute->getDefaultFrontendLabel()) {
                $options = array_merge($options, [['value' => $attribute->getAttributeCode(), 'label' => $attribute->getDefaultFrontendLabel()]]);
            }
        }

        return $options;
    }

    /**
     * Returns attributes
     *
     * @author Jonathan Hodges <jonathan@classyllama.com>
     * @return \Magento\Catalog\Api\Data\ProductAttributeInterface[]
     */
    protected function getAttributes()
    {
        return $this->productAttributeRepository->getList($this->searchCriteria)->getItems();
    }
}
