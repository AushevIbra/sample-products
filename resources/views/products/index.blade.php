@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Продукты</div>

                    <div class="card-body">
                        <a href="{{route('products.create')}}" class="btn btn-primary">Добавить продукт</a>

                        <table class="table m-2">
                            <tbody>
                            <tr>
                                <th>#ID</th>
                                <th>Название</th>
                                <th>Артикул</th>
                                <th></th>
                            </tr>

                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->art}}</td>
                                    <td style="display: flex; justify-content: space-around;">
                                        <a href="{{route('products.show', ['id' => $product->id])}}" title="Посмотреть"><span
                                                class="fa fa-eye"></span></a>

                                        @if(app('current_user_type') == 'admin')
                                            <a href="{{route('products.edit', $product->id)}}" title="Изменить"><span
                                                    class="glyphicon glyphicon-pencil"><i
                                                        class="fa fa-pencil"></i></span></a>
                                            <form action="{{ route('products.destroy', ['id' => $product->id]) }}"
                                                  method="post">

                                                {!! method_field('delete') !!}

                                                {!! csrf_field() !!}


                                                <button style="border: none; background: none;" type="submit" onclick="return confirm('Вы уверены?')"><a
                                                        href="javascript:void(0)"><i class="fa fa-trash"></i></a>
                                                </button>

                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{$products->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
