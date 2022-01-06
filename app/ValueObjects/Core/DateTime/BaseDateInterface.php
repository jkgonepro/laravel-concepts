<?php
/**
 * Created by octatech
 * Date: 13/02/2021
 * Time: 21:07
 */
namespace App\ValueObjects\Core\DateTime;

use DateTime;
use App\ValueObjects\Core\BaseValueObjectInterface;

/**
 * Interface BaseDateInterface
 * @package App\ValueObjects\Core\DateTime
 */
interface BaseDateInterface extends BaseValueObjectInterface
{
    /**
     * date
     *
     * @return DateTime
     */
    public function date();
}
