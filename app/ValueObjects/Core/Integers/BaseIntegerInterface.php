<?php
/**
 * Created by octatech
 * Date: 13/02/2021
 * Time: 21:07
 */
namespace App\ValueObjects\Core\Integers;

use App\ValueObjects\Core\BaseValueObjectInterface;

/**
 * Interface BaseIntegerInterface
 * @package App\ValueObjects\Core\Integers
 */
interface BaseIntegerInterface extends BaseValueObjectInterface
{
    /**
     * value
     *
     * @return int
     */
    public function integer();
}
