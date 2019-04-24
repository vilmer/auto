<?php

namespace App\DataTables;

use App\Auto;
use Yajra\DataTables\Services\DataTable;

class AutoDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
             ->addColumn('action', function($s){
                  return view('autos.acciones', ['s'=>$s])->render();
            })->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Auto $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Auto $model)
    {
        return $model->newQuery()->select($this->getColumns())->orderBy('created_at','desc');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumnsTable())
                    ->minifiedAjax()
                    ->addAction(['width' => '80px','title'=>'Acciones','printable' => false, 'exportable' => false])
                    ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id',
            'duenio',
            'placa',
            'color',
            'descripcion',
            'created_at',
            'updated_at'
        ];
    }

    protected function getColumnsTable()
    {
        return [
            /*'id',*/
            'duenio'=>['title'=>'Propietario'],
            'placa',
            'color',
            'descripcion'=>['title'=>'Año'],
            'created_at'=>['title'=>'Creado'],
            'updated_at'=>['title'=>'Actualizado']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Auto_' . date('YmdHis');
    }
}
