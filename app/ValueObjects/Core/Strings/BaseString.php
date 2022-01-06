<?php
/**
 * Created by octatech
 * Date: 13/02/2021
 * Time: 21:07
 */
namespace App\ValueObjects\Core\Strings;

use App\ValueObjects\Core\BaseValueObject;

/**
 * Class BaseString
 * @package App\ValueObjects\Core\Strings
 */
abstract class BaseString extends BaseValueObject implements BaseStringInterface
{
    const VALUE_OBJECT_TYPE = 'base string';

    /**
     * string
     *
     * @return string
     */
    public function string()
    {
        return $this->value();
    }

    /**
     * validationExpression
     *
     * @return bool
     */
    protected function validationExpression()
    {
        return is_string($this->value);
    }
}
