@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Añadir un cantante </div>

                @include('shared.messages') 

                <div class="card-body">

                    <form action="{{ route('cantantes.new') }}" method="post">
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

                        <button type="submit" class="btn btn-default">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

