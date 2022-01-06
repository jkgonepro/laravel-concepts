<?php
/**
 * @project Octashop admin
 *
 * @copyright Copyright (c) 2021. octatech (https://octatech.nl)
 */

namespace App\ViewDataProviders;

use App\Entities\BaseEntity;

/**
 * Trait TEntityDataProvider
 * @package App\ViewDataProviders
 *
 * @property BaseEntity|null $dataEntity
 */
trait TEntityDataProvider
{
    /**
     * @return BaseEntity|null
     */
    public function getDataEntity(): ?BaseEntity
    {
        return $this->dataEntity;
    }
}
