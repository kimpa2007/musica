@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Discos </div>

                <div class="card-body">
                   
                    @include('shared.messages') 

                   @if( ! empty($title))
                        <h2> {{ $title }}</h2>
                    @endif

                    <div class="w-100">
                        <div class="mb-3 float-right">
                            <a class="btn btn-primary" href="{{ route('discos.new') }}">Añadir un disco</a>
                        </div>
                    </div>

                    <div>
                        @if(!$discos->isEmpty())
                            <table class="table table-stripped">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Caracteristica</th>
                                        <th style="width: 100px" ></th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach ($discos as $disco)
                                    <tr>
                                        <td> {{ $disco->nombre }} </td> 
                                        <td> {{ $disco->caracteristica }} </td> 
                                        <td>  
                                            <a class="btn-sm btn-danger" href="{{ route('discos.delete', [ 'id' => $disco->id ] ) }}"><i class="fa fa-trash"></i></a>  
                                            <a class="btn-sm btn-success" href="{{ route('discos.edit', $disco->id) }}">
                                                <i class="fa fa-pen"></i>
                                            </a>
                                        </td> 
                                        
                                        <?php /*<td>    
                                            <a class="btn-sm btn-danger" href="{{ route('book.delete', [ 'id' => $book->id ] ) }}"><i class="fa fa-trash"></i></a>  

                                            
                                        </td>*/?>
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
