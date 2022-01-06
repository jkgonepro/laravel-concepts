<?php
/**
 * Created by octatech
 * Date: 13/02/2021
 * Time: 21:07
 */
namespace App\ValueObjects;

use App\Utilities\CurrencyHelper;
use App\ValueObjects\Core\Floats\BaseFloat;
use Illuminate\Support\Facades\Log; // TODO: use better logging

/**
 * Class Amount
 * @package App\ValueObjects
 */
class Price extends BaseFloat
{
    public const OCTA_THOUSAND_SEPARATOR  = ' '; // space

    /**
     * @return string
     */
    public function getValueWithCurrency(): string
    {
        /** @var CurrencyHelper $helper */
        $helper = app()->get(CurrencyHelper::class);
        if($helper instanceof CurrencyHelper){
            return $helper->generatePriceWithCurrency($this->getFormatted(2));
        }

        Log::error(CurrencyHelper::class . ' not registered as singleton. Cannot format amount');
        return $this->getRounded(2);
    }
}
