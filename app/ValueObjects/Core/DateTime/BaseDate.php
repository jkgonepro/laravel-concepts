<?php
/**
 * Created by octatech
 * Date: 13/02/2021
 * Time: 21:07
 */
namespace App\ValueObjects\Core\DateTime;

use DateTime;

/**
 * Class BaseDate
 * @package App\ValueObjects\Core\DateTime
 */
abstract class BaseDate extends BaseDateTime implements BaseDateInterface
{
    const VALUE_OBJECT_TYPE = 'base_date';
    const DEFAULT_FORMAT    = 'Y-m-d';
    const OCTA_FORMAT       = 'd-m-Y';

    /**
     * @return DateTime|string
     */
    public function date()
    {
        return $this->value();
    }
}
