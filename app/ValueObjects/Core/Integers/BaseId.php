<?php
/**
 * Created by octatech
 * Date: 13/02/2021
 * Time: 21:07
 */
namespace App\ValueObjects\Core\Integers;

/**
 * Class BaseId
 * @package App\ValueObjects\Core\Integers
 */
abstract class BaseId extends BaseInteger implements BaseIdInterface
{
    const VALUE_OBJECT_TYPE = 'base_id';

    const UNSIGNED = true;

    /**
     * @return int|string
     */
    public function id()
    {
        return $this->value();
    }
}
