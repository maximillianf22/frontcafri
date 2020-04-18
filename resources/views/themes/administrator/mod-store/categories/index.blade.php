@extends('themes.administrator.template.index')
@section('title', 'Categorias')

@section('content-theme')
  <section class="content-wrapper">
    <section class="content-header">
      <h1>Categorias</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="breadcrumb-item active">Categorias</li>
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
                  <a href="{{route('admin.category.create')}}" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Agregar Nueva Categoria </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="box-body">
          <table class="table table-hover table-responsive">
            <thead>
              <tr>
                <th class="text-center">Imagen</th>
                <th class="text-center">Nombre Categoria</th>
                <th class="text-center">Descripción general</th>
                <th class="text-center">Estado Actual</th>
                <th class="text-center"></th>
              </tr>
            </thead>
            <tbody class="text-center">
              @if (count($dataCategory)>0)
                @foreach ($dataCategory as $category)
                  <tr>
                    <td>
                      @if(!empty($category->imageCategorie))
                            @if (file_exists( public_path().'/content/upload/store/'.$category->imageCategorie ))
                                <img id="logoTheme" src="{{ asset('/content/upload/store/'.$category->imageCategorie) }}" alt="Categoria" width="100" >
                            @else
                            @endif
                      @else
                      @endif
                    </td>
                    <td>{{$category->nameCategorie}}</td>
                    <td>{{$category->description}}</td>
                    <td>
                      @if($category->idState==1)
                        <span class="badge badge-success">Activo</span>
                      @else
                        <span class="badge badge-danger">Inactivo</span>
                      @endif
                    </td>
                    <td>
                    <a href="{{route('admin.category.edit',$category->id)}}"><i class="lni-pencil" style="font-size:20px;cursor:pointer"></i></a>
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
