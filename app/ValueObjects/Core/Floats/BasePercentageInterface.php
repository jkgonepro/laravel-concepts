<?php
/**
 * Created by octatech
 * Date: 13/02/2021
 * Time: 21:07
 */
namespace App\ValueObjects\Core\Floats;

use App\ValueObjects\Core\BaseValueObjectInterface;

/**
 * Interface BasePercentageInterface
 * @package App\ValueObjects\Core\Floats
 */
interface BasePercentageInterface extends BaseValueObjectInterface
{
    /**
     * percentage
     *
     * @return float
     */
    public function percentage();
}


