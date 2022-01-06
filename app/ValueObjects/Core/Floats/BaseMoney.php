<?php
/**
 * Created by octatech
 * Date: 13/02/2021
 * Time: 21:07
 */
namespace App\ValueObjects\Core\Floats;

/**
 * Class BaseMoney
 * @package App\ValueObjects\Core\Floats
 */
abstract class BaseMoney extends BaseFloat implements BaseMoneyInterface
{
    const VALUE_OBJECT_TYPE = 'base money';
    const CURRENCY = "€";

    /**
     * money
     *
     * @return float
     */
    public function money()
    {
        return $this->value();
    }

    /**
     * getFormattedWithCurrency
     *
     * @param int $precision
     *
     * @return string
     */
    public function getFormattedWithCurrency(int $precision = 2)
    {
        return static::CURRENCY . ' ' . $this->getFormatted($precision);
    }
}
