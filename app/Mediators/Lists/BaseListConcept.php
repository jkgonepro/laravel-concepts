<?php
/**
 * @project Octashop admin
 *
 * @copyright Copyright (c) 2021. octatech (https://octatech.nl)
 */

namespace App\Mediators\Lists;

use App\Mediators\ViewConcept;
use App\ViewDataProviders\BaseViewDataProvider;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class BaseListConcept
 * @package App\Mediators\Lists
 */
class BaseListConcept extends ViewConcept
{
    /**
     * ViewConcept constructor.
     * @param BaseViewDataProvider $viewDataProvider
     */
    public function __construct(BaseViewDataProvider $viewDataProvider)
    {
        $this->viewDataProvider = $viewDataProvider;
        parent::__construct($viewDataProvider);
    }

    /**
     * @return LengthAwarePaginator
     */
    public function loadPaginator(): ?LengthAwarePaginator
    {
        return $this->viewDataProvider instanceof BaseViewDataProvider
            ? $this->viewDataProvider->paginator()
            : null;
    }
}
