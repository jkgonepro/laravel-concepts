<?php
/**
 * Created by octatech
 * Date: 13/02/2021
 * Time: 21:07
 */
namespace App\ValueObjects\Core;

/**
 * Class BaseValueObject
 * @package App\ValueObjects\Core
 */
abstract class BaseValueObject implements BaseValueObjectInterface
{
    const VALUE_OBJECT_TYPE = 'base_value_object';
    /**
     * @var mixed $value
     */
    protected $value;

    /**
     * BaseId constructor.
     *
     * @param string $value
     */
    public function __construct($value = null)
    {
        $this->initValue($value);
        $this->validate();
    }

    /**
     * __toString
     *
     * @return string
     */
    public function __toString()
    {
        return sprintf('%s', $this->value);
    }

    /**
     * validate
     *
     */
    protected function validate()
    {
        if (!$this->validationExpression()) {
            throw new \InvalidArgumentException('Value is not suitable as '.static::VALUE_OBJECT_TYPE.'.');
        }
    }

    /**
     * value
     *
     * @return string
     */
    protected function value()
    {
        return $this->value;
    }

    /**
     * validationExpression
     *
     * @return bool
     */
    protected function validationExpression()
    {
        return false;
    }

    /**
     * initValue
     *
     * @param $value
     */
    protected function initValue($value)
    {
        $this->value = null === $value ? '' : (string)$value;
    }
}
