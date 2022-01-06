<?php
/**
 * @project Octashop admin
 *
 * @copyright Copyright (c) 2021. octatech (https://octatech.nl)
 */

namespace App\ViewDataProviders;

/**
 * Interface IItemDataProvider
 * @package App\ViewDataProviders
 */
interface IItemDataProvider
{
    public function readItemBy();
}
