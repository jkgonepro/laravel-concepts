<?php
/**
 * @project Octashop admin
 *
 * @copyright Copyright (c) 2021. octatech (https://octatech.nl)
 */

namespace App\ViewDataProviders;

/**
 * Interface IFormDataProvider
 * @package App\ViewDataProviders
 */
interface IFormDataProvider
{
    public function readEntityBy();
}
