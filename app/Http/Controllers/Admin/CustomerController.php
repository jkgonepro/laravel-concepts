<?php
/**
 * Created by octatech
 * Date: 13/02/2021
 * Time: 21:07
 */
namespace App\Http\Controllers\Admin;

use App\Entities\Customer;
use App\Exceptions\OEntityException;
use App\Http\Controllers\BaseOctaController;
use App\Http\Controllers\IBaseOctaActions;
use App\Lucid\Features\Customer\PrepareDataForCustomerItemFromRequestFeature;
use App\Lucid\Features\Customer\StoreCustomerEntityFromRequestFeature;
use App\Mediators\Details\CustomerDetailsConcept;
use App\Mediators\Forms\CustomerFormConcept;
use App\Mediators\Lists\CustomerListConcept;
use App\Repositories\CustomerRepository;
use App\ViewDataProviders\Details\CustomerDetailsDataProvider;
use App\ViewDataProviders\Forms\CustomerFormDataProvider;
use App\ViewDataProviders\Lists\CustomerListDataProvider;
use Doctrine\ORM\EntityManager;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Lucid\Foundation\ServesFeaturesTrait;

/**
 * Class CustomerController
 * @package App\Http\Controllers\Admin
 *
 * @property string          $viewGroup
 * @property string          $controllerLabelKey
 * @property EntityManager   $entityManager
 * @property string          $mainEntityClass
 * @property CustomerRepository $mainRepository
 */
class CustomerController extends BaseOctaController implements IBaseOctaActions
{
    use ServesFeaturesTrait;

    /**
     * @var string $viewGroup
     */
    public $viewGroup = 'customer';

    /**
     * @var string $controllerLabelKey
     */
    public $controllerLabelKey = 'customers';

    /**
     * @var EntityManager $entityManager
     */
    private $entityManager;

    /**
     * @var string $mainEntityClass
     */
    private $mainEntityClass;

    /**
     * @var CustomerRepository $mainRepository
     */
    private $mainRepository;

    /**
     * CustomerController constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->entityManager   = $em;
        $this->mainEntityClass = Customer::class;
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
        $provider = new CustomerListDataProvider($this->mainRepository);
        $concept  = new CustomerListConcept($provider->prepare());

        $this->setRequest($request)
            ->setViewName($here)
            ->setConcept($concept);

        return $this->generateConceptView();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function create(Request $request)
    {
        $here     = __FUNCTION__;
        $provider = new CustomerFormDataProvider($this->mainRepository);
        $concept  = new CustomerFormConcept($provider->prepare());

        $this->setRequest($request)
            ->setViewName($here)
            ->setConcept($concept);

        $this->setPageTitle($this->generateViewGroupTitle($here));
        return $this->generateConceptView();
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function show(Request $request, $id)
    {
        $here     = __FUNCTION__;
        $provider = new CustomerDetailsDataProvider($this->mainRepository);
        $concept  = new CustomerDetailsConcept($provider->prepare($id));

        $this->redirectMainIfNotInstance(
            $provider->getDataEntity(),
            $this->mainEntityClass
        );

        $this->setPageTitle($this->generateViewGroupTitle($here));
        $this->setRequest($request)
            ->setViewName($here)
            ->setConcept($concept);

        $this->setPageTitle($this->generateViewGroupTitle($here, $concept->loadData()->get('fullName')));
        return $this->generateConceptView();
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function edit(Request $request, $id)
    {
        $here     = __FUNCTION__;
        $provider = new CustomerFormDataProvider($this->mainRepository);
        $concept  = new CustomerFormConcept($provider->prepare($id));

        $this->redirectMainIfNotInstance(
            $provider->getDataEntity(),
            $this->mainEntityClass
        );

        $this->setRequest($request)
            ->setViewName($here)
            ->setConcept($concept);

        $this->setPageTitle($this->generateViewGroupTitle($here, $concept->loadData()->get('fullName')));
        return $this->generateConceptView();
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function delete(Request $request, $id)
    {
        // TODO: Implement delete() method.
        return $this->redirectWith('error', __('messages.not-found'));
    }

    /**
     * @param Request $request
     * @param null $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, $id = null) // todo: CustomerStoreRequest
    : \Illuminate\Http\RedirectResponse
    {
        // TODO: Implement delete() method.
        return $this->redirectWith('error', __('messages.not-found'));
    }
}
