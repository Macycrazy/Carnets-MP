

new DataTable('#ActividDad', {
     ajax: "{{route('actividades')}}",
     columns:[
        {data:'usuario'},
        {data:'ip'},

        {data:'accion'},
        {data:'controlador'},
        {data:'created_at'}
        ],
        "order": [[ 5, "desc" ]]

          
});


