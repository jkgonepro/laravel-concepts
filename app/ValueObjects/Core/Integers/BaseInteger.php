<?php
/**
 * Created by octatech
 * Date: 13/02/2021
 * Time: 21:07
 */
namespace App\ValueObjects\Core\Integers;

use App\ValueObjects\Core\BaseValueObject;

/**
 * Class BaseInteger
 * @package App\ValueObjects\Core\Integers
 */
abstract class BaseInteger extends BaseValueObject implements BaseIntegerInterface
{
    const VALUE_OBJECT_TYPE = 'base integer';
    const UNSIGNED = false;
    const MINIMUM_VALUE_SIGNED = -2147483648;
    const MAXIMUM_VALUE_SIGNED = 2147483647;
    const MINIMUM_VALUE_UNSIGNED = 0;
    const MAXIMUM_VALUE_UNSIGNED = 4294967295;

    /**
     * integer
     *
     * @return string
     */
    public function integer()
    {
        return $this->value();
    }

    /**
     * initValue
     *
     * @param $value
     */
    protected function initValue($value)
    {
        $this->value = null === $value ? 0 : (int) $value;
    }

    /**
     * validationExpression
     *
     * @return bool
     */
    protected function validationExpression()
    {
        return is_integer($this->value) && (static::UNSIGNED) ?
            ($this->value >= static::MINIMUM_VALUE_UNSIGNED && $this->value <= static::MAXIMUM_VALUE_UNSIGNED) :
            ($this->value >= static::MINIMUM_VALUE_SIGNED && $this->value <= static::MAXIMUM_VALUE_SIGNED);
    }
}
