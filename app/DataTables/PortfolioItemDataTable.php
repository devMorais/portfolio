<?php

namespace App\DataTables;

use App\Models\Category;
use App\Models\PortfolioItem;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PortfolioItemDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('image', function ($query) {
                return '<img style="width:70px" src="' . asset($query->image) . '"></img>';
            })
            ->addColumn('created_at', function ($query) {
                return date('d-m-Y', strtotime($query->created_at));
            })
            ->addColumn('category', function ($query) {
                if ($query->category) {
                    return $query->category->name;
                }
                return 'Sem categoria'; // ou qualquer outro valor que faça sentido
            })
            ->addColumn('action', function ($query) {
                return '<a href="' . route('admin.portfolio-item.edit', $query->id) . '" class="btn btn-primary btn-small"><i class="fas fa-edit"></i></a>
                        <a href="' . route('admin.portfolio-item.destroy', $query->id) . '" class="delete-item btn btn-danger btn-small"><i class="fas fa-trash"></i></a>';
            })
            ->rawColumns(['image', 'action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PortfolioItem $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('portfolioitem-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0)
            ->selectStyleSingle()
            ->pageLength(5) // Define o número de registros por página
            ->lengthChange(false) // Desabilita o seletor de "entries per page"
            ->language([
                'sProcessing' => 'Processando...',
                'sZeroRecords' => 'Nenhum registro encontrado',
                'sInfo' => 'Mostrando de _START_ até _END_ de _TOTAL_ entradas',
                'sInfoEmpty' => 'Mostrando 0 até 0 de 0 entradas',
                'sInfoFiltered' => '(filtrado de _MAX_ entradas totais)',
                'sSearch' => 'Pesquisar:',
                'sEmptyTable' => 'Nenhum dado disponível na tabela',
                'sLoadingRecords' => 'Carregando...',
                'sFirst' => 'Primeiro',
                'sLast' => 'Último',
                'sNext' => 'Próximo',
                'sPrevious' => 'Anterior',
                'oPaginate' => [
                    'sFirst' => 'Primeiro',
                    'sLast' => 'Último',
                    'sNext' => 'Próximo',
                    'sPrevious' => 'Anterior',
                ],
                'oAria' => [
                    'sSortAscending' => ': Ative para ordenar a coluna de forma ascendente',
                    'sSortDescending' => ': Ative para ordenar a coluna de forma descendente',
                ],
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')->width(100)->title('ID'),
            Column::make('image')->width(100)->title('Imagem'),
            Column::make('title')->title('Título'),
            Column::make('category')->title('Categoria'),
            Column::make('created_at')->title('Criado em'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(200)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'PortfolioItem_' . date('YmdHis');
    }
}
