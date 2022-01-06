<?php
/**
 * Created by octatech
 * Date: 13/02/2021
 * Time: 21:07
 */
namespace App\ValueObjects\Core\Integers;

/**
 * Class BaseBigInteger
 * @package App\ValueObjects\Core\Integers
 */
abstract class BaseBigInteger extends BaseInteger implements BaseBigIntegerInterface
{
    const VALUE_OBJECT_TYPE = 'base_big_integer';

    const UNSIGNED = false;

    const MINIMUM_VALUE_SIGNED   = -9223372036854775808;
    const MAXIMUM_VALUE_SIGNED   = 9223372036854775807;
    const MINIMUM_VALUE_UNSIGNED = 0;
    const MAXIMUM_VALUE_UNSIGNED = 18446744073709551615;

    /**
     * @return mixed|string
     */
    public function bigInteger()
    {
        return $this->value();
    }
}
