<table id="result" class="table table-responsive table-app-content">
     <thead>
     <tr>
          <th class="text-center">Nombre y Apellidos </th>
          <th class="text-center">Nombre del Negocio</th>
          <th class="text-center">Celular</th>
          <th class="text-center">Correo Electronico</th>
          <th class="text-center">Estado</th>
          <th class="text-center"></th>
     </tr>
     </thead>
     <tbody class="store-b-manager">
     @if (count($dataCustomer)>0)
          @foreach ($dataCustomer as $customer)
          <tr class="" style="padding:1px">
          <td class="" style="padding:10px !important;color:#000; text-align:left;font-weight:300">
               {{$customer->nameUser}} {{$customer->lastnameUser}}
          </td>
          <td class="" style="padding:10px !important;color:#000; text-align:left;font-weight:300">
               {{$customer->nameBusiness}}
          </td>
          <td class="" style="padding:10px !important;color:#000; text-align:left;font-weight:300">
               {{$customer->celularUser}}
          </td>
          <td class="" style="padding:10px !important;color:#000; text-align:left;font-weight:300">
               {{$customer->email}}
          </td>
          <td class="" style="padding:10px !important;color:#000; text-align:left;font-weight:300">
               @if ($customer->idState==1)
                    <span class="badge badge-success">Activo</span>
               @else
                    <span class="badge badge-danger">Inactivo</span>
               @endif
          </td>
          <td class="" style="padding:10px !important;color:#000; text-align:left;font-weight:300; font-size:11px">
               <div class="jj-button-mini"><a href="{{route('admin.customers.edit',$customer->id)}}">Editar </a> </div>
          </td>
          </tr>
          @endforeach
     @else
          <tr>
          <td colspan="4">No se encontraron Clientes</td>
          </tr>
     @endif
     </tbody>
</table>