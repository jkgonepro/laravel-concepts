<?php
/**
 * Created by octatech
 * Date: 13/02/2021
 * Time: 21:07
 */
namespace App\ValueObjects\Core\Integers;

use App\ValueObjects\Core\BaseValueObjectInterface;

/**
 * Interface BaseSmallIntegerInterface
 * @package App\ValueObjects\Core\Integers
 */
interface BaseSmallIntegerInterface extends BaseValueObjectInterface
{
    /**
     * smallInteger
     *
     * @return mixed
     */
    public function smallInteger();
}
