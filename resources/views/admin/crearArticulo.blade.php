@extends('admin.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Crear artículo</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.aniadir') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control" name="nombre" required>

                                @if ($errors->has('nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
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
                                echo Form::select('color_name', ['Blanco' => 'Blanco', 'Azul' => 'Azul', 'Amarillo' => 'Amarillo', 'Rojo' => 'Rojo', 'Verde' => 'Verde', 'Ocre' => 'Ocre', 'Violeta' => 'Violeta']);
                            ?>
                            

                                @if ($errors->has('color_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('color_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('weight') ? ' has-error' : '' }}">
                            <label for="weight" class="col-md-4 control-label">
                            Peso
                            <?php  
                                echo Form::radio('peso/tamanio', 'value1',true);
                            ?>
                            </label>

                            <div class="col-md-6">
                            <?php
                                echo Form::select('peso', ['0.25' => '0,25 kg', '0.50' => '0,50 kg', '1' => '1 kg', '2' => '2 kg', '5' => '5 kg', '25' => '25 kg']);
                            ?>

                                @if ($errors->has('weight'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('weight') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('size') ? ' has-error' : '' }}">
                        <?php  
                                echo Form::radio('peso/tamanio', 'value2');
                            ?>
                            <label for="size" class="col-md-4 control-label">Tamaño</label></br>
                            <div class="col-md-6">
                            
                            <label for="size" class="col-md-4 control-label">Número
                            <?php  
                                echo Form::radio('name', 'numero');
                                echo Form::select('numero', ['1'=>'nº1','2'=>'nº2','3'=>'nº3']);
                            ?>
                            </label></br></br></br>
                            <label for="size" class="col-md-4 control-label">Valor
                            <?php
                                echo Form::radio('name', 'valor');
                                echo Form::select('valor', ['3'=>'3cm','5'=>'5cm','10'=>'10cm','20'=>'20cm','30'=>'30cm']);
                            ?>
                            </label></br></br></br>
                            
                            
                            
                            <label for="size" class="col-md-4 control-label">Compuesto
                            <?php
                                echo Form::radio('name', 'compuesto');
                            ?>
                            </label></br>
                            <label for="size" class="col-md-4 control-label">Ancho
                            <?php
                                echo Form::select('ancho', ['5'=>'5cm','10'=>'10cm','15'=>'15cm','20'=>'20cm','30'=>'30cm','50'=>'50cm','60'=>'60cm']);
                            ?>
                            </label>
                            <label for="size" class="col-md-4 control-label">Alto
                            <?php   
                                echo Form::select('alto', ['0.25'=>'0.25cm','0.5'=>'0.5cm','1'=>'1cm','2'=>'2cm','5'=>'5cm','25'=>'25cm']);
                            ?>
                            </label>
                        
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
                                <select class="form-control select2" id="family_id" name="family">
                                @foreach ($familias as $familia)
                                    <option value="{{$familia->id}}">{{ $familia->name}}</option>
                                @endforeach
                                </select>

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
                                    Crear
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