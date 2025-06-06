
      @if(Auth::user()->rol == 'admin')


        
       <div class="card m-auto" style="width: 95%;display: none;" id="CajoNeta">
        <!--  <button class="btn btn-outline-secondary w-25 m-auto" id="logs">Logs</button>-->

                <div class="card-body"  > 

            <table id="ActividDad" class="table table-striped nowrap" style="width:100%">
                <thead >
                    <tr >
                       
                        <th>Usuario</th>
                        <th>Ip</th>

                        <th>Accion</th>
                        <th>Controlador</th>
                        <th>Fecha</th>
                       
                    </tr>
                </thead>
                <tbody >
                   
 
                        

         
                </tbody>
            </table>
        </div>
        </div>

        @endif
