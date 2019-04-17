
@extends('layouts.app')
    @php
        function sortFood($a,$b)
        {
            return strcmp($a->category, $b->category);
        }
        $comidasByCategory = $comidas->all();
        uasort($comidasByCategory,'sortFood');
        $aux = '';
    @endphp
@section('content')
<div class="container pt-4">

    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header text-black-50 font-weight-bold text-center">Menú</div>

                <div class="card-body">
                    <div class="row  justify-content-around align-items-center mt-2">
                        <p class="col-5 h6 pb-2 m-0 font-weight-bold">Nombre</p>
                        <p class="col-3 h6 pb-2 m-0 font-weight-bold">Precio</p>
                        <p class="col-2 h6 pb-2 m-0 font-weight-bold">Cantidad</p>
                    </div>
                    <form id="form-seleccionar">
                        @foreach ($comidasByCategory as $comida)
                            @if ($comida->category == $aux)
                                <div id="com{{$comida->id}}" class="row  justify-content-around align-items-center mt-2">
                                    <p id="nam{{$comida->id}}" class="col-5 pb-2 m-0">{{$comida->name}}</p>
                                    <p id="pr{{$comida->id}}" class="col-3 pb-2 m-0">{{$comida->price}}$</p>
                                    <div class="col-2 pb-2 m-0">
                                        <input class="form-control w-auto" type="number" name="{{$comida->id}}" id="cant{{$comida->id}}" value="0" min="0" max="50">
                                    </div>
                                </div>
                            @else
                                <h5 class="font-weight-bold text-center text-capitalize py-3">{{$comida->category}}</h5>
                                <div id="com{{$comida->id}}" class="row  justify-content-around align-items-center mt-2">
                                    <p id="nam{{$comida->id}}" class="col-5 pb-2 m-0">{{$comida->name}}</p>
                                    <p id="pr{{$comida->id}}" class="col-3 pb-2 m-0">{{$comida->price}}$</p>
                                    <div class="col-2 pb-2 m-0">
                                        
                                        <input class="form-control w-auto" type="number" name="{{$comida->id}}" id="cant{{$comida->id}}" value="0" min="0" max="50">
                                    </div>

                                </div>
                                
                                @php
                                    $aux = $comida->category;
                                @endphp
                            @endif
                        @endforeach
                        <div class="d-flex mt-4 justify-content-end">
                            <button class="btn btn-danger" id="seleccionar" onclick="event.preventDefault();hola();" type="submit">
                                Seleccionar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-5 mt-3 m-md-0">
            <div class="card">
                <div class="card-header text-black-50 font-weight-bold text-center">Realiza tu Pedido</div>
                <div class="card-body">
                    <p class="text-muted">
                        Nota: Para remover un plato, coloca la cantidad en 0.
                    </p>
                    <div class="row mb-2 font-weight-bold">
                        <p class="col-5 pb-2 m-0">Nombre </p>
                        <p class="col-4 pb-2 m-0">Cantidad </p>
                        <p class="col-3 pb-2 m-0">Precio </p>
                    </div>
                    <form action="">
                        @csrf
                        <div id="confirmar-pedido">
                            No has seleccionado ningún plato
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center pt-5">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-black-50 font-weight-bold text-center">Tus Pedidos</div>

                <div class="card-body">
                    {{Auth::user()->name}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection