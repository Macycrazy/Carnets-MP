
<section class="w-75 m-auto mt-5" id="Cuadrore" style="text-align: center; background-color: white;padding: 1%;border: dotted 1px grey;border-radius: 3rem;display: none;">
 



<form style="font-family: arial;" method="POST" action="{{route('registrar')}}" id="Registro" enctype="multipart/form-data" autocomplete="off">


      @csrf

       {{ csrf_field() }}

   <h1>Registro de Carnet Institucional</h1> 


<div style="width:100%">

<!-- ////////////// FOTO DEL TRABAJADOR ////////////////-->
   <div id="preview_img" style="max-height:200px;height:200px;margin: 0 auto;margin-bottom: 1%">



      <img id="image" name="image" style="width: 100%;height: 100%;padding: 0;"  >


   </div>

<!-- ////////////// FOTO DEL TRABAJADOR ////////////////-->


<!-- ////////////// NOMBRE Y APELLIDO ////////////////-->


   <div class="mb-3 input-group">
<span class="input-group-text" id="name">Nombres</span>
      <input class="form-control" type="text" id="name" name="name" placeholder="ej. NOMBRES COMPLETOS" required>

      
      <span class="input-group-text" id="name">Apellidos</span>
      <input class="form-control" type="text" id="surname" name="surname" placeholder="ej. APELLIDOS COMPLETOS" required>



   </div>

<!-- ////////////// NOMBRE Y APELLIDO ////////////////-->

<!-- ////////////// CEDULA Y DIRECCION ////////////////-->
   <div class="mb-3 input-group">

      <span class="input-group-text" id="document">Cedula</span>

      <input class="form-control col-md-3" type="text" id="document" name="document" placeholder="ej. 12345678" required>

      <span class="input-group-text" id="identifier">Nacionalidad</span>

     
      <select class="form-control col-md-2" id="identifier" name="identifier" required>

         <option selected disabled>Nacionalidad</option>


         <option value="V">Venezolano</option>


         <option value="E">Extranjero</option>

      </select>


     <span class="input-group-text" id="adress">Direccion</span>

      <input class="form-control" type="text" id="adress" name="adress" placeholder="ej. CIIP" value="CIIP" required>

 
   </div>

<!-- ////////////// CEDULA Y DIRECCION ////////////////-->

<!-- ////////////// TELEFONO Y CODIGO ////////////////-->

   <div class="mb-3 input-group">

      <span class="input-group-text" id="phone">Telefono</span>
      <input class="form-control col-md-3" type="text" id="phone" name="phone" placeholder="ej. 02122743742" value="02122743742" required>

      <span class="input-group-text" id="code">Codigo</span>

      <input class="form-control" type="text" id="code" name="code" placeholder="ej. 100046 en adelante" value="{{$in->card_code}}" required>



   </div>

<!-- ////////////// TELEFONO Y CODIGO ////////////////-->

<!-- ////////////// DEPARTAMENTO Y CARGO ////////////////-->

   <div class="mb-3 input-group">
  <span class="input-group-text" id="department">Departamento</span>

      <select class="form-control" id="department" name="department" required>

         <option disabled selected>Seleccione un Departamento</option>
          @foreach($departamentos as $departamento)
         <option value="{{$departamento->id}}">{{$departamento->name}}</option>
      @endforeach

      </select>

          <span class="input-group-text" id="charge">Cargo</span>

      <select class="form-control col-md-3" id="charge" name="charge" required>
         <option disabled selected>Seleccione un Cargo</option>
      @foreach($cargos as $cargo)
         <option value="{{$cargo->id}}">{{$cargo->name}}</option>
      @endforeach
      </select>



   </div>

<!-- ////////////// DEPARTAMENTO Y CARGO ////////////////-->


<!-- ////////////// NIVEL DE ACCESO Y ESTADO ////////////////-->

   <div class="mb-3 input-group">
     <span class="input-group-text" id="access">Nivel de Acceso</span>
      <select class="form-control col-md-3" id="access" name="access" required>

         <option disabled selected>Seleccione el Nivel de acceso</option>
   @foreach($niveles as $nivel)
         <option value="{{$nivel->id}}" @if ($nivel->id == 1) selected @endif>{{$nivel->name}}</option>
      @endforeach
      </select>

       <span class="input-group-text" id="statesment">Estado</span>

      <select class="form-control" id="statesment" name="statesment" required>

         <option disabled selected>Seleccione el Estado</option>
   @foreach($estados as $estado)
         <option value="{{$estado->id}}" @if ($estado->id == 14) selected @endif>{{$estado->name}}</option>
      @endforeach
      </select>



   </div>

<!-- ////////////// NIVEL DE ACCESO Y ESTADO ////////////////-->

<!-- ////////////// FOTO DEL TRABAJADOR Y FECHA DE VENCIMIENTO ////////////////-->

   <div class="mb-3 input-group">

         

      <input type="file" id="croppedImg" name="archivo" class="form-control" hidden>


      <input class="form-control" type="file" id="file" name="image" accept="image/*" >
            <span class="input-group-text" id="file">Fotografia</span>


      <span class="input-group-text" id="date">Vencimiento</span>
      <input class="form-control col-md-3" type="date" id="date" name="date" min="<?php echo date('Y-m-d'); ?>" max="{{ now()->addYear()->format('Y-m-d') }}" value="{{ now()->addYear()->format('Y-m-d') }}" required >



   </div>

<!-- ////////////// FOTO DEL TRABAJADOR Y FECHA DE VENCIMIENTO ////////////////-->

<!-- ////////////// COMENTARIO ////////////////-->

   <div class="mb-3 input-group">

      <textarea placeholder="Observaciones" name="comment" class="form-control" style="height: 50px;min-height:50px;max-height:50px"></textarea>

   </div>

<!-- ////////////// COMENTARIO ////////////////-->



<!-- ////////////// BOTON DE REGISTRO ////////////////-->

   <div class="mb-3 input-group">

      <button class="btn btn-primary w-75 py-2 m-auto" type="submit" id="save">

         Registrar

      </button>
      

   </div>

<!-- ////////////// BOTON DE REGISTRO ////////////////-->

</div>

</form>


<!-- ////////////// EDITAR IMAGEN ////////////////-->

<div class="mb-3 input-group">

   <button id="downloadButton" class="btn btn-secondary m-auto">

      Recortar Imagen

   </button>

</div>

</section>
<!-- ////////////// EDITAR IMAGEN ////////////////-->