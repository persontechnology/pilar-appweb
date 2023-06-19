<?php

namespace App\DataTables;

use App\Models\Registro;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class RegistroDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function($r){
                return view('registro.action',['r'=>$r])->render();
            })
            ->addColumn('tipo',function($r){
                return $r->ubicacion->tipo->nombre;
            })
            ->editColumn('ubicacion_id',function($r){
                return $r->ubicacion->nombre;
            })
            ->editColumn('created_at',function($r){
                return $r->created_at;
            })
            // tipo ubicacion_id
            ->filterColumn('tipo', function($query, $keyword) {
                $query->whereHas('ubicacion', function($query) use ($keyword) {
                    $query->whereHas('tipo', function($query) use ($keyword) {
                        $query->whereRaw("nombre like ?", ["%{$keyword}%"]);
                    });
                });
            })
            ->filterColumn('ubicacion_id', function($query, $keyword) {
                $query->whereHas('ubicacion', function($query) use ($keyword) {
                    $query->whereRaw("nombre like ?", ["%{$keyword}%"]);
                });
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Registro $model): QueryBuilder
    {
        return $model->newQuery()->latest();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('registro-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->parameters($this->getBuilderParameters());
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->title('Acción')
                  ->addClass('text-center'),
            
            Column::computed('created_at')->title('Fecha'),
            Column::make('tipo')->title('Tipo de madera'),
            Column::make('ubicacion_id')->title('Ubicación'),
            Column::make('troza'),
            Column::make('carga'),
            Column::make('altura_a_1')->title('a1'),
            Column::make('altura_a_2')->title('a2'),
            Column::make('altura_a_3')->title('a3'),
            Column::make('altura_a_4')->title('a4'),
            Column::make('altura_a_5')->title('a5'),
            Column::make('altura_a_6')->title('a6'),
            Column::make('altura_a_7')->title('a7'),
            Column::make('altura_b_1')->title('b1'),
            Column::make('altura_b_2')->title('b2'),
            Column::make('altura_b_3')->title('b3'),
            Column::make('altura_b_4')->title('b4'),
            Column::make('altura_b_5')->title('b5'),
            Column::make('altura_b_6')->title('b6'),
            Column::make('altura_b_7')->title('b7'),
            Column::make('promedio'),
            Column::make('metros')->title('T.Metros'),
            Column::make('factor')->title('Factor 0.88'),
            
            
            
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Registro_' . date('YmdHis');
    }
}
