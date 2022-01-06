<?php
/**
 * Created by octatech
 * Date: 13/02/2021
 * Time: 21:07
 */
namespace App\ValueObjects\Core\Integers;

/**
 * Class BaseSmallInteger
 * @package App\ValueObjects\Core\Integers
 */
abstract class BaseSmallInteger extends BaseInteger implements BaseSmallIntegerInterface
{
    const VALUE_OBJECT_TYPE = 'base small integer';
    const UNSIGNED = false;
    const MINIMUM_VALUE_SIGNED = -32768;
    const MAXIMUM_VALUE_SIGNED = 32767;
    const MINIMUM_VALUE_UNSIGNED = 0;
    const MAXIMUM_VALUE_UNSIGNED = 65535;

    /**
     * smallInteger
     *
     * @return string
     */
    public function smallInteger()
    {
        return $this->value();
    }
}
