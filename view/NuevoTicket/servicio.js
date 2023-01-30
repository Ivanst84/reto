
  $(document).ready(function() {
    $('.summernote').summernote();
  });
function init(){
   
  $("#ticket_form").on("submit",function(e){
      guardaryeditar(e);	
  });
  
}

$(document).ready(function() {
  $('#tick_descrip').summernote({
      height: 180,
      lang: "es-ES",
      
      callbacks: {
          onImageUpload: function(image) {
              console.log("Image detect...");
              myimagetreat(image[0]);
          },
          onPaste: function (e) {
              console.log("Text detect...");
          }
      }
  });

  $.post("../../controllers/categoria.php?op=combo",function(data, status){
      $('#cat_id').html(data);
  });

});

function guardaryeditar(e){
  e.preventDefault();
  var formData = new FormData($("#ticket_form")[0]);
  if ($('#soli_descrip').summernote('isEmpty') || $('#soli_titulo').val()==''){
      swal("Advertencia!", "Campos Vacios", "warning");
  }else{
      $.ajax({
          url: "../../controllers/solicitud.php?op=insert",
          type: "POST",
          data: formData,
          contentType: false,
          processData: false,
          success: function(datos){  
            console.log(datos);
              $('#soli_titulo').val('');
              $('#soli_descrip').summernote('reset');
              Swal.fire({
                title: 'Correcto!',
                text: 'Se Elimino Correctamente',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            })
          }  
      }); 
  }
}

init();
