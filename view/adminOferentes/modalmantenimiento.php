</div><<div id="modalmantenimiento" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bd-0">

            <div class="modal-header pd-y-20 pd-x-25">
                <h6 id="lbltitulo" class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold"></h6>




            </div>
            <!-- Formulario Mantenimiento -->
           

                <form method="post" id="oferente_form" name ="oferente_form">
                  
                
             <div class="modal-body">
                <input type="hidden" name="id_o" id="id_o" />
                                   

                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group ">
                                <label class="form-control-label">Nombre: <span class="tx-danger">*</span></label>
                                <input class="form-control tx-uppercase"
                                 id="nombre_o" type="text" 
                                 name="nombre_o" 
                                 minlength="3" maxlength="20" required  value="" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90)
                                     ||(event.charCode == 209 || event.charCode == 241) ||
                                     (event.charCode >= 97 && event.charCode <= 122))" />
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Apellido paterno: <span class="tx-danger">*</span></label>
                                <input class="form-control tx-uppercase" id="apellidoP_o" type="text" name="apellidoP_o"
                                minlength="3" maxlength="40" required value=""onkeypress="return (event.charCode == 209 || event.charCode == 241 || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122))" />
                            </div>
                        </div>


                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Apellido materno: <span
                                        class="tx-danger">*</span></label>
                                <input class="form-control tx-uppercase"    id="apellidoM_o" type="text" name="apellidoM_o"
                                value= "" onblur="this.value =Filtro(this.value)"    minlength="3" maxlength="40"  required > </input>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Calle: <span class="tx-danger">*</span></label>
                                <input class="form-control tx-uppercase" id="calle_o" type="text" name="calle_o"
                                minlength="3" maxlength="40"   required   value=""onblur="this.value=Filtro(this.value)" ></input>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Colonia: <span class="tx-danger">*</span></label>
                                <input class="form-control tx-uppercase" id="colonia_o" type="text" name="colonia_o"
                                minlength="3" maxlength="40"      required value="" onblur="this.value=Filtro(this.value)" ></input>
                            </div>
                        </div>


                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">#: <span class="tx-danger">*</span></label>
                                <input class="form-control tx-uppercase" id="numero_o" type="text" name="numero_o"
                                    required onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"  ></input>
                            </div>
                        </div>


                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Sexo: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" style="width:100%" name="sexo_o" id="sexo_o"
                                    data-placeholder="Seleccione">
                                    <option label="Seleccione"></option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Correo: <span class="tx-danger">*</span></label>
                                <input class="form-control tx-uppercase" id="correo_o" type="email" name="correo_o"
                                    required></input>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Telefono: <span class="tx-danger">*</span></label>
                                <input class="form-control tx-uppercase" id="telefono_o" type="text" name="telefono_o"
                                onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"  required></input>
                            </div>
                        </div>

                    </div>


                    <div class="modal-footer">
                        <button type="submit" name="action" value="add"
                            class="btn btn-outline-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium"><i
                                class="fa fa-check"></i> Guardar</button>
                        <button type="reset"
                            class="btn btn-outline-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium"
                            aria-label="Close" aria-hidden="true" data-dismiss="modal"><i class="fa fa-close"></i>
                            Cancelar</button>
                    </div>
                </form>
          </div>
          </div>
    
        </div> 
        
    </div>
 </div>