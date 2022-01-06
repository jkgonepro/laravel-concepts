<?php
/**
 * Created by octatech
 * Date: 13/02/2021
 * Time: 21:07
 */
namespace App\ValueObjects\Core\Floats;

use App\ValueObjects\Core\BaseValueObjectInterface;

/**
 * Interface BaseFloatInterface
 * @package App\ValueObjects\Core\Floats
 */
interface BaseFloatInterface extends BaseValueObjectInterface
{
    /**
     * float
     *
     * @return mixed
     */
    public function float();
}
