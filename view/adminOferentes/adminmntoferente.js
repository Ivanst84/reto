var usu_id = $('#usu_idx').val();

function init(){
    $("#oferente_form").on("submit",function(e){

        guardaryeditar(e);
        window.location.reload();

    });
   

   
}

function Filtro(string){//solo letras y numeros
      
    console.log(string);
       
    var out = '';
    //Se añaden las letras validas
    var filtro = 'abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ1234567890 ';//Caracteres validos
	var casa= ""
    for (var i=0; i<string.length; i++){
        if (filtro.indexOf(string.charAt(i)) != -1 ) 
      
	     out += string.charAt(i);
      
        }
        casa = out.trim();
         
        return out.trim();
        
        }

        document.getElementById("oferente_form").addEventListener("paste", function(event){
            event.preventDefault();
            alert("No se permite pegar contenido en el formulario.");
          });

function comprobarvalorLetra(){
 palabraValida =Filtro(string)
console.log(palabraValida)
if(palabraValida == ""){
    document.oferente_form.apellidoM_o.select()
    document.oferente_form.apellidoM_o.focus()


}else
document.oferente_form.apellidoM_o.value=palabraValida.trim();
}

  
    

function guardaryeditar(e){
    e.preventDefault();
    var formData = new FormData($("#oferente_form")[0]);
    $.ajax({
        url: "../../controllers/oferente.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data){
            console.log(data);
            $('#oferente_data').DataTable().ajax.reload(); 
            $('#modalmantenimiento').modal('hide'); // se esconde el modal para ver la tabla despues de agregar

            Swal.fire({
                title: 'Correcto!',
                text: 'Se Registro Correctamente',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            })
        }
    });
}

function editar(id_o){
    $.post("../../controllers/oferente.php?op=mostrar",{id_o : id_o}, function (data) {
        data = JSON.parse(data);
        console.log(data);
        $('#id_o').val(data.id_o);
        $('#nombre_o').val(data.nombre_o);
        $('#apellidoP_o').val(data.apellidoP_o);
               $('#apellidoM_o').val(data.apellidoM_o);
               $('#calle_o').val(data.apellidoM_o);
               $('#colonia_o').val(data.colonia_o);
               $('#numero_o').val(data.numero_o);
               $('#sexo_o').val(data.sexo_o).trigger('change');
               $('#correo_o').val(data.correo_o);
               $('#telefono_o').val(data.telefono_o);


       
    });
    $('#lbltitulo').html('Editar Registro');
    $('#modalmantenimiento').modal('show');
}


function nuevo(){
    $('#lbltitulo').html('Nuevo Registro');
    $('#oferente_form')[0].reset();
    
    $('#modalmantenimiento').modal('show');
}


$(document).ready(function()
   {
   
    $('#sexo_o').select2({
        dropdownParent: $('#modalmantenimiento')
    });

    });


$(document).ready(function(){
$('#oferente_data').DataTable({
    "aProcessing": true,
    "aServerSide": true,
    dom: 'Bfrtip',
    buttons: [
        'copyHtml5',
        'excelHtml5',
        'csvHtml5',
    ],
    "ajax":{
        url:"../../controllers/oferente.php?op=listar_oferente",
        type:"post"
    },
    "bDestroy": true,
    "responsive": true,
    "bInfo":true,
    "iDisplayLength": 10,
    "order": [[ 0, "desc" ]],
    "language": {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    },
});
});
function NumText(string){//solo letras y numeros
    var out = '';
    //Se añaden las letras validas
    var filtro = 'abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ1234567890 ';//Caracteres validos
	
    for (var i=0; i<string.length; i++)
       if (filtro.indexOf(string.charAt(i)) != -1) 
	     out += string.charAt(i);
    return out;
}

function eliminar(id_o){
    console.log(id_o);
    swal.fire({
        title: "Eliminar!",
        text: "Desea Eliminar el Registro?",
        icon: "error",
        confirmButtonText: "Si",
        showCancelButton: true,
        cancelButtonText: "No",
    }).then((result) => {
        if (result.value) {
            $.post("../../controllers/oferente.php?op=eliminar",{id_o: id_o}, function (data) {
                $('#oferente_data').DataTable().ajax.reload();

                Swal.fire({
                    title: 'Correcto!',
                    text: 'Se Elimino Correctamente',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                })
            });
        }
    });


}








init();
