
@guest
<section class="w-50 m-auto" style="text-align: center;">

  

            <main class="form-signin w-100 m-auto">

  <form action="{{route('login')}}" method="POST">

   @csrf

    <h1 class="h1 mb-3 fw-normal">Iniciar Sesion</h1>

    <div class="form-floating">

      <input type="email" class="form-control" id="CorrEo" placeholder="correo@gmail.com" name="email">

      <label for="CorrEo">Correo electronico</label>

    </div>

    <br>

    <div class="form-floating">

      <input type="password" class="form-control" id="ContrAsena" placeholder="Contraseña" name="password">

      <label for="ContrAsena">Contraseña</label>

    </div>

<br>

   <button class="btn btn-primary w-75 py-2" type="submit" id="loginBtn">

    Registrarse

   </button>

  </form>
<br>
   <div class="w-50 m-auto" id="AliNeo"></div>

   @if (session('success'))
   

<div class="alert alert-success alert-dismissible fade show w-50 m-auto align-items-center" role="alert" id="AlertAs">
   <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:" ><use xlink:href="#check-circle-fill"/></svg>
 {{session('success')}}
 
</div>


@endif
 @if (session('alert') )


    <div class="alert alert-danger alert-dismissible fade show w-50 m-auto align-items-center" role="alert" id="AlertAs">
   <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
 
{{session('alert')}}
 
</div>
@endif

</main>

 </section>

@endguest
<!-- /////////////////// INICIO DE SESION //////////////////-->


        
        
      </section>