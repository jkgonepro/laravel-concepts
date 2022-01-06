<?php
/**
 * Created by octatech
 * Date: 13/02/2021
 * Time: 21:07
 */
namespace App\ValueObjects\Core\Integers;

/**
 * Class DataRecordsOffset
 * @package App\ValueObjects\Core\Integers
 */
class DataRecordsOffset extends BaseInteger
{
    const VALUE_OBJECT_TYPE = 'data records offset';
    /**
     * equals
     *
     * @param DataRecordsOffset $offset
     *
     * @return bool
     */
    public function equals(DataRecordsOffset $offset)
    {
        return $this->integer() === $offset->integer();
    }

    /**
     * validationExpression
     *
     * @return bool
     */
    protected function validationExpression()
    {
        // TODO: Implement validation mechanism
        return true;
    }
}
