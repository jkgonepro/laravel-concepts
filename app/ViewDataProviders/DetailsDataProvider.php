<?php
/**
 * @project Octashop admin
 *
 * @copyright Copyright (c) 2021. octatech (https://octatech.nl)
 */

namespace App\ViewDataProviders;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\URL;

/**
 * Class DetailsDataProvider
 * @package App\ViewDataProviders
 *
 * @property Collection providerItem
 */
abstract class DetailsDataProvider extends BaseViewDataProvider implements IFormDataProvider
{
    use TEntityDataProvider;

    /**
     * @var Collection $providerItem
     */
    protected $providerItem;

    /**
     *
     */
    public function __construct()
    {
        parent::__construct();
        $this->providerItem   = collect([]);

        $this->providerItem->put('active', false);
        $this->providerItem->put('isNew', true);

        $this->providerItem->put('name', '???');
        $this->providerItem->put('description', '???');
        $this->providerItem->put('currency', 'PLN');
    }
}
