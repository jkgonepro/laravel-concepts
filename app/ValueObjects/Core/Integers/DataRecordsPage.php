<?php
/**
 * Created by octatech
 * Date: 13/02/2021
 * Time: 21:07
 */
namespace App\ValueObjects\Core\Integers;

/**
 * Class DataRecordsPage
 * @package App\ValueObjects\Core\Integers
 */
class DataRecordsPage extends BaseInteger
{
    const VALUE_OBJECT_TYPE = 'data records page';
    /**
     * equals
     *
     * @param DataRecordsPage $page
     *
     * @return bool
     */
    public function equals(DataRecordsPage $page)
    {
        return $this->integer() === $page->integer();
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
