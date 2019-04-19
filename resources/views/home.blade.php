@extends('layouts.app')

@section('content')
    <div class="container">
        @if(\Session::has('error'))

            <div class="alert alert-danger">
                {{\Session::get('error')}}
            </div>
        
        @else
            <div class="row justify-content-center">
                @if (Auth::user()->is_admin == 1)
                    <div class="col-md-8 mt-4"> 
                        <div class="card">
                            <div class="card-header text-black-50 font-weight-bold">
                                Pedidos
                            </div>
                            <div class="card-body">
                                <div class="accordion" id="accordionUser">
                                    @foreach ($pedidos as $pedido)
                                    @if (!$pedido->is_deliver)
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between align-items-center" id="heading{{$pedido->id}}">
                                                <h2 class="mb-0">
                                                    <button class="btn btn-danger" type="button" data-toggle="collapse" data-target="#collapse{{$pedido->id}}" aria-expanded="true" aria-controls="collapse{{$pedido->id}}">
                                                    {{"Pedido " . "#".$pedido->id}}
                                                    </button>
                                                </h2>
                                            <form method="POST" class="input-group w-auto" action="{{route('pedido.update',$pedido->id)}}">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="dni_user" value="{{Auth::user()->dni}}">

                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Entregado</span>
                                                        <span class="input-group-text">
                                                        <input type="checkbox" name="is_deliver" id="is_deliver{{$pedido->id}}" onclick="is_delivery({{$pedido->id}})">
                                                        </span>
                                                    </div>
                                                    <input type="submit" value="Confirmar" id="submit_env{{$pedido->id}}" class="btn btn-danger disabled">
                                                </form>
                                            </div>
                                        
                                            <div id="collapse{{$pedido->id}}" class="collapse" aria-labelledby="heading{{$pedido->id}}" data-parent="#accordionUser">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="border mb-2">
                                                            <p class="border border-bottom font-weight-bold px-2 m-0">Datos Cliente:</p>
                                                            <p class="px-2 border border-bottom m-0"> <span class="font-weight-bold border-right  pr-1 mr-1">ID: </span> {{$pedido->clientes->id}}</p> 
                                                            <p class="px-2 border border-bottom m-0"> <span class="font-weight-bold border-right  pr-1 mr-1">Cedula: </span> {{$pedido->clientes->dni}}</p> 
                                                            <p class="px-2 border border-bottom m-0"> <span class="font-weight-bold border-right  pr-1 mr-1">Nombre: </span> {{$pedido->clientes->name}}</p> 
                                                            <p class="px-2 border border-bottom m-0"> <span class="font-weight-bold border-right  pr-1 mr-1">Apellido: </span> {{$pedido->clientes->last_name}}</p> 
                                                            <p class="px-2 border border-bottom m-0"> <span class="font-weight-bold border-right  pr-1 mr-1">Telefono: </span> {{$pedido->clientes->phone}}</p> 
                                                            <p class="px-2 border border-bottom m-0 row"> <span class="font-weight-bold border-right p-0 pr-1 mr-1 col-3">Dirección: </span> <span class="col-8 p-0">{{$pedido->clientes->address}}</span></p> 
                                                        </div>
                                                        <p class="text-right mr-2 font-weight-bold">{{$pedido->created_at}}</p>
                                                    </div>
                                                    <div class="container mt-2">
            
                                                        <div class="row justify-content-around align-items-center border border-top border-left-0 border-right-0 border-bottom">
                                                            <p class="col-5 m-0 font-weight-bold mb-1 border-0">Nombre</p>
                                                            <p class="col-2 m-0 font-weight-bold text-center border-0 mb-1">Cantidad</p>
                                                            <p class="col-4 text-right m-0 font-weight-bold mb-1 border-0">Precio </p>
                                                        </div>
                                                        @foreach (json_decode($pedido->id_comidas) as $item)
                                                            
                                                            <div class="row justify-content-around align-items-center border border-top-0 border-left-0 border-right-0 border-bottom">
                                                                <input readonly class="col-5 m-0 mb-1 border-0" name="name_comida[]" value="{{$item->name_comida}}">
                                                                <input readonly class="col-2 m-0 text-center border-0 mb-1" name="cant_comida_pedido[]" value="{{$item->cant_pedido_comida}}">
                                                                <input readonly class="col-4 text-right m-0 mb-1 border-0" name="price_comida[]" value="{{$item->price_comida}}">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <p class="text-right mt-4 mr-2">Total<span class="text-right font-weight-bold"> {{$pedido->price}}$ </span></p>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between align-items-center" id="heading{{$pedido->id}}">
                                                <h2 class="mb-0">
                                                    <button class="btn btn-danger" type="button" data-toggle="collapse" data-target="#collapse{{$pedido->id}}" aria-expanded="true" aria-controls="collapse{{$pedido->id}}">
                                                    {{"Pedido " . "#".$pedido->id}}
                                                    </button>
                                                </h2>
                                                <p class="p-0 m-0">Entregado: <span class="font-weight-bold">Si</span> </p>
                                            </div>
                                        
                                            <div id="collapse{{$pedido->id}}" class="collapse" aria-labelledby="heading{{$pedido->id}}" data-parent="#accordionUser">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="border mb-2">
                                                            <p class="border border-bottom font-weight-bold px-2 m-0">Datos Cliente:</p>
                                                            <p class="px-2 border border-bottom m-0"> <span class="font-weight-bold border-right  pr-1 mr-1">ID: </span> {{$pedido->clientes->id}}</p> 
                                                            <p class="px-2 border border-bottom m-0"> <span class="font-weight-bold border-right  pr-1 mr-1">Cedula: </span> {{$pedido->clientes->dni}}</p> 
                                                            <p class="px-2 border border-bottom m-0"> <span class="font-weight-bold border-right  pr-1 mr-1">Nombre: </span> {{$pedido->clientes->name}}</p> 
                                                            <p class="px-2 border border-bottom m-0"> <span class="font-weight-bold border-right  pr-1 mr-1">Apellido: </span> {{$pedido->clientes->last_name}}</p> 
                                                            <p class="px-2 border border-bottom m-0"> <span class="font-weight-bold border-right  pr-1 mr-1">Telefono: </span> {{$pedido->clientes->phone}}</p> 
                                                            <p class="px-2 border border-bottom m-0 row"> <span class="font-weight-bold border-right p-0 pr-1 mr-1 col-3">Dirección: </span> <span class="col-8 p-0">{{$pedido->clientes->address}}</span></p> 
                                                        </div>
                                                        <p class="text-right mr-2 font-weight-bold">{{$pedido->created_at}}</p>
                                                    </div>
                                                    <div class="container mt-2">
            
                                                        <div class="row justify-content-around align-items-center border border-top border-left-0 border-right-0 border-bottom">
                                                            <p class="col-5 m-0 font-weight-bold mb-1 border-0">Nombre</p>
                                                            <p class="col-2 m-0 font-weight-bold text-center border-0 mb-1">Cantidad</p>
                                                            <p class="col-4 text-right m-0 font-weight-bold mb-1 border-0">Precio </p>
                                                        </div>
                                                        @foreach (json_decode($pedido->id_comidas) as $item)
                                                            
                                                            <div class="row justify-content-around align-items-center border border-top-0 border-left-0 border-right-0 border-bottom">
                                                                <input readonly class="col-5 m-0 mb-1 border-0" name="name_comida[]" value="{{$item->name_comida}}">
                                                                <input readonly class="col-2 m-0 text-center border-0 mb-1" name="cant_comida_pedido[]" value="{{$item->cant_pedido_comida}}">
                                                                <input readonly class="col-4 text-right m-0 mb-1 border-0" name="price_comida[]" value="{{$item->price_comida}}">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <p class="text-right mt-4 mr-2">Total<span class="text-right font-weight-bold"> {{$pedido->price}}$ </span></p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
            
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-5">
                        <div class="row container">
                            <div class="col-6">HOla</div>
                            <div class="col-6">HOla</div>
                        </div>
                    </div>
                @else
                    <div class="col-md-8 mt-4"> 
                        <div class="card">
                            <div class="card-header text-black-50 font-weight-bold">
                                Pedidos
                            </div>
                            <div class="card-body">
                                <div class="accordion" id="accordionUser">
                                    @foreach ($pedidos as $pedido)
                                    @if (!$pedido->is_deliver)
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between align-items-center" id="heading{{$pedido->id}}">
                                                <h2 class="mb-0">
                                                    <button class="btn btn-danger" type="button" data-toggle="collapse" data-target="#collapse{{$pedido->id}}" aria-expanded="true" aria-controls="collapse{{$pedido->id}}">
                                                    {{"Pedido " . "#".$pedido->id}}
                                                    </button>
                                                </h2>
                                            <form method="POST" class="input-group w-auto" action="{{route('pedido.update',$pedido->id)}}">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="dni_user" value="{{Auth::user()->dni}}">

                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Entregado</span>
                                                        <span class="input-group-text">
                                                        <input type="checkbox" name="is_deliver" id="is_deliver{{$pedido->id}}" onclick="is_delivery({{$pedido->id}})">
                                                        </span>
                                                    </div>
                                                    <input type="submit" value="Confirmar" id="submit_env{{$pedido->id}}" class="btn btn-danger disabled">
                                                </form>
                                            </div>
                                        
                                            <div id="collapse{{$pedido->id}}" class="collapse" aria-labelledby="heading{{$pedido->id}}" data-parent="#accordionUser">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="border mb-2">
                                                            <p class="border border-bottom font-weight-bold px-2 m-0">Datos Cliente:</p>
                                                            <p class="px-2 border border-bottom m-0"> <span class="font-weight-bold border-right  pr-1 mr-1">ID: </span> {{$pedido->clientes->id}}</p> 
                                                            <p class="px-2 border border-bottom m-0"> <span class="font-weight-bold border-right  pr-1 mr-1">Cedula: </span> {{$pedido->clientes->dni}}</p> 
                                                            <p class="px-2 border border-bottom m-0"> <span class="font-weight-bold border-right  pr-1 mr-1">Nombre: </span> {{$pedido->clientes->name}}</p> 
                                                            <p class="px-2 border border-bottom m-0"> <span class="font-weight-bold border-right  pr-1 mr-1">Apellido: </span> {{$pedido->clientes->last_name}}</p> 
                                                            <p class="px-2 border border-bottom m-0"> <span class="font-weight-bold border-right  pr-1 mr-1">Telefono: </span> {{$pedido->clientes->phone}}</p> 
                                                            <p class="px-2 border border-bottom m-0 row"> <span class="font-weight-bold border-right p-0 pr-1 mr-1 col-3">Dirección: </span> <span class="col-8 p-0">{{$pedido->clientes->address}}</span></p> 
                                                        </div>
                                                        <p class="text-right mr-2 font-weight-bold">{{$pedido->created_at}}</p>
                                                    </div>
                                                    <div class="container mt-2">
            
                                                        <div class="row justify-content-around align-items-center border border-top border-left-0 border-right-0 border-bottom">
                                                            <p class="col-5 m-0 font-weight-bold mb-1 border-0">Nombre</p>
                                                            <p class="col-2 m-0 font-weight-bold text-center border-0 mb-1">Cantidad</p>
                                                            <p class="col-4 text-right m-0 font-weight-bold mb-1 border-0">Precio </p>
                                                        </div>
                                                        @foreach (json_decode($pedido->id_comidas) as $item)
                                                            
                                                            <div class="row justify-content-around align-items-center border border-top-0 border-left-0 border-right-0 border-bottom">
                                                                <input readonly class="col-5 m-0 mb-1 border-0" name="name_comida[]" value="{{$item->name_comida}}">
                                                                <input readonly class="col-2 m-0 text-center border-0 mb-1" name="cant_comida_pedido[]" value="{{$item->cant_pedido_comida}}">
                                                                <input readonly class="col-4 text-right m-0 mb-1 border-0" name="price_comida[]" value="{{$item->price_comida}}">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <p class="text-right mt-4 mr-2">Total<span class="text-right font-weight-bold"> {{$pedido->price}}$ </span></p>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between align-items-center" id="heading{{$pedido->id}}">
                                                <h2 class="mb-0">
                                                    <button class="btn btn-danger" type="button" data-toggle="collapse" data-target="#collapse{{$pedido->id}}" aria-expanded="true" aria-controls="collapse{{$pedido->id}}">
                                                    {{"Pedido " . "#".$pedido->id}}
                                                    </button>
                                                </h2>
                                                <p class="p-0 m-0">Entregado: <span class="font-weight-bold">Si</span> </p>
                                            </div>
                                        
                                            <div id="collapse{{$pedido->id}}" class="collapse" aria-labelledby="heading{{$pedido->id}}" data-parent="#accordionUser">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="border mb-2">
                                                            <p class="border border-bottom font-weight-bold px-2 m-0">Datos Cliente:</p>
                                                            <p class="px-2 border border-bottom m-0"> <span class="font-weight-bold border-right  pr-1 mr-1">ID: </span> {{$pedido->clientes->id}}</p> 
                                                            <p class="px-2 border border-bottom m-0"> <span class="font-weight-bold border-right  pr-1 mr-1">Cedula: </span> {{$pedido->clientes->dni}}</p> 
                                                            <p class="px-2 border border-bottom m-0"> <span class="font-weight-bold border-right  pr-1 mr-1">Nombre: </span> {{$pedido->clientes->name}}</p> 
                                                            <p class="px-2 border border-bottom m-0"> <span class="font-weight-bold border-right  pr-1 mr-1">Apellido: </span> {{$pedido->clientes->last_name}}</p> 
                                                            <p class="px-2 border border-bottom m-0"> <span class="font-weight-bold border-right  pr-1 mr-1">Telefono: </span> {{$pedido->clientes->phone}}</p> 
                                                            <p class="px-2 border border-bottom m-0 row"> <span class="font-weight-bold border-right p-0 pr-1 mr-1 col-3">Dirección: </span> <span class="col-8 p-0">{{$pedido->clientes->address}}</span></p> 
                                                        </div>
                                                        <p class="text-right mr-2 font-weight-bold">{{$pedido->created_at}}</p>
                                                    </div>
                                                    <div class="container mt-2">
            
                                                        <div class="row justify-content-around align-items-center border border-top border-left-0 border-right-0 border-bottom">
                                                            <p class="col-5 m-0 font-weight-bold mb-1 border-0">Nombre</p>
                                                            <p class="col-2 m-0 font-weight-bold text-center border-0 mb-1">Cantidad</p>
                                                            <p class="col-4 text-right m-0 font-weight-bold mb-1 border-0">Precio </p>
                                                        </div>
                                                        @foreach (json_decode($pedido->id_comidas) as $item)
                                                            
                                                            <div class="row justify-content-around align-items-center border border-top-0 border-left-0 border-right-0 border-bottom">
                                                                <input readonly class="col-5 m-0 mb-1 border-0" name="name_comida[]" value="{{$item->name_comida}}">
                                                                <input readonly class="col-2 m-0 text-center border-0 mb-1" name="cant_comida_pedido[]" value="{{$item->cant_pedido_comida}}">
                                                                <input readonly class="col-4 text-right m-0 mb-1 border-0" name="price_comida[]" value="{{$item->price_comida}}">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <p class="text-right mt-4 mr-2">Total<span class="text-right font-weight-bold"> {{$pedido->price}}$ </span></p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
            
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        @endif

    </div>
@endsection
