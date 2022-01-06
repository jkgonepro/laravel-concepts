<?php
/**
 * Created by octatech
 * Date: 13/02/2021
 * Time: 21:07
 */
namespace App\ValueObjects\Core\Floats;

/**
 * Class BasePercentage
 * @package App\ValueObjects\Core\Floats
 */
abstract class BasePercentage extends BaseFloat implements BasePercentageInterface
{
    const VALUE_OBJECT_TYPE = 'base percentage';
    const PERCENT_SIGN = "%";

    /**
     * percentage
     *
     * @return float
     */
    public function percentage()
    {
        return $this->value();
    }

    /**
     * getFraction
     *
     * @return float
     */
    public function getFraction()
    {
        return $this->value() / 100;
    }

    /**
     * getFormattedWithSign
     *
     * @param int $precision
     *
     * @return string
     */
    public function getFormattedWithSign(int $precision = 2)
    {
        return $this->getFormatted($precision) . ' ' . static::PERCENT_SIGN;
    }
}
