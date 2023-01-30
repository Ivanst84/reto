
<?php
  /* Llamamos al archivo de conexion.php */
  require_once("config/conexion.php");
 
?>
<style >
	@import url('https://fonts.googleapis.com/css2?family=Lato:wght@100;300;700&display=swap');

:root {
    --text-color: #000;
    --purple: #A51984;
    --green: #6FB43F;
    --yellow: #FFC324;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html {
    font-size: 62.5%;
    scroll-behavior: smooth;
}

body {
    position: fixed;
    width: 100%;
    height: 100%;
    font-family: 'Lato', sans-serif;
    display: grid;
    grid-template-columns: 60% 40%;
    grid-template-rows: 20% 50% 30%;
    grid-template-areas: "nav     aside"
                         "main    aside"
                         "footer  aside";
    overflow-x: hidden;
}

header {
    grid-area: nav;
    background-color: #fff;
    display: flex;
    flex-direction: row;
    align-items: center;
    padding: 60px;

    animation: 2s navbar .5s ease-in-out;
}

.logo {
    display: block;
    width: 70px;
    height: 65px;
    cursor: pointer;
}

header nav {
    margin-left: 24px;
}

header nav a {
    margin-right: 20px;
    font-size: 2rem;
    color: var(--text-color);
    text-decoration: none;
}

header nav a:hover {
    color: var(--green);
}

@keyframes navbar {
    from {
        transform: translateY(-200px);
    }

    to {
        transform: translateY(0);
    }
}

main {
    grid-area: main;
    width: 540px;
    padding: 60px;
    display: flex;
    flex-direction: column;
    justify-content: center;

    animation: 2s main .5s ease-in-out;
}

@keyframes main {
    from {
        transform: translateY(-600px);
    }

    to {
        transform: translateY(0);
    }
}

main div {
    width: min-content;
    text-align: center;
    margin-bottom: 24px;
}

main div h3 {
    font-size: 2.4rem;
    font-weight: 300;
    margin-bottom: -10px;
}

main div h1 {
    font-size: 2rem;
    font-weight: 700;
}

main p {
    font-size: 1.6rem;
    color: grey;
}

.side {
    position: relative;
    grid-area: aside;
    display: grid;
    align-items: center;
    grid-template-columns: repeat(6, 1fr);
}

.side h2 {
    grid-column: 1 / 2;
    grid-row: auto;
    width: max-content;
    font-size: 3rem;
    font-weight: 300;
    transform: rotate(-90deg);
    animation: side-text .5s 2.5s ease-in-out forwards;
    opacity: 0;
}

.card {
    position: relative;
    width: 100%;
    height: 380px;
    background-color: white;
    box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    text-align: center;
}

.card img {
    width: 100%;
    height: 200px;
}

.card h2 {
    margin: 14px 0;
    font-size: 2rem;
}

.card p {
    font-size: 1.6rem;
    color: grey;
}

.card button,
.contact-btn {
    position: absolute;
    width: 90%;
    left: 50%;
    transform: translate(-50%);
    bottom: 16px;
    padding: 8px 0;
    font-size: 1.7rem;
    font-weight: 700;
    color: var(--purple);
    background-color: transparent;
    border: 2px solid var(--purple);
    cursor: pointer;
}

.card button:hover {
    color: #fff;
    background-color: var(--purple);
}

.side > .card {
    width: 100%;
    height: 500px;
    grid-column: 2 / 6;
    transition: transform .5s;

    animation: 2s side-image 1s ease-in-out;
}

.side > .card:hover {
    transform: scale(1.1);
}

@keyframes side-image {
    from {
        transform: translateX(600px);
    }

    to {
        transform: translateX(0);
    }
}

.side > .card > p {
    padding: 0 16px;
    margin-top: 14px;
}

@keyframes side-text {
    from {opacity: 0;}
    to {opacity: 1;}
}

.side > .item {
    position: absolute;
    width: 100%;
    height: 100%;
    grid-column: 4 / 7;
    grid-row: 1 / 2;
    background-color: var(--yellow);
    z-index: -1;
}

footer {
    grid-area: footer;
    width: 100%;
    display: flex;
    flex-direction: row;
    gap: 20px;
    padding: 20px;
    border-radius: 0 25px 0 0;
    background-color: var(--yellow);

    animation: 2s footer .5s ease-in-out forwards;
}

@keyframes footer {
    from {
        transform: translateY(600px);
    }

    to {
        transform: translateY(0);
    }
}

footer .card {
    transition: transform 1s;
}

footer .card:hover {
    transform: translateY(-220px);
}

footer .card img {
    height: 160px;
}

.loader {
    width: 100%;
    height: 100%;
    position: absolute;
    left: 0;
    top: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: white;
    animation: loaded 2s forwards;
    z-index: 1;
}

@keyframes loaded {
    0% {
        opacity: 1;
    }

    90% {
        opacity: 1;
    }

    100% {
        opacity: 0;
        visibility: hidden;
    }
}

.loader-item {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    animation: scaling 2s linear infinite forwards;
}

.loader-item:nth-child(1) {
    background-color: var(--purple);
    animation-delay: 200ms;
}

.loader-item:nth-child(2) {
    background-color: var(--yellow);
    animation-delay: 400ms;
}

.loader-item:nth-child(3) {
    background-color: var(--green);
    animation-delay: 600ms;
}

@keyframes scaling {
    0%, 100% {
        transform: scale(1);
    }

    50% {
        transform: scale(.2);
    }
}
.form-group {
  margin-bottom: 1rem;
}

@media (min-width: 992px) {
  .col-lg-1,
  .col-lg-2,
  .col-lg-3,
  .col-lg-4,
  .col-lg-5,
  .col-lg-6,
  .col-lg-7,
  .col-lg-8,
  .col-lg-9,
  .col-lg-10,
  .col-lg-11,
  .col-lg-12 {
    float: left;
  }
  
.modal.fade .modal-dialog {
  transition: transform 0.3s ease-out;
  transform: translate(0, -25%);
}
.modal.show .modal-dialog {
  transform: translate(0, 0);
}

.modal-open .modal {
  overflow-x: hidden;
  overflow-y: auto;
}

.modal-dialog {
  position: relative;
  width: auto;
  margin: 10px;
}

.modal-content {
  position: relative;
  display: flex;
  flex-direction: column;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid rgba(0, 0, 0, 0.2);
  border-radius: 0.3rem;
  outline: 0;
}

.modal-backdrop {
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 1040;
  background-color: #000;
}
.modal-backdrop.fade {
  opacity: 0;
}
.modal-backdrop.show {
  opacity: 0.5;
}

.modal-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 15px;
  border-bottom: 1px solid #e9ecef;
}

.modal-title {
  margin-bottom: 0;
  line-height: 1.5;
}

.modal-body {
  position: relative;
  flex: 1 1 auto;
  padding: 15px;
}

.modal-footer {
  display: flex;
  align-items: center;
  justify-content: flex-end;
  padding: 15px;
  border-top: 1px solid #e9ecef;
}
.modal-footer > :not(:first-child) {
  margin-left: .25rem;
}
.modal-footer > :not(:last-child) {
  margin-right: .25rem;
}

.modal-scrollbar-measure {
  position: absolute;
  top: -9999px;
  width: 50px;
  height: 50px;
  overflow: scroll;
}

@media (min-width: 576px) {
  .modal-dialog {
    max-width: 500px;
    margin: 30px auto;
  }
  .modal-lg
  {max-width:800px}
  .modal-sm {
    max-width: 300px;
  }
}
@media (min-width: 992px) {
  .modal-lg {
    width: 90%;
    max-width: 800px !important;
  }
}

.form-control-label {
    margin-bottom: 8px;
    text-transform: uppercase;
    font-size: 11px;
    letter-spacing: 0.5px;
    display: block;
  }

  .form-control {
    border: 0;
    padding: 0;
    background-color: transparent;
    color: $gray-800;
    @include border-radius(0);
    font-weight: 500;
  }

  .select2-container--default {
    .select2-selection--single {
      background-color: transparent;
      border-color: transparent;
      height: auto;

      .select2-selection__rendered {
        padding: 0;
        font-weight: 500;
      }

      .select2-selection__arrow { height: 26px; }
    }
  }
}

/***** FORM LAYOUT 3 *****/
.form-layout-3 {
  .form-control { font-weight: 400; }

  .select2-container--default {
    .select2-selection--single {
      .select2-selection__rendered {
        font-weight: 400;
      }
    }
  }
}

/***** FORM LAYOUT 4 & 5 *****/
.form-layout-4,
.form-layout-5 {
  padding: 30px;
  border: 1px solid $gray-400;

  .form-control-label {
    display: flex;
    align-items: center;
    margin-bottom: 0;
  }
}

/***** FORM LAYOUT 5 *****/
.form-layout-5 {
  .form-control-label {
    @include media-breakpoint-up(sm) {
      justify-content: flex-end;
    }
  }
}

/***** FORM LAYOUT 6 & 7 *****/
.form-layout-6,
.form-layout-7 {
  .row {
    > div {
      border: 1px solid $gray-400;
      padding: 15px 20px;

      &:first-child {
        display: flex;
        align-items: center;
        background-color: $gray-100;
        border-right-width: 0;

        font-size: 12px;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.5px;
      }
    }

    + .row {
      > div { border-top-width: 0; }
    }
  }

  .form-control {
    border: 0;
    @include border-radius(0);
    padding: 0;
  }
}

/***** FORM LAYOUT 7 *****/
.form-layout-7 {
  .row > div:first-child { justify-content: flex-end; }
}


.modal {
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    position: absolute;
    z-index: 1;
    justify-content: center;
    align-items: center;
}
.modal-fade{
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    position: absolute;
    z-index: 1;
    justify-content: center;
    align-items: center;
}

.modal > div {
    position: relative;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    width: 700px;
    height: auto;
    background-color: #fff;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 20px;
    text-align: center;
    z-index: 2;
}

.modal > div span {
    position: absolute;
    right: 10px;
    top: 0;
    font-size: 3rem;
    font-weight: 700;
    color: var(--purple);
    cursor: pointer;
}

.modal > div h1 {
    font-size: 2.6rem;
    margin-bottom: 30px;
}

.modal > div .slider {
    width: 90%;
    height: 340px;
    transform-style: preserve-3d;
    position: relative;
}

.modal > div .slider .card-container {
    position: absolute;
    left: 0;
    right: 0;
    margin: 0 auto;
    width: 50%;
    height: 100%;
    display: grid;
    place-items: center;
    cursor: pointer;
    transition: transform .5s;
}

.modal > div .card{
    width: 220px;
    height: auto;
    padding-bottom: 16px;
    margin-bottom: 30px;
}

.modal > div .card img {
    height: 140px;
}

.modal > div .card button {
    display: none;
}

.modal > div > button {
    position: static;
    transform: translate(0);
    width: 260px;
    color: var(--yellow);
    border-color: var(--yellow);
}

.modal > div > button:hover {
    background-color: var(--yellow);
    color: #fff;
}

#radio-1, #radio-2, #radio-3 {
    display: none;
}

#radio-1:checked ~ #card-1,
#radio-2:checked ~ #card-2,
#radio-3:checked ~ #card-3 {
    transform: translateX(0) scale(1);
    opacity: 1;
    z-index: 1;
}

#radio-1:checked ~ #card-2,
#radio-2:checked ~ #card-3,
#radio-3:checked ~ #card-1 {
    transform: translateX(40%) scale(0.8);
    opacity: 0.5;
    z-index: 0;
}

#radio-1:checked ~ #card-3,
#radio-2:checked ~ #card-1,
#radio-3:checked ~ #card-2 {
    transform: translateX(-40%) scale(0.8);
    opacity: 0.5;
    z-index: 0;
}



.hidden {
    display: none;
}

@media (max-width: 420px) {
    body {
        position: static;
        display: block;
        overflow-x: hidden;
    }
    header {
        padding: 20px;
        display: block;
    }
    .logo {
        width: 90px;
        height: 85px;
        margin: 0 auto;
        margin-bottom: 16px;
    }
    header nav {
        margin-left: 0;
        text-align: center;
    }
    main {
        width: 100%;
        padding: 20px;
    }
    main div {
        width: 100%;
    }
    .side {
        display: block;
        padding: 20px;
    }
    .side h2 {
        transform: rotate(0deg);
        width: 100%;
        text-align: center;
        margin-bottom: 14px;
    }
    .side > .card:hover {
        transform: scale(1);
    }
    .side > .item {
        display: none;
    }
    footer {
        display: flex;
        flex-direction: column;
        justify-content: center;
        border-radius: 0;
        background-color: #fff;
    }
    footer .card {
        width: 280px;
        margin: 0 auto;
    }
    footer .card:hover {
        transform: translate(0);
    }
    .modal {
        position: fixed;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
    }
    .modal > div {
        width: 90%;
    }
    .modal > div .slider .card-container {
        width: 85%;
    }
}

</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URC</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;700&display=swap" rel="stylesheet"> 
</head>
<body>

    <header>
        <img onclick="location.reload()" class="logo" src="imagenes/assets/images/urc.png" alt="Urc Logo">
        <nav>
            <a href="#">Inicio</a>
            <a href="login/index.php">Acceder</a>
        </nav>
    </header>
    <main>
        <div>
            <h3>Página oficial de</h3>
            <p></p>
            <h1>URC</h1>
        </div>
        <p>Página dedicada a todo lo relevante de la Union Revolucionaria De Comerciantes En Mercado Sobre Ruedas.</p>
    </main>
    <section class="side">
        <h2>Nosotros</h2>
        <div class="card card--main principal" id="principal" >
            <img src="imagenes/assets/images/pueblo_nuevo.jpg" alt="Pueblo nuevo">
            <p class="card__description">La Asociación Unión Revolucionaria de mercado 
                sobre ruedas surge en el seno de los movimientos de comerciantes a finales del 2017. 
                Se basa principalmente en la representación y defensa de los derechos de los comerciantes 
                ante el departamento de comercio ambulante.</p>
                <button class="contact-btn" id="add_button" onclick="nuevo()"> Mensaje </button>
        </div>
        <div class="item"></div>
    </section>
   
   
    <section class="modal hidden" id= "modal">
    <section class="modal" id= "modal">
    <div >
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
    </section>




    <div class="loader">
        <div class="loader-item"></div>
        <div class="loader-item"></div>
        <div class="loader-item"></div>
    </div>
    <footer>
        <div class=" card lucerna" id="button" onclick="infoLucerna()">
            <img src="imagenes/assets/images/oriente.jpg" alt="Oriente">
            <h2>Oriente</h2>
            <p>Sección oriente conformada por rutas  de mercado sobre ruedas como Lucerna, Nueva Esperanza y  Revolución.</p>
            <button class="card__btn">Mas</button>
        </div>
        <div class=" card sur" id="button" onclick="infopn()">
            <img src="imagenes/assets/images/poniente.jpg" alt="Ponienter">
            <h2>Poniente </h2>
            <p class="card__description">Se conforma por las rutas  de mercado sobre ruedas   como Palomas, Santa Clara, Colosio.</p>
            <button class="card__btn">Mas</button>
        </div>
        <div class=" card sur" id="button" onclick="infosur()">
            <img src="imagenes/assets/images/sur.jpg" alt="Sur">
            <h2>Sur</h2>
            <p>La sección sur esta conformada por las rutas de  fin de semana como  Pueblo nuevo, Palacio y Mayos.</p>
            <button class="card__btn">Mas</button>

        </div>
   
     
    </footer>
    



    <?php require_once("modalContacto.php"); ?>






    <?php require_once("view/html/MainJs.php"); ?>
   <script type="text/javascript" src="index.js"></script>


  


</body>

</html>
