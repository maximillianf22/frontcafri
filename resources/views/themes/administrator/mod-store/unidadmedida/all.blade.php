@extends('themes.administrator.template.index')
@section('title', 'Unidades de Medida')

@section('content-theme')
  <section class="content-wrapper">
    <section class="content-header">
      <h1>Unidades de Medidas</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="breadcrumb-item active">Unidad de Medida</li>
      </ol>
    </section>

    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <div class="row align-items-center">
            <div class="col-6">
              <h4 class="box-title"></h4>
            </div>
            <div class="col-6">
              <div class="box-controls pull-right">
                <div class="box-header-actions">
                  <a href="{{route('admin.unidad.create')}}" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Agregar Nueva Unidad </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="box-body">
          <table class="table table-hover table-responsive">
            <thead>
              <tr>
                <th class="text-center">Tipo</th>
                <th class="text-center">Descripción </th>
                <th class="text-center">Estado Actual</th>
                <th class="text-center"></th>
              </tr>
            </thead>
            <tbody class="text-center">
              @if (count($Unidades)>0)
                @foreach ($Unidades as $unidad)
                  <tr>
                     <td>{{$unidad->nameValue}}</td>
                    <td>{{$unidad->extra}}</td>
                    <td>
                      @if($unidad->idState==1)
                        <span class="badge badge-success">Activo</span>
                      @else
                        <span class="badge badge-danger">Inactivo</span>
                      @endif
                    </td>
                    <td>
                    <a href="{{route('admin.unidad.edit',$unidad->id)}}"><i class="lni-pencil" style="font-size:20px;cursor:pointer"></i></a>
                    </td>
                  </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="4">No se encontraron Categorias creadas</td>
                </tr>
              @endif
            </tbody>
          </table>
        </div>
        <div class="box-footer clearfix">
          {{-- Pagination --}}
        </div>
      </div>
    </section>
  </section>
@endsection
