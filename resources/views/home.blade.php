@extends('layouts.app2')

@section('content')

    <div class="row">
        @foreach(App\Category::noInduk()->get() as $category)
        <div class="col-md-12">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#">Produk :<b> {{ $category->name }}</b></a></li>
            </ul>
        </div>
            @include('categories._category-panel')
        @endforeach

    </div>
           

@endsection
