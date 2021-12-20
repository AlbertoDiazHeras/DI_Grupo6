@extends('usuarios.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Empresa</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="{{ route('actualizar.empresa') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('cod') ? ' has-error' : '' }}">
                            <label for="cod" class="col-md-4 control-label">Código</label>

                            <div class="col-md-6">
                                <input id="cod" type="text" class="form-control" name="cod" value="{{ $company->id}}"  required>

                                @if ($errors->has('cod'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cod') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $company->name}}" required>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                            <label for="direccion" class="col-md-4 control-label">Dirección</label>

                            <div class="col-md-6">
                                <input id="direccion" type="text" class="form-control" name="direccion" value="{{ $company->address}}" required>

                                @if ($errors->has('direccion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('direccion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('poblacion') ? ' has-error' : '' }}">
                            <label for="poblacion" class="col-md-4 control-label">Población</label>

                            <div class="col-md-6">
                                <input id="poblacion" type="text" class="form-control" name="poblacion" value="{{ $company->city}}" required>

                                @if ($errors->has('poblacion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('poblacion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cif') ? ' has-error' : '' }}">
                            <label for="cif" class="col-md-4 control-label">C.I.F</label>

                            <div class="col-md-6">
                                <input id="cif" type="text" class="form-control" name="cif" value="{{ $company->cif}}" required>

                                @if ($errors->has('cif'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cif') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('persona') ? ' has-error' : '' }}">
                            <label for="persona" class="col-md-4 control-label">Persona de contacto</label>

                            <div class="col-md-6">
                                <input id="persona" type="text" class="form-control" name="persona" value="{{$persona}}" disabled>

                                @if ($errors->has('persona'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('persona') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cargo') ? ' has-error' : '' }}">
                            <label for="cargo" class="col-md-4 control-label">Cargo</label>

                            <div class="col-md-6">
                                <input id="cargo" type="text" class="form-control" name="cargo" value="Gerente" disabled>

                                @if ($errors->has('cargo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cargo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo electrónico</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{ $company->email}}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tlf') ? ' has-error' : '' }}">
                            <label for="tlf" class="col-md-4 control-label">Teléfono</label>

                            <div class="col-md-6">
                                <input id="tlf" type="text" class="form-control" name="tlf" value="{{ $company->phone}}" required>

                                @if ($errors->has('tlf'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tlf') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('plazo') ? ' has-error' : '' }}">
                            <label for="plazo" class="col-md-4 control-label">Plazo de entrega</label>

                            <div class="col-md-6">
                            <select class="form-control" name="plazo" id="plazo" required>
                            <option value="">Elige plazo</option>
                            @foreach($entrega as $ent)
                                <option value="{{$ent->description}}">{{$ent->description}}</option>
                            @endforeach
                            </select>

                                @if ($errors->has('plazo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('plazo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('portes') ? ' has-error' : '' }}">
                            <label for="portes" class="col-md-4 control-label">Portes</label>

                            <div class="col-md-6">
                            <select class="form-control" name="portes" id="portes" required>
                            <option value="">Elige precio</option>
                            @foreach($prices as $price)
                                <option value="{{$price->price}}">{{$price->price}}</option>
                            @endforeach
                            </select>
                                @if ($errors->has('portes'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('portes') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('condiciones') ? ' has-error' : '' }}">
                            <label for="condiciones" class="col-md-4 control-label">Condiciones de pago</label>

                            <div class="col-md-6">
                            <select class="form-control" name="condiciones" id="condiciones" required>
                            <option value="">Elige condición</option>
                            @foreach($condicion as $con)
                                <option value="{{$con->description}}">{{$con->description}}</option>
                            @endforeach
                            </select>

                                @if ($errors->has('condiciones'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('condiciones') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('entidad') ? ' has-error' : '' }}">
                            <label for="entidad" class="col-md-4 control-label">Entidad bancaria</label>

                            <div class="col-md-6">
                            <select class="form-control" name="entidad" id="entidad" required>
                            <option value="">Elige entidad</option>
                            @foreach($entidad as $ent)
                                <option value="{{$ent->name}}">{{$ent->name}}</option>
                            @endforeach
                            </select>

                                @if ($errors->has('entidad'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('entidad') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('descuento') ? ' has-error' : '' }}">
                            <label for="descuento" class="col-md-4 control-label">Descuentos</label>

                            <div class="col-md-6">
                            <select class="form-control" name="descuento" id="descuento" required>
                            <option value="">Elige descuento</option>
                            @foreach($descuento as $des)
                                <option value="{{$des->name}}">{{$des->name}}</option>
                            @endforeach
                            </select>

                                @if ($errors->has('descuento'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('descuento') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Actualizar empresa
                                </button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="" class="btn btn-primary">
                                    Crear PDF ficha de la empresa
                                </button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="" class="btn btn-primary">
                                    Crear PDF ficha de productos
                                </button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="" class="btn btn-primary">
                                    Enviar PFDs
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop