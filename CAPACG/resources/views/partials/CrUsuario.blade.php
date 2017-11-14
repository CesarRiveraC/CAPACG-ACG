                    <div class="form-group{{ $errors->has('Nombre') ? ' has-error' : '' }}">
                            <label for="Nombre" class="col-md-4 control-label">Cédula</label>

                            <div class="col-md-6">
                                <input id="Nombre" type="text" class="form-control" name="Nombre" value="{{ $colaborador->Nombre }}" required autofocus>    
                            </div>
                        </div>

                    <div class="form-group{{ $errors->has('Apellido') ? ' has-error' : '' }}">
                            <label for="Apellido" class="col-md-4 control-label">Apellido</label>

                            <div class="col-md-6">
                                <input id="Apellido" type="text" class="form-control" name="Apellido" value="{{ $colaborador->Apellido }}" required autofocus>    
                            </div>
                        </div>

                    <div class="form-group{{ $errors->has('Nombre') ? ' has-error' : '' }}">
                            <label for="Email" class="col-md-4 control-label">Correo Electronico</label>

                            <div class="col-md-6">
                                <input id="Email" type="text" class="form-control" name="Email" value="{{ $colaborador->Email }}" required autofocus>    
                            </div>
                        </div>

