<!DOCTYPE html>
<html lang="en">
   @include('head')
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader -->
      <div id="mySidepanel" class="sidepanel">
         <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
         @auth

         <a href="#" id="Btnregistro" onclick="closeNav()">Registrar Carnet</a>

         <a href="#" id="Btnconsulta" onclick="closeNav()">Consultar Carnets</a>

           @if(Auth::user()->rol == 'admin')

         <a href="{{route('qr')}}"  >Generar Qr</a>
         @endif


         <form method="POST" action="{{route('logout')}}">

            @csrf

         <button href="" type="sumbit" class="btn btn-primary m-auto text-center p-2" style="font-size: 100%;text-align: center;" >

           

         Cerrar Sesion

      </button>

         </form>

         @endauth

         @guest

         <a href="#service" onclick="closeNav()">

         Iniciar Sesion

         </a>

         @endguest

      </div>
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header" style="vertical-align:middle">

            <div class="container-fluid">

               <div class="row">

                  <div class="col-md-4 col-sm-4">

                     <div class="logo">

                        <!-- <a href="https://www.ciip.com.ve"> -->

                           <img src="imgs/logo mp.png" alt="#" style="width:200px" />

                        <!--</a>-->

                     </div>

                  </div>

                  <div class="col-md-8 col-sm-8" style="vertical-align:center">


                     <div class="right_bottun" style="vertical-align: middle;">
                        @auth
                        <h2  style="vertical-align: middle;margin: 0;padding: 0;color:white;text-shadow:
    -1px -1px 0 black,
    1px -1px 0 black,
    -1px 1px 0 black,
    1px 1px 0 black;">Bienvenido: {{ ucfirst(Auth::user()->name) }} </h2>
                         @endauth
                      
                        <button class="openbtn" onclick="openNav()">

                           <img src="images/menu_icon.png" alt="#"/> 

                        </button> 

                     </div>

                  </div>

               </div>

            </div>

         </div>

      </header>

      <!-- end header inner -->
      <!-- end header -->
      <!-- BANNER -->
      <section class="banner_main" id="main">

         
@auth
<!-- /////////////////// REGISTRO DE CARNETS //////////////////-->

 @if (session('success'))
   

<div class="alert alert-success alert-dismissible fade show w-50 m-auto align-items-center" role="alert" id="AlertAs">
   <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
<strong> {{session('success')}} </strong>
 
</div>


@endif
 @if (session('alert') )


    <div class="alert alert-danger alert-dismissible fade show w-50 m-auto align-items-center" role="alert" id="AlertAs">
   <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
 
<strong> {{session('alert')}}</strong>
 
</div>
@endif


@include('registro')

   @include('carnets')


@endauth

<!-- /////////////////// REGISTRO DE CARNETS //////////////////-->




<!-- /////////////////// INICIO DE SESION //////////////////-->


      <!-- BANNER -->
     
   @include('login')

   
     
      <!-- Javascript files-->

   @include('control')

   <script>
      openNav()
   </script>