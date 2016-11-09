<?php
/**
 * @package AutocompleteGrid.php
 * @author Vlad Kozak <vk@agere.com.ua>
 * @datetime: 01.11.2016 16:31
 */

namespace Agere\Autocomplete\Block\Grid;

use DoctrineModule\Persistence\ProvidesObjectManager;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use ZfcDatagrid\Column;
use ZfcDatagrid\Column\Style;
use ZfcDatagrid\Column\Type;
use ZfcDatagrid\Action;
use Agere\ZfcDataGrid\Block\AbstractGrid;

class AutocompleteGrid extends AbstractGrid implements ObjectManagerAwareInterface
{
    use ProvidesObjectManager;

    protected $createButtonTitle = '+';

    //  protected $createButtonTitle = 'Добавить';
    protected $backButtonTitle = '';

    public function init()
    {
        $grid = $this->getDataGrid();
        $grid->setId('autocomplete');
        $grid->setTitle('Значение ');
        $grid->setRendererName('jqGrid');
        $colId = $this->add(
            [
                'name' => 'Select',
                'construct' => ['id', 'autocomplete'],
                'identity' => true,
            ]
        )->getDataGrid()->getColumnByUniqueId('autocomplete_id')
        ;
        $this->add(
            [
                'name' => 'Select',
                'construct' => ['value', 'autocomplete'],
                'label' => 'Значение',
                'translation_enabled' => true,
                'width' => 2,
                'formatters' => [
                    [
                        'name' => 'Link',
                        'link' => ['href' => '/autocomplete/edit', 'placeholder_column' => $colId] // special config
                    ],
                ],
            ]
        );

        return $grid;
    }

    public function initToolbar()
    {
        $grid = $this->getDataGrid();
        $toolbar = $this->getToolbar();
        $route = $this->getRouteMatch();

        //$grid->getResponse()->setVariable('exportRenderers', ['PHPExcel' => 'Excel']);
        return $toolbar;
    }
}