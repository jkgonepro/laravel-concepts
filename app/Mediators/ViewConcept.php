<?php
/**
 * @project Octashop admin
 *
 * @copyright Copyright (c) 2021. octatech (https://octatech.nl)
 */

namespace App\Mediators;

use App\ViewDataProviders\BaseViewDataProvider;
use Illuminate\Support\Collection;

/**
 * Class ViewConcept
 * @package App\Mediators
 *
 * @property BaseViewDataProvider $viewDataProvider
 */
class ViewConcept implements IViewConcept
{
    /**
     * @var BaseViewDataProvider $viewDataProvider
     */
    private $viewDataProvider;

    /**
     * ViewConcept constructor.
     * @param BaseViewDataProvider $viewDataProvider
     */
    public function __construct(BaseViewDataProvider $viewDataProvider)
    {
        $this->viewDataProvider = $viewDataProvider;
        $this->viewDataProvider->setMediator($this);
    }

    /**
     * @return $this
     */
    public function provide(): self
    {
        $this->viewDataProvider->prepare();

        return $this;
    }

    /**
     * @return Collection
     */
    public function loadData(): Collection
    {
        return $this->viewDataProvider->generate();
    }
}
