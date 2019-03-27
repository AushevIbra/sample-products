@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Добавить продукт</div>

                    <div class="card-body">
                        @if ($errors->any())

                            <div class="alert alert-danger">

                                <ul>

                                    @foreach ($errors->all() as $error)

                                        <li>{{ $error }}</li>

                                    @endforeach

                                </ul>

                            </div>

                        @endif
                        <form action="{{route('products.update', $product->id)}}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" value="{{$product->name}}" class="form-control" placeholder="Название">
                            </div>

                            <div class="form-group">
                                <input type="text" name="art" value="{{$product->art}}" class="form-control" placeholder="Артикул" @if(app('current_user_type') !== 'admin') disabled @endif>
                            </div>

                            <div>
                                <button class="btn btn-primary">Изменить</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
