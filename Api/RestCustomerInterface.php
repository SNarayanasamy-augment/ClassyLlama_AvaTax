<?php
/**
 * ClassyLlama_AvaTax
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * @copyright  Copyright (c) 2016 Avalara, Inc.
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

namespace ClassyLlama\AvaTax\Api;

use Magento\Framework\DataObject;

interface RestCustomerInterface extends RestInterface
{
    /**
     * Perform REST request to get companies associated with the account
     *
     * @param DataObject      $request
     * @param bool|null       $isProduction
     * @param string|int|null $scopeId
     * @param string          $scopeType
     *
     * @return DataObject[]
     * @throws \ClassyLlama\AvaTax\Exception\AvataxConnectionException
     */
    public function getCertificatesList(
        $request,
        $isProduction = null,
        $scopeId = null,
        $scopeType = \Magento\Store\Model\ScopeInterface::SCOPE_STORE
    );

    /**
     * Perform REST request to get oclet stream of certificate PDF
     *
     * @param DataObject      $request
     * @param bool|null       $isProduction
     * @param string|int|null $scopeId
     * @param string          $scopeType
     *
     * @return mixed
     */
    public function downloadCertificate(
        $request,
        $isProduction = null,
        $scopeId = null,
        $scopeType = \Magento\Store\Model\ScopeInterface::SCOPE_STORE
    );
}