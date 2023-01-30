<div id="modalmantenimiento" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bd-0">
            <div class="modal-header pd-y-20 pd-x-25">
                <h6 id="lbltitulo" class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold"></h6>
            </div>
            <!-- Formulario Mantenimiento -->
            <form method="post" id="ruta_form">
            <input type="hidden" name="idRuta" id="idRuta"/>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Nombre de la ruta: <span class="tx-danger">*</span></label>
                            <input class="form-control tx-uppercase" id="nombreRuta" type="text" name="nombreRuta" required/>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Coordinador: <span class="tx-danger">*</span></label>
                            <textarea class="form-control tx-uppercase" id="coordinador" type="text" name="coordinador" required></textarea>
                        </div>
                    </div>
                    
                    
                    <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Turno <span class="tx-danger">*</span></label>
                                <select class="form-control select2" style="width:100%" name="turno" id="turno"
                                    data-placeholder="Seleccione">
                                    <option label="Seleccione"></option>
                                    <option value="M">Matutino</option>
                                    <option value="V">Vespertino</option>
                                </select>
                            </div>
                        </div>


                        
                </div>
                <div class="modal-footer">
                    <button type="submit" name="action" value="add" class="btn btn-outline-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium"><i class="fa fa-check"></i> Guardar</button>
                    <button type="reset" class="btn btn-outline-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" aria-label="Close" aria-hidden="true" data-dismiss="modal"><i class="fa fa-close"></i> Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>