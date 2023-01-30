
<style>
 .btn {
  border: none;
  color: white;
  padding: 14px 28px;
  font-size: 16px;
  cursor: pointer;
}

.success {background-color: #04AA6D;} /* Green */
.success:hover {background-color: #46a049;}

.info {background-color: #2196F3;} /* Blue */
.info:hover {background: #0b7dda;}

.warning {background-color: #ff9800;} /* Orange */
.warning:hover {background: #e68a00;}

.danger {background-color: #f44336;} /* Red */ 
.danger:hover {background: #da190b;}

.default {background-color: #e7e7e7; color: black;} /* Gray */ 
.default:hover {background: #ddd;}

 .form {
  width: 340px;
  height: 440px;
  background: #e6e6e6;
  border-radius: 8px;
  box-shadow: 0 0 40px -10px #000;
  margin: calc(50vh - 220px) auto;
  padding: 20px 30px;
  max-width: calc(100vw - 40px);
  box-sizing: border-box;
  font-family: "Montserrat", sans-serif;
  position: relative;
}
.h2f {
  margin: 10px 0;
  padding-bottom: 10px;
  width: 180px;
  color: #78788c;
  border-bottom: 3px solid #78788c;
}
input {
  width: 100%;
  padding: 10px;
  box-sizing: border-box;
  background: none;
  outline: none;
  resize: none;
  border: 0;
  font-family: "Montserrat", sans-serif;
  transition: all 0.3s;
  border-bottom: 2px solid #bebed2;
}
input:focus {
  border-bottom: 2px solid #78788c;
}
p:before {
  content: attr(type);
  display: block;
  margin: 28px 0 0;
  font-size: 14px;
  color: #5a5a5a;
}
button {
  float: right;
  padding: 8px 12px;
  margin: 8px 0 0;
  font-family: "Montserrat", sans-serif;
  border: 2px solid #78788c;
  background: 0;
  color: #5a5a6e;
  cursor: pointer;
  transition: all 0.3s;
}
button:hover {
  background: #78788c;
  color: #fff;
}
.divf {
  content: "Hi";
  position: absolute;
  bottom: -15px;
  right: -20px;
  background: #50505a;
  color: #fff;
  width: 320px;
  padding: 16px 4px 16px 0;
  border-radius: 6px;
  font-size: 13px;
  box-shadow: 10px 10px 40px -14px #000;
}
.spanf {
  margin: 0 5px 0 15px;
}
.modal-fade >form span {
    position: absolute;
    right: 10px;
    top: 0;
    font-size: 3rem;
    font-weight: 700;
    color: var(--purple);
    cursor: pointer;
}
</style>
<section class= "modal-fade hidden">

<form class="form" method="post" id="oferente_form" name ="oferente_form">
<span class="span fa fa-close-alert" id="close-modal-fade-btn">&times;</span>

  <h2 class = "h2f">Contactanos</h2>
  <p type="Nombre:"   ><input name="usuario" id="usuario"placeholder="Escribe tu nombre .."  minlength="3" maxlength="20" required  value="" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90)
                                     ||(event.charCode == 209 || event.charCode == 241) ||
                                     (event.charCode >= 97 && event.charCode <= 122))" /></input></p>
  <p type="Correo:"><input placeholder="Correo.."   m  value= "" onblur="this.value =Filtro(this.value)"    minlength="3" maxlength="40"  required  /> </input></p>
  <p type="Mensaje:"><input placeholder="Escribe un mensaje"      value= "" onblur="this.value =Filtro(this.value)"    minlength="3" maxlength="40"  required  ></input></p>
  <button  class="btn success" type="submit" name="action" value="add" id="btnactualizar">Enviar</button>
  <div class="divf">

    <span class=" spanf fa fa-phone"></span>686 455 4443
    <span class=" spanf fa fa-envelope-o"></span> urc@gmail.com.com
  </div>
</form>
    </div>
  </div>
</div>
</section>
<div class="pen-footer"><a href="https://www.behance.net/gallery/30478397/Login-Form-UI-Library" target="_blank"><i class="material-icons">arrow_backward</i>View on Behance</a><a href="https://github.com/andyhqtran/UI-Library/tree/master/Login%20Form" target="_blank">View on Github<i class="material-icons">arrow_forward</i></a></div>
