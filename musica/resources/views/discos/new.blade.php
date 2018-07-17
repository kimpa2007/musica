@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Añadir un disco </div>

                @include('shared.messages') 

                <div class="card-body">

                    <form action="{{ route('discos.new') }}" method="post">
                        {!! csrf_field() !!}
                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="{{ old('nombre') }}">
                            @if($errors->has('nombre'))
                                <span class="help-block">{{ $errors->first('nombre') }}</span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('caracteristica') ? ' has-error' : '' }}">
                            <label for="caracteristica">Caracteristica</label>
                            <input type="text" class="form-control" id="caracteristica" name="caracteristica" placeholder="Caracteristica" value="{{ old('caracteristica') }}">
                            @if($errors->has('caracteristica'))
                                <span class="help-block">{{ $errors->first('caracteristica') }}</span>
                            @endif
                        </div>

                        
                         <div class="form-group{{ $errors->has('cantantes') ? ' has-error' : '' }}">
                            <label for="cantantes">Cantantes</label>
                          
                            <select multiple class="form-control" id="cantantes" name="cantantes[]">
                                @foreach ($cantantes as $cantante)
                                    <option value="{{ $cantante->id }}">{{ $cantante->nombre }} </option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-default">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

