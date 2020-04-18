<table id="result" class="table table-striped table-responsive">
     <tr>
          <th style="width: 10px"></th>
          <th style="width: 100px"></th>
          <th>Descripción</th>
          <th>Categoria</th>
          <th>Precio Público</th>
          <th>Precio Comercio</th>
          <th>Inventario</th>
          <th>Stock</th>
          <th>Venta Minima</th>
          <th>Estado</th>
          <th></th>
     </tr>
     <tbody>
         @foreach($Products as $list)
          <tr>
               <td>
                    @if($list->isOffers==1)
                    <i class="lni-offer text-danger" style="font-size:14px;padding-top:40px !important"></i>
                    @endif 
               </td>
               <td>
                    @if(!empty($list->imageProduct))
                         @if (file_exists( public_path().'/content/upload/store/'.$list->imageProduct ))
                              <img id="logoTheme" src="{{ asset('/content/upload/store/'.$list->imageProduct) }}" alt="Producto" width="100" >
                         @else
                              $list->imageProduct
                         @endif
                    @else
                         $list->imageProduct
                    @endif
               </td>
               <td>
                    {{ $list->nameProduct }}<br />
                    {{ $list->descriptionProduct }}<br />
               </td>
               <td>
                    {{ $list->nameCategorie }}
               </td>

               <td>$ {{ number_format($list->priceProduct,0) }}</td>
               <td>$ {{ number_format($list->pricecomerceProduct,0) }}</td>
               <td>{{ $list->inventory }}</td>
               <td>{{ $list->stockAttribute }}</td>
               <td>{{ $list->amount_per_sale }} / {{ $list->unidad_venta }}</td>
          
               <td>
                    @if($list->idState==1)
                         <span class="badge badge-success">Activo</span>
                    @else
                         <span class="badge badge-danger">Inactivo</span>
                    @endif
               </td>

               <td>
                    <a href="{{route('admin.edit.products',$list->idProduct)}}"><i class="lni-pencil" style="font-size:18px;cursor:pointer"></i></a>
               </td>
               
          </tr>
          @endforeach     
     </tbody>
</table>