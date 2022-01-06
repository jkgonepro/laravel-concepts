<?php
/**
 * Created by octatech
 * Date: 13/02/2021
 * Time: 21:07
 */
namespace App\ValueObjects\Core\Strings;

/**
 * Class BaseNumber
 * @package App\ValueObjects\Core\Strings
 */
abstract class BaseNumber extends BaseString implements BaseNumberInterface
{
    const VALUE_OBJECT_TYPE = 'base number';

    /**
     * number
     *
     * @return string
     */
    public function number()
    {
        return $this->value();
    }

    /**
     * validationExpression
     *
     *
     * @return bool
     */
    protected function validationExpression()
    {
        return filter_var($this->value(), FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => "/^[a-zA-Z0-9]+$/")));
    }
}
