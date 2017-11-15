  <div class="form-group{{ $errors->has('Serie') ? ' has-error' : '' }}">
                            <label for="Serie" class="col-md-4 control-label">Serie</label>

                            <div class="col-md-6">
                                <input id="Serie" type="text" class="form-control" name="Serie" value="{{ old('Serie') }}" required autofocus>    
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('Marca') ? ' has-error' : '' }}">
                            <label for="Marca" class="col-md-4 control-label">Marca</label>

                            <div class="col-md-6">
                                <input id="Marca" type="text" class="form-control" name="Marca" value="{{ old('Marca') }}" required autofocus>                               
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('Modelo') ? ' has-error' : '' }}">
                            <label for="Modelo" class="col-md-4 control-label">Modelo</label>

                            <div class="col-md-6">
                                <input id="Modelo" type="text" class="form-control" name="Modelo" value="{{ old('Modelo') }}" required autofocus>                               
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('EstadoUtilizacion') ? ' has-error' : '' }}">
                            <label for="EstadoUtilizacion" class="col-md-4 control-label">Estado de Utilización</label>

                            <div class="col-md-6">
                                <input id="EstadoUtilizacion" type="text" class="form-control" name="EstadoUtilizacion" value="{{ old('EstadoUtilizacion') }}" required>                               
                            </div>  
                        </div>

                        

                        <div class="form-group{{ $errors->has('EstadoFisico') ? ' has-error' : '' }}">
                            <label for="EstadoFisico" class="col-md-4 control-label">Estado Físico</label>

                            <div class="col-md-6">
                                <input id="EstadoFisico" type="text" class="form-control" name="EstadoFisico" value="{{ old('EstadoFisico') }}" required>
                            </div>
                        </div>

                        
                        <div class="form-group{{ $errors->has('EstadoActivo') ? ' has-error' : '' }}">
                            <label for="EstadoActivo" class="col-md-4 control-label">Estado Activo</label>

                            <div class="col-md-6">
                                <input id="EstadoActivo" type="text" class="form-control" name="EstadoActivo" value="{{ old('EstadoActivo') }}" required>
                            </div>
                        </div>