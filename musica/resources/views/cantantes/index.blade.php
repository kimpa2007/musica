@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cantantes </div>

                <div class="card-body">
                   
                    @include('shared.messages') 

                    <div class="w-100">
                        <div class="mb-3 float-right">
                            <a class="btn btn-primary" href="{{ route('cantantes.new') }}">Añadir un cantante</a>
                        </div>
                    </div>

                    <div>
                        @if(!$cantantes->isEmpty())
                            <table class="table table-stripped">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Caracteristica</th>
                                        <th style="width: 100px" ></th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach ($cantantes as $cantante)
                                    <tr>
                                        <td> {{ $cantante->nombre }} </td> 
                                        <td> {{ $cantante->caracteristica }} </td> 
                                        <td>  

                                             <a class="btn-sm btn-primaru" href="{{ route('discos.bycantante', [ 'id' => $cantante->id ] ) }}">
                                                 VEURE DISCOS
                                             </a> 

                                            <a class="btn-sm btn-danger" href="{{ route('cantantes.delete', [ 'id' => $cantante->id ] ) }}"><i class="fa fa-trash"></i></a> 
                                            <a class="btn-sm btn-success" href="{{ route('cantantes.edit', $cantante->id) }}">
                                                <i class="fa fa-pen"></i>
                                            </a>
                                        </td> 
                                    
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
