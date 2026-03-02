<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\MerchantRelationRequestWidget\Widget;

use Spryker\Yves\Kernel\Widget\AbstractWidget;

/**
 * @method \SprykerShop\Yves\MerchantRelationRequestWidget\MerchantRelationRequestWidgetFactory getFactory()
 */
class MerchantRelationRequestMenuItemWidget extends AbstractWidget
{
    /**
     * @var string
     */
    protected const PARAMETER_IS_VISIBLE = 'isVisible';

    /**
     * @var string
     */
    protected const PARAMETER_IS_ACTIVE_PAGE = 'isActivePage';

    /**
     * @var string
     */
    protected const PAGE_KEY_MERCHANT_RELATION_REQUEST = 'merchantRelationRequest';

    public function __construct(string $activePage)
    {
        $this->addIsVisibleParameter();
        $this->addIsActivePageParameter($activePage);
    }

    public static function getName(): string
    {
        return 'MerchantRelationRequestMenuItemWidget';
    }

    public static function getTemplate(): string
    {
        return '@MerchantRelationRequestWidget/views/merchant-relation-request-menu-item/merchant-relation-request-menu-item.twig';
    }

    protected function addIsVisibleParameter(): void
    {
        $this->addParameter(static::PARAMETER_IS_VISIBLE, $this->isWidgetVisible());
    }

    protected function addIsActivePageParameter(string $activePage): void
    {
        $this->addParameter(static::PARAMETER_IS_ACTIVE_PAGE, $this->isMerchantRelationRequestPageActive($activePage));
    }

    protected function isMerchantRelationRequestPageActive(string $activePage): bool
    {
        return $activePage === static::PAGE_KEY_MERCHANT_RELATION_REQUEST;
    }

    protected function isWidgetVisible(): bool
    {
        return (bool)$this->getFactory()->getCompanyUserClient()->findCompanyUser();
    }
}
