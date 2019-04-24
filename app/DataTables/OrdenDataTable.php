<?php

namespace App\DataTables;

use App\Orden;
use Yajra\DataTables\Services\DataTable;


class OrdenDataTable extends DataTable
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
            ->editColumn('user_id',function($o){
                return $o->empleado->name.'<small> '.$o->empleado->email.'</small>';
            })
            ->editColumn('created_at',function($o){
                return $o->created_at.'<small> '.$o->created_at->diffForHumans().'</small>';
            })
            ->editColumn('auto_id',function($o){
                return $o->auto->placa.'<small> '.$o->auto->color.'</small>';
            })
            ->filterColumn('auto_id', function($query, $keyword) {
                $query->whereRaw("(select count(1) from auto where auto.id = auto_id and CONCAT(auto.placa ,' ',auto.color ) like ?) >= 1", ["%{$keyword}%"]);
            })
            ->addColumn('servicios',function($o){

                return $o->ser->map(function($s) {
                    return '<span class="badge badge-pill badge-dark">'.$s->nombre.'<small> $'.$s->precio.'</small></span>';
                })->implode('<br>');
                
            })
            

            ->addColumn('action', function($o){
                return view('ordenes.acciones', ['o'=>$o])->render();
            })


            ->rawColumns(['action','user_id','auto_id','servicios','created_at']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Orden $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Orden $model)
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
            'user_id',
            'auto_id',
            'detalle',
            'created_at',
            'updated_at',

        ];
    }


    protected function getColumnsTable()
    {
        return [
            /*'id',*/
            /*'user_id'=>['title'=>'Empleado','data'=>'user_id'],*/
            'auto_id'=>['title'=>'Auto'],
            /*'detalle'=>['title'=>'Detalle'],*/
            'servicios'=>['title'=>'Servicios'],
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
        return 'Orden_' . date('YmdHis');
    }
}
