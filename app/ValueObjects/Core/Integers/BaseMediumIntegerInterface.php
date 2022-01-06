<?php
/**
 * Created by octatech
 * Date: 13/02/2021
 * Time: 21:07
 */
namespace App\ValueObjects\Core\Integers;

use App\ValueObjects\Core\BaseValueObjectInterface;

/**
 * Interface BaseMediumIntegerInterface
 * @package App\ValueObjects\Core\Integers
 */
interface BaseMediumIntegerInterface extends BaseValueObjectInterface
{
    /**
     * mediumInteger
     *
     * @return mixed
     */
    public function mediumInteger();
}
