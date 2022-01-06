<?php
/**
 * @project Octashop admin
 *
 * @copyright Copyright (c) 2021. octatech (https://octatech.nl)
 */

namespace App\ViewDataProviders;

/**
 * Interface IViewDataProvider
 * @package App\ViewDataProviders
 */
interface IViewDataProvider
{
    /**
     * @return mixed
     */
    public function prepare();

    /**
     * @return mixed
     */
    public function generate();
}
