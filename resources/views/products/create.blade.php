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
                        <form action="{{route('products.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Название">
                            </div>

                            <div class="form-group">
                                <input type="text" name="art" value="{{old('art')}}" class="form-control" placeholder="Артикул">
                            </div>

                            <div>
                                <button class="btn btn-primary">Добавить</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
