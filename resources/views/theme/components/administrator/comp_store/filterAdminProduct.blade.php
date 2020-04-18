<table id="result" class="table table-responsive table-app-content">
     <thead>
     <tr>
          <th></th>
          <th>Nombre</th>
          <th>Descripción General</th>
          <th>Categoria</th>
          <th>Unidad Venta</th>
          <th>Tipo Producto</th>
          <th>Estado</th>
          <th></th>
     </tr>
     </thead>
     <tbody class="store-b-manager">
          @foreach($Products as $list)
          <tr>
               <td>
                    <div class="imgStoreTbl">
                    @if(!empty($list->imageProduct))
                         @if (file_exists( public_path().'/content/upload/store/'.$list->imageProduct ))
                              <img id="logoTheme" src="{{ asset('/content/upload/store/'.$list->imageProduct) }}" alt="Producto" width="100" >
                         @else
                              $list->imageProduct
                         @endif
                    @else
                         $list->imageProduct
                    @endif
                    </div>
               </td>
               <td >
                    <div class="product-name"> {{ $list->nameProduct }} </div>
               </td>
               <td >  {{ $list->desc_product }} </td>
               <td> {{ $list->nameCategorie }} </td>
               <td> {{ $list->unidad_venta }} </td>
               <td>
                    @if($list->cnt_attributes>1)
                         Con Variación
                    @else
                         Unico
                    @endif
               </td>
               <td  style="color:#000"> 
                              @if($list->idState==1)
                                   <span class="badge badge-success">Activo</span>
                              @else
                                   <span class="badge badge-danger">Inactivo</span>
                              @endif
                         </td>
               <td>
                    <div class="jj-button-mini"><a href="{{ route('admin.edit.products',$list->id)}} ">Editar </a> </div>
               </td>
          </tr>
          @endforeach     
     </tbody>
</table>