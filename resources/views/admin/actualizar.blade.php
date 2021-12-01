@extends('admin.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Actualizar artículo</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.articulos') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" required>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Descripción</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description"  required>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('price_min') ? ' has-error' : '' }}">
                            <label for="price_min" class="col-md-4 control-label">Precio mínimo</label>

                            <div class="col-md-6">
                            <?php
                                echo Form::selectRange('number_min', 1, 50);
                            ?>

                                @if ($errors->has('price_min'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price_min') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('price_max') ? ' has-error' : '' }}">
                            <label for="price_max" class="col-md-4 control-label">Precio máximo</label>

                            <div class="col-md-6">
                            <?php
                                echo Form::selectRange('number_max', 2, 100);
                            ?>

                                @if ($errors->has('price_max'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price_max') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('color_name') ? ' has-error' : '' }}">
                            <label for="color_name" class="col-md-4 control-label">Color</label>

                            <div class="col-md-6">
                            <?php
                                echo Form::select('color_name', ['Blanco' => 'Blanco', 'Azual' => 'Azul', 'Amarillo' => 'Amarillo', 'Rojo' => 'Rojo', 'Verde' => 'Verde', 'Ocre' => 'Ocre', 'Violeta' => 'Violeta']);
                            ?>
                            

                                @if ($errors->has('color_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('color_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('weight') ? ' has-error' : '' }}">
                            <label for="weight" class="col-md-4 control-label">Peso</label>

                            <div class="col-md-6">
                            <?php
                                echo Form::select('weight', ['0.25' => '0,25 kg', '0.50' => '0,50 kg', '1' => '1 kg', '2' => '2 kg', '5' => '5 kg', '25' => '25 kg']);
                            ?>

                                @if ($errors->has('weight'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('weight') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('size') ? ' has-error' : '' }}">
                            <label for="size" class="col-md-4 control-label">Tamaño</label>
                            <div class="col-md-6">


                            <?php
                                echo Form::select('size', [1,1]);
                            ?>
                        
                        
                                @if ($errors->has('size'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('size') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('family_id') ? ' has-error' : '' }}">
                            <label for="family_id" class="col-md-4 control-label">Familia</label>

                            <div class="col-md-6">
                            <?php
                                echo Form::select('family_id', [1,1]);
                            ?>

                                @if ($errors->has('family_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('family_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Actualizar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection