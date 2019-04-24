<?php

namespace App\DataTables;

use App\Servicio;
use Illuminate\Support\Facades\Storage;

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
            ->editColumn('foto',function($s){
                $url=Storage::url('public/servicios/'.$s->foto);
                return '<img src="'.$url.'" alt="" class="img-fluid" >';
            })
            ->addColumn('action', function($s){
               
                return view('servicios.acciones', ['s'=>$s])->render();


            })->rawColumns(['action','foto']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Servicio $model)
    {
        return $model->newQuery()->select($this->getColumns())->orderBy('created_at','desc');;
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
            'foto',
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
            'foto'=>['exportable' => false],
            'nombre',
            'precio',
            'descripcion'=>['title'=>'Descripción'],
            // 'created_at'=>['title'=>'Creado'],
            // 'updated_at'=>['title'=>'Actualizado']
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
