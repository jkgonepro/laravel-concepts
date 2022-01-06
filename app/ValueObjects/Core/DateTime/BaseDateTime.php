<?php
/**
 * Created by octatech
 * Date: 13/02/2021
 * Time: 21:07
 */
namespace App\ValueObjects\Core\DateTime;

use DateTime;
use App\ValueObjects\Core\BaseValueObject;

/**
 * Class BaseDateTime
 * @package App\ValueObjects\Core\DateTime
 */
abstract class BaseDateTime extends BaseValueObject implements BaseDateTimeInterface
{
    const VALUE_OBJECT_TYPE = 'base date time';
    const DEFAULT_FORMAT = 'Y-m-d H:i:s';
    const OCTA_FORMAT = 'd-m-Y H:i:s';

    /**
     * dateTime
     *
     * @return DateTime|string
     */
    public function dateTime()
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
        $this->value = ($value instanceof DateTime) ? $value : DateTime::createFromFormat(static::DEFAULT_FORMAT, $value);
    }

    /**
     * validationExpression
     *
     * @return bool
     */
    protected function validationExpression()
    {
        if ($this->value instanceof DateTime) {
            return true;
        }

        return false;
    }

    /**
     * getFormatted
     */
    public function getFormatted()
    {
        return $this->value->format(static::OCTA_FORMAT);
    }
}
