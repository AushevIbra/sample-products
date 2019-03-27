@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Последнее обновление: {{$product->updated_at}}
                        <a href="{{route('products.edit', $product->id)}}" class="btn btn-primary pull-right">Изменить</a>
                    </div>

                    <div class="card-body">
                       <div>Название: {{$product->name}}</div>
                        <div>Артикул: {{$product->art}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
