   @auth
@include('actividades')


      <div class="" style="width: 99%;background-color:white;margin: 0 auto;padding: 1%;border-radius: 2rem;display: none;" id="Cuadrcon">


<table id="example" class="table table-striped  m-auto" style="width:95%;text-align:center;vertical-align: middle;size: 1vh;">
        <thead style="text-align:center;vertical-align: middle;">
            <tr style="text-align:center;vertical-align: middle;">
                <th  style="text-align:center;vertical-align: middle;" >Cedula</th>
                <th style="text-align:center;vertical-align: middle;">Codigo de Carnet</th>
                <th style="text-align:center;vertical-align: middle;">Nombre</th>
                <th style="text-align:center;vertical-align: middle;">Apellido</th>
                <th style="text-align:center;vertical-align: middle;">Departamento</th>
                <th style="text-align:center;vertical-align: middle;">Cargo</th>

                <th style="text-align:center;vertical-align: middle;" data-dt-order="disable">Foto de perfil</th>
                <th style="text-align:center;vertical-align: middle;">Estado</th>
                @if(Auth::user()->rol == 'admin')
                <th style="text-align:center;vertical-align: middle;" data-dt-order="disable">Generar Carnet</th>
                <th style="text-align:center;vertical-align: middle;" data-dt-order="disable">Cargar Carnet</th>
                 @endif
                <th style="text-align:center;vertical-align: middle;" data-dt-order="disable">Frente</th>
                <th style="text-align:center;vertical-align: middle;" data-dt-order="disable">Contra</th>
                
                <th style="text-align:center;vertical-align: middle;" data-dt-order="disable">Nota</th>
                <th style="text-align:center;vertical-align: middle;" >Creado El:</th>
                <th style="text-align:center;vertical-align: middle;" data-dt-order="disable">Editar</th>
                @if(Auth::user()->rol == 'admin')
               
                @endif
               
                
            </tr>
        </thead>
        <tbody style="text-align:center;vertical-align: middle;">
         @foreach($a as $b)

            <tr style="text-align:center;vertical-align: middle;">
                <td style="text-align:center;vertical-align: middle;">{{$b->foranity}} - {{$b->cedule}}</td>
                <td style="text-align:center;vertical-align: middle;">{{$b->card_code}}</td>
                <td style="text-align:center;vertical-align: middle;">{{ mb_ucfirst($b->name, 'UTF-8') }}</td>
                <td style="text-align:center;vertical-align: middle;">{{ mb_ucfirst($b->lastname, 'UTF-8') }}</td>
                <td style="text-align:center;vertical-align: middle;">{{$b->department}}</td>
                 <td style="text-align:center;vertical-align: middle;">{{ mb_ucfirst($b->charge, 'UTF-8') }}</td>
                 <td style="text-align:center;vertical-align: middle;" >

                  @if(File::exists('imgs/usuarios/'.$b->cedule.'.jpg'))

                  

          

                     <a href="imgs/usuarios/{{ $b->cedule}}.jpg" class="image-link">
  <img src="imgs/usuarios/{{ $b->cedule}}.jpg" style="max-height:100px" class="thumbnail-image">
</a>



                 

                  @else
                  No tiene
                  @endif
                </td>
               
                  <td style="text-align:center;vertical-align: middle;">{{$b->id_status}}</td>
                @if(Auth::user()->rol == 'admin')
                     <td style="text-align:center;vertical-align: middle;"><a href="{{route('generar_carnet',['cedula' => $b->cedule])}}"> <button  class="btn btn-primary" ><i class="bi bi-gear"></i></button> </a></td>
                <td style="text-align:center;vertical-align: middle;">
                  <button type="button" class="btn btn-primary" data-toggle="modal"data-target="#add{{$b->card_code}}">
  +
</button>
               
                  <form method="POST" action="{{route('carga_carnet')}}" enctype="multipart/form-data">
                  @csrf

                  <div class="modal fade" id="add{{$b->card_code}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$b->name}} {{$b->lastname}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <div class="image-upload-container">
  <input type="hidden" name="carnet_id" value="{{$b->card_code}}">
   <input type="hidden" name="cedula" value="{{$b->cedule}}">
  <div class="image-box" id="front-box_{{$b->card_code}}">
    <label for="front-input_{{$b->card_code}}">Frente</label>
    <input type="file" id="front-input_{{$b->card_code}}" accept="image/png" name="front" style="display: none;">
  </div>
  <div class="image-box" id="back-box_{{$b->card_code}}">
    <label for="back-input_{{$b->card_code}}">Trasero</label>
    <input type="file" id="back-input_{{$b->card_code}}" accept="image/png" name="back" style="display: none;">
  </div>
</div>
   </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">registrar</button>
      </div>
    </div>
  </div>
</div>


                  </form>
               </td>
                 @endif

                <td style="text-align:center;vertical-align: middle;">   @if(File::exists($b->front))

                  

          
                
                  <a href="{{ $b->front}}"  class="image-link">
  <img src="{{ $b->front}}" style="max-height:100px" class="thumbnail-image">
</a>



                 

                  @else
                 No Cargado
                  @endif
               </td>
                <td style="text-align:center;vertical-align: middle;">   
                  @if(File::exists($b->back))

                  

                <a href="{{ $b->back }}" class="image-link">
  <img src="{{ $b->back }}" style="max-height:100px" class="thumbnail-image">
</a>


                 

                  @else
                  No cargado
                  @endif</td>
                   @if(Auth::user()->rol == 'admin')
               
@endif
                <td style="text-align:center;vertical-align: middle;" >{{ mb_ucfirst($b->note, 'UTF-8') }}</td>
                
                <td style="text-align:center;vertical-align: middle;">{{ \Carbon\Carbon::parse($b->created_at)->format('d-m-Y') }}</td>
                <td style="text-align:center;vertical-align: middle;"  ><a href="{{route('editar',$b->card_code)}}" > <button class="btn btn-warning">Editar</button> </a></td>
                 @if(Auth::user()->rol == 'admin')
                
                @endif
                
            </tr>
        
<div id="image-modal" class="modal">

  <img class="modal-content" id="full-image">
</div>  
      @endforeach
              </tbody>
    </table>
      @auth



        <!--////////////////////////// Descargar archivos ////////////////////////-->








        @endguest
    </div>
    @endauth


     <!-- /////////////////// VISTA DE CARNETS //////////////////-->

     


          <!-- /////////////////// VISTA DE CARNETS //////////////////-->