<?php
/**
 * Created by octatech
 * Date: 13/02/2021
 * Time: 21:07
 */
namespace App\ValueObjects\Core\Integers;

/**
 * Class BaseMediumInteger
 * @package App\ValueObjects\Core\Integers
 */
abstract class BaseMediumInteger extends BaseInteger implements BaseMediumIntegerInterface
{
    const VALUE_OBJECT_TYPE = 'base medium integer';
    const UNSIGNED = false;
    const MINIMUM_VALUE_SIGNED = -8388608;
    const MAXIMUM_VALUE_SIGNED = 8388607;
    const MINIMUM_VALUE_UNSIGNED = 0;
    const MAXIMUM_VALUE_UNSIGNED = 16777215;

    /**
     * mediumInteger
     *
     * @return mixed|string
     */
    public function mediumInteger()
    {
        return $this->value();
    }
}
