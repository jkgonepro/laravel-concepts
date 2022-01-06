<?php
/**
 * @project Octashop admin
 *
 * @copyright Copyright (c) 2021. octatech (https://octatech.nl)
 */

namespace App\Mediators;

/**
 * Class BaseViewConcept
 * @package App\Mediators
 */
class BaseViewConcept
{
    /**
     * @var BaseViewConcept|null
     */
    protected $concept;

    /**
     * EntityConcept constructor.
     * @param BaseViewConcept|null $concept
     */
    public function __construct(BaseViewConcept $concept = null)
    {
        $this->concept = $concept;
    }

    /**
     * @param BaseViewConcept $concept
     */
    public function setMediator(BaseViewConcept $concept): void
    {
        $this->concept = $concept;
    }
}
