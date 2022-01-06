<?php
/**
 * Created by octatech
 * Date: 13/02/2021
 * Time: 21:07
 */
namespace App\ValueObjects\Core\Floats;

use App\ValueObjects\Core\BaseValueObject;

/**
 * Class BaseFloat
 *
 * @namespace App\ValueObjects\Core\Floats
 */
abstract class BaseFloat extends BaseValueObject implements BaseFloatInterface
{
    public const VALUE_OBJECT_TYPE = 'base_float';

    public const MINIMUM_VALUE = 1.175494e-38;
    public const MAXIMUM_VALUE = 3.402823e+38;

    public const DEFAULT_DECIMAL_POINT      = '.';
    public const OCTA_DECIMAL_POINT       = ',';
    public const DEFAULT_THOUSAND_SEPARATOR = ',';
    public const OCTA_THOUSAND_SEPARATOR  = '.';

    /**
     * @return mixed|string
     */
    public function float()
    {
        return $this->value();
    }

    /**
     * @param $value
     */
    protected function initValue($value): void
    {
        $this->value = null === $value ? 0.0 : (float) $value;
    }

    /**
     * @return bool
     */
    protected function validationExpression(): bool
    {
        return is_float($this->value);
    }

    /**
     * @param int $precision
     * @return string
     */
    public function getFormatted(int $precision = 2): string
    {
        $negation = ($this->value < 0) ? (-1) : 1;
        $coefficient = 10 ** $precision; //pow(10, $precision)
        $number = $negation * floor((string)(abs($this->value) * $coefficient)) / $coefficient;

        return number_format($number, $precision, static::OCTA_DECIMAL_POINT, static::OCTA_THOUSAND_SEPARATOR);
    }

    /**
     * @param int $precision
     * @return float
     */
    public function getRounded(int $precision = 2): float
    {
        return round($this->value, $precision);
    }
}
