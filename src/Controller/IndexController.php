<?php
namespace Agere\Autocomplete\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Agere\Core\Service\ServiceManagerAwareTrait;
use Agere\Core\Controller\DeleteActionAwareTrait;
use Agere\Autocomplete\Model\Autocomplete;
use Zend\View\Model\JsonModel;

class IndexController extends AbstractActionController
{
    use ServiceManagerAwareTrait;
    use DeleteActionAwareTrait;

    public function indexAction()
    {
        $sm = $this->getServiceManager();
        /** @var  \Agere\Autocomplete\Service\AutocompleteService $autocomplete */
        $autocomplete = $this->getService()->getRepository()->getValues();
        /** @var \Agere\Order\Block\Grid\OrderGrid $autocompleteGrid */
        $autocompleteGrid = $sm->get('AutocompleteGrid');
        $autocompleteDataGrid = $autocompleteGrid->getDataGrid();
        $autocompleteDataGrid->setDataSource($autocomplete);
        $autocompleteDataGrid->render();
        $autocompleteDataGridVm = $autocompleteDataGrid->getResponse();

        return $autocompleteDataGridVm;
    }

    public function generateAction() {
        $autocompleteValues = $this->getService()->getRepository()->getValues()->getQuery()->getResult();

        foreach ($autocompleteValues as $value) {
            $data [] = $value->getValue();
        }

        return new JsonModel($data);
    }

    /**
     * @return OrderService
     */
    public function getService()
    {
        return $this->getServiceManager()->get('AutocompleteService');
    }
    
}
