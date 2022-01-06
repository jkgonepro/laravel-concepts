<?php
/**
 * Created by octatech
 * Date: 13/02/2021
 * Time: 21:07
 */
namespace App\Http\Controllers\Admin;

use App\Entities\Statistic;
use App\Http\Controllers\BaseOctaController;
use App\Http\Controllers\IBaseOctaActions;
use App\Mediators\DashboardConcept;
use App\Repositories\StatisticRepository;
use App\ViewDataProviders\DashboardDataProvider;
use Doctrine\ORM\EntityManager;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Lucid\Foundation\ServesFeaturesTrait;

/**
 * Class DashboardController
 * @package App\Http\Controllers
 *
 * @property string          $viewGroup
 * @property string          $controllerLabelKey
 * @property EntityManager   $entityManager
 * @property string          $mainEntityClass
 * @property StatisticRepository $mainRepository
 *
 */
class DashboardController extends BaseOctaController implements IBaseOctaActions
{
    use ServesFeaturesTrait;

    /**
     * @var string $viewGroup
     */
    public $viewGroup = 'dashboard';

    /**
     * @var EntityManager $entityManager
     */
    private $entityManager;

    /**
     * @var string $mainEntityClass
     */
    private $mainEntityClass;

    /**
     * @var StatisticRepository $mainRepository
     */
    private $mainRepository;

    /**
     * StatisticController constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->entityManager   = $em;
        $this->mainEntityClass = Statistic::class;
        $this->mainRepository  = $em->getRepository($this->mainEntityClass);

        parent::__construct();
    }

    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $here     = __FUNCTION__;
        $provider = new DashboardDataProvider($this->mainRepository);
        $concept  = new DashboardConcept($provider->prepare());

        $this->setRequest($request)
            ->setViewName($here)
            ->setConcept($concept);

        return $this->generateConceptView();
    }

    public function show(Request $request, $id)
    {
        // TODO: Implement show() method.
        return $this->redirectWith('error', 'Not found', 'dashboard.index');
    }

    public function edit(Request $request, $id)
    {
        // TODO: Implement edit() method.
        return $this->redirectWith('error', 'Not found', 'dashboard.index');
    }

    public function delete(Request $request, $id)
    {
        // TODO: Implement delete() method.
        return $this->redirectWith('error', 'Not found', 'dashboard.index');
    }
}
