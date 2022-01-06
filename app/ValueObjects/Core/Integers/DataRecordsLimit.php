<?php
/**
 * Created by octatech
 * Date: 13/02/2021
 * Time: 21:07
 */
namespace App\ValueObjects\Core\Integers;

/**
 * Class DataRecordsLimit
 * @package App\ValueObjects\Core\Integers
 */
class DataRecordsLimit extends BaseInteger
{
    const VALUE_OBJECT_TYPE = 'data records limit';
    /**
     * equals
     *
     * @param DataRecordsLimit $limit
     *
     * @return bool
     */
    public function equals(DataRecordsLimit $limit)
    {
        return $this->integer() === $limit->integer();
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
