<?php
/**
 * Created by octatech
 * Date: 13/02/2021
 * Time: 21:07
 */
namespace App\ValueObjects\Core\Strings;

use App\ValueObjects\Core\BaseValueObjectInterface;

/**
 * Interface BaseNumberInterface
 * @package App\ValueObjects\Core\Strings
 */
interface BaseNumberInterface extends BaseValueObjectInterface
{
    /**
     * @return mixed
     */
    public function number();
}
