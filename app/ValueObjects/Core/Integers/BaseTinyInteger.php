<?php
/**
 * Created by octatech
 * Date: 13/02/2021
 * Time: 21:07
 */
namespace App\ValueObjects\Core\Integers;

/**
 * Class BaseTinyInteger
 * @package App\ValueObjects\Core\Integers
 */
abstract class BaseTinyInteger extends BaseInteger implements BaseSmallIntegerInterface
{
    const VALUE_OBJECT_TYPE = 'base tiny integer';
    const UNSIGNED = false;
    const MINIMUM_VALUE_SIGNED = -128;
    const MAXIMUM_VALUE_SIGNED = 127;
    const MINIMUM_VALUE_UNSIGNED = 0;
    const MAXIMUM_VALUE_UNSIGNED = 255;

    /**
     * tinyInteger
     *
     * @return string
     */
    public function tinyInteger()
    {
        return $this->value();
    }
}
