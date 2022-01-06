<?php
/**
 * Created by octatech
 * Date: 13/02/2021
 * Time: 21:07
 */
namespace App\ValueObjects\Core\Floats;

use App\ValueObjects\Core\BaseValueObjectInterface;

/**
 * Interface BaseMoneyInterface
 * @package App\ValueObjects\Core\Floats
 */
interface BaseMoneyInterface extends BaseValueObjectInterface
{
    /**
     * money
     *
     * @return float
     */
    public function money();
}


