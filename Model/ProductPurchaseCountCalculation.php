<?php
/**
 * Copyright (c) 2024 Attila Sagi
 * @license http://www.opensource.org/licenses/mit-license.html  MIT License
 */

declare(strict_types=1);

namespace Space\ProductPurchaseCountGraphQl\Model;

use Space\ProductPurchaseCount\Model\Service\PurchaseCalculation;
use Space\ProductPurchaseCount\Api\Data\ProductPurchaseCountInterface;

class ProductPurchaseCountCalculation
{
    /**
     * @var PurchaseCalculation
     */
    private PurchaseCalculation $purchaseCalculation;

    /**
     * Constructor
     *
     * @param PurchaseCalculation $purchaseCalculation
     */
    public function __construct(
        PurchaseCalculation $purchaseCalculation
    ) {
        $this->purchaseCalculation = $purchaseCalculation;
    }

    /**
     * Calculate purchase count
     *
     * @param int $productId
     * @return array
     */
    public function calculatePurchaseCount(int $productId): array
    {
        $productPurchaseCount = $this->purchaseCalculation->getPurchaseCount($productId);

        return [
            ProductPurchaseCountInterface::COUNT => $productPurchaseCount->getCount(),
            ProductPurchaseCountInterface::NOTIFICATION_TEXT => $productPurchaseCount->getNotificationText()
        ];
    }
}
