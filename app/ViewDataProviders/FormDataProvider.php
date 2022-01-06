<?php
/**
 * @project Octashop admin
 *
 * @copyright Copyright (c) 2021. octatech (https://octatech.nl)
 */

namespace App\ViewDataProviders;

use App\Entities\BaseEntity;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\URL;

/**
 * Class FormDataProvider
 * @package App\ViewDataProviders
 *
 * @property BaseEntity|null $entity
 * @property Collection providerItem
 */
abstract class FormDataProvider extends BaseViewDataProvider implements IFormDataProvider
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
