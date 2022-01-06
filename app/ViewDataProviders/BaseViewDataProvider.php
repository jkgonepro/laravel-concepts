<?php
/**
 * @project Octashop admin
 *
 * @copyright Copyright (c) 2021. octatech (https://octatech.nl)
 */

namespace App\ViewDataProviders;

use App\Mediators\ViewConcept;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\ClassMetadata;

/**
 * Class BaseViewDataProvider
 * @package App\ViewComponents
 *
 * @property ViewConcept   $concept
 * @property EntityManager $em
 * @property ClassMetadata $class
 */
abstract class BaseViewDataProvider implements IViewDataProvider
{
    /**
     * @var ViewConcept|null
     */
    protected $concept;

    /**
     * @var EntityManager $em
     */
    protected $em;

    /**
     * @var ClassMetadata $class
     */
    protected $class;

    /**
     * BaseViewComponent constructor.
     * @param ViewConcept|null $concept
     */
    public function __construct(ViewConcept $concept = null)
    {
        $this->concept = $concept;

        $this->em    = null;
        $this->class = null;
    }

    /**
     * @param ViewConcept $concept
     */
    public function setMediator(ViewConcept $concept): void
    {
        $this->concept = $concept;
    }
}
