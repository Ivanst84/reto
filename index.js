

const form = document.querySelector('#oferente_form');

function init(){
    $("#oferente_form").on("submit",function(e){

        guardaryeditar(e);

    });
   

   
}

const modal = document.querySelector('.modal');
const modalContact = document.querySelector('.modal-fade');

const buttons = document.querySelectorAll('.card__btn');
const buttons_select = document.querySelectorAll('.contact-btn');

const closeButton = document.querySelector('#close-modal-btn');
const closeButtonModal = document.querySelector('#close-modal-fade-btn');
const buttonsm = document.querySelectorAll('#button');

buttonsm.forEach((button)=>{
    button.addEventListener('click', ()=>{
    modal.classList.toggle('visible');
    modal.classList.remove('hidden');
    
})
})

console.log(modalContact);
function openModalContact() {
    modalContact.classList.remove('hidden');
}
function openModal() {
    modal.classList.remove('hidden');
}
function closeModalFade(){

    modalContact.classList.add('hidden');

}
function closeModal() {
    modal.classList.add('hidden');
}


const infoLucerna =  () => {
   
    const lucerna = document.getElementsByClassName('lucerna');
    console.log(lucerna)

    const modal = document.getElementById('modal');
    modal.innerHTML = `
    <section class="modal" id= "modal">
    <div>
        <span id="modal-close">&times;</span>
        <h1>Primera sección</h1>
        <div class="slider">
            <input type="radio" name="slider" id="radio-1" checked>
            <input type="radio" name="slider" id="radio-2">
            <input type="radio" name="slider" id="radio-3">

            <label for="radio-1" id="card-1" class="card-container">
                <div class="card">
                    
                    <img src="imagenes/assets/images/lucerna.jpg." alt="Principal">
                    <h2>Misión</h2>
                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Adipiscing tortor ultricies ipsum et urna posuere pellentesque vestibulum</p>
                </div>
              
            </label>
            <label for="radio-2" id="card-2" class="card-container">
                <div class="card">
                    <img src="imagenes/assets/images/nueva_esperanza.png" alt="Activos">
                    <h2>Visión</h2>
                    <p>Actualmente contamos con 50 miembros activos </p>
                </div>
            </label>
            <label for="radio-3" id="card-3" class="card-container">
                <div class="card">
                    <img src="imagenes/assets/images/revolucion.jpg" alt="Monteria">
                    <h2>Valores</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                         Adipiscing tortor ultricies ipsum et
                          urna posuere pellentesque vestibulum.</p>
                </div>
            </label>
        

        </div>
    </div>
</section>
    `
 

    const closeButton = document.getElementById('modal-close')
    closeButton.addEventListener('click', () => {
        
        modal.classList.remove('visible');
        modal.classList.toggle('hidden');
    
    
       
    })

  




}
const infopn =  () => {
   
    const lucerna = document.getElementsByClassName('lucerna');
    console.log(lucerna)

    const modal = document.getElementById('modal');
    modal.innerHTML = `
    <section class="modal" id= "modal">
    <div>
        <span id="modal-close">&times;</span>
        <h1>Seccion 2</h1>
        <div class="slider">
            <input type="radio" name="slider" id="radio-1" checked>
            <input type="radio" name="slider" id="radio-2">
            <input type="radio" name="slider" id="radio-3">

            <label for="radio-1" id="card-1" class="card-container">
                <div class="card">
                    
                    <img src="imagenes/assets/images/palomas.jpg." alt="Palomas">
                    <h2>Palomas</h2>
                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Adipiscing tortor ultricies ipsum et urna posuere pellentesque vestibulum</p>
                </div>
              
            </label>
            <label for="radio-2" id="card-2" class="card-container">
                <div class="card">
                    <img src="imagenes/assets/images/colocio.jpg" alt="Activos">
                    <h2>Colosio</h2>
                    <p>Actualmente contamos con 50 miembros activos </p>
                </div>
            </label>
            <label for="radio-3" id="card-3" class="card-container">
                <div class="card">
                    <img src="imagenes/assets/images/santa_clara.jpg" alt="seccion">
                    <h2>Santa Clara</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                         Adipiscing tortor ultricies ipsum et
                          urna posuere pellentesque vestibulum.</p>
                </div>
            </label>
        

        </div>
    </div>
</section>
    `
 

    const closeButton = document.getElementById('modal-close')
    closeButton.addEventListener('click', () => {
        
        modal.classList.remove('visible');
        modal.classList.toggle('hidden');
    
    
       
    })

  




}


const infosur =  () => {
   
    const lucerna = document.getElementsByClassName('lucerna');
    console.log(lucerna)

    const modal = document.getElementById('modal');
    modal.innerHTML = `
    <section class="modal" id= "modal">
    <div>
        <span id="modal-close">&times;</span>
        <h1>Primera sección</h1>
        <div class="slider">
            <input type="radio" name="slider" id="radio-1" checked>
            <input type="radio" name="slider" id="radio-2">
            <input type="radio" name="slider" id="radio-3">

            <label for="radio-1" id="card-1" class="card-container">
                <div class="card">
                    
                    <img src="imagenes/assets/images/palaco.jpg." alt="palaco">
                    <h2>Palaco</h2>
                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Adipiscing tortor ultricies ipsum et urna posuere pellentesque vestibulum</p>
                </div>
              
            </label>
            <label for="radio-2" id="card-2" class="card-container">
                <div class="card">
                    <img src="imagenes/assets/images/pueblo_nuevo.jpg" alt="Activos">
                    <h2>Pueblo nuevo</h2>
                    <p>Una de las principales rutas</p>
                </div>
            </label>
            <label for="radio-3" id="card-3" class="card-container">
                <div class="card">
                    <img src="imagenes/assets/images/mayos.jpg" alt="Mayos">
                    <h2>Mayos</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                         Adipiscing tortor ultricies ipsum et
                          urna posuere pellentesque vestibulum.</p>
                </div>
            </label>
        

        </div>
    </div>
</section>
    `
 

    const closeButton = document.getElementById('modal-close')
    closeButton.addEventListener('click', () => {
        
        modal.classList.remove('visible');
        modal.classList.toggle('hidden');
    
    
       
    })

  




}
   
const infoPrincipal =  () => {
   

    modal.innerHTML = `
    <div>
        <span id="modal-close">&times;</span>
        <h1>Nuestra cultura</h1>
        <div class="slider">
            <input type="radio" name="slider" id="radio-1" checked>
            <input type="radio" name="slider" id="radio-2">
            <input type="radio" name="slider" id="radio-3">

            <label for="radio-1" id="card-1" class="card-container">
                <div class="card">
                    
                    <img src="imagenes/assets/images/urc.png." alt="Principal">
                    <h2>Misión</h2>
                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Adipiscing tortor ultricies ipsum et urna posuere pellentesque vestibulum</p>
                </div>
              
            </label>
            <label for="radio-2" id="card-2" class="card-container">
                <div class="card">
                    <img src="imagenes/assets/images/vision.jpg" alt="Activos">
                    <h2>Visión</h2>
                    <p>Actualmente contamos con 50 miembros activos </p>
                </div>
            </label>
            <label for="radio-3" id="card-3" class="card-container">
                <div class="card">
                    <img src="imagenes/assets/images/valores.jpg" alt="valores">
                    <h2>Valores</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                         Adipiscing tortor ultricies ipsum et
                          urna posuere pellentesque vestibulum.</p>
                </div>
            </label>
        

        </div>

        <button class="contact-btn" id="add_button" onclick="nuevo()"> Mensaje </button>
    </div>
</section>
  

    `
 

    const closeButton = document.getElementById('modal-close')
    closeButton.addEventListener('click', () => {
        
        modal.classList.remove('visible');
        modal.classList.toggle('hidden');
    
    
    })

  




}

$(document).on("click","#add_button", function(){

    
    for (let i = 0; i < buttons_select.length; i++) {
        modal.classList.add('hidden');

        buttons_select.item(i).addEventListener('click', openModalContact);
           
   
    }
  
    });

   

function guardaryeditar(e){
    e.preventDefault();
    var formData = new FormData($("#oferente_form")[0]);
    $.ajax({
        url: "controllers/usuario.php?op=insert_comentario",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data){
            alert('Se ha enviado correctamente, en breve uno de nuestros Asociados se pondra en contacto con usted.');
            closeModalFade();

        }
    });


}



for (let i = 0; i < buttons.length; i++) {
    buttons.item(i).addEventListener('click', openModal);

}




closeButtonModal.addEventListener('click', closeModalFade);

window.onclick = (evt) => {
    if (evt.target.classList == "modal") {
        closeModal();
    } else if (evt.target.classList == "modal-fade") {
        closeModalFade();
}

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


init();

