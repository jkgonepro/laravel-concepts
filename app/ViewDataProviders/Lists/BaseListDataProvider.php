<?php
/**
 * @project Octashop admin
 *
 * @copyright Copyright (c) 2021. octatech (https://octatech.nl)
 */

namespace App\ViewDataProviders\Lists;

use App\Repositories\BaseEntityRepository;
use App\Repositories\BaseRepository;
use App\Repositories\CategoryRepository;
use App\ViewDataProviders\BaseViewDataProvider;
use App\ViewDataProviders\IListDataProvider;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

/**
 * Class ListDataProvider
 * @package App\ViewDataProviders
 *
 * @property CategoryRepository   $listRepository
 * @property LengthAwarePaginator $dataPaginator
 * @property Collection           $providerItems
 */
abstract class BaseListDataProvider extends BaseViewDataProvider implements IListDataProvider
{
    /**
     * @var CategoryRepository $listRepository
     */
    private $listRepository;

    /**
     * @var LengthAwarePaginator $dataPaginator
     */
    private $dataPaginator;

    /**
     * @var Collection $providerItems
     */
    private $providerItems;

    /**
     * BaseListDataProvider constructor.
     * @param BaseEntityRepository $listRepository
     */
    public function __construct(BaseEntityRepository $listRepository)
    {
        $this->listRepository = $listRepository;
        $this->providerItems  = collect([]);

        parent::__construct();
    }

    /**
     * @return LengthAwarePaginator
     */
    public function paginator(): LengthAwarePaginator
    {
        return $this->dataPaginator;
    }
}
