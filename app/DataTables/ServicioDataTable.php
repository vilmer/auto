<?php

namespace App\DataTables;

use App\Servicio;
use Yajra\DataTables\Services\DataTable;

class ServicioDataTable extends DataTable
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
                $btnEliminar='<button type="buttton" onclick="eliminar(this);" data-url="'.route('eliminarServicio',$s->id).'" class="btn btn-danger btn-sm">Eliminar</button>';
                $btnEditar='<a href="'.route('editarServicio',$s->id).'" class="btn btn-primary btn-sm">Editar</a>';
                $bntOrden='<a class="btn btn-info btn-sm">Nueva orden</a>';
                return $bntOrden.$btnEditar.$btnEliminar;
            })->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Servicio $model)
    {
        return $model->newQuery()->select($this->getColumns());
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
                    ->addAction(['width' => '80px','title'=>'Acciones'])
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
            'nombre',
            'precio',
            'descripcion',
            'created_at',
            'updated_at'
        ];
    }

    protected function getColumnsTable()
    {
        return [
            /*'id',*/
            'nombre',
            'precio',
            'descripcion'=>['title'=>'Descripción'],
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
        return 'Servicio_' . date('YmdHis');
    }
}
