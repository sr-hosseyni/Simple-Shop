@extends('layouts.app')

@section('title', 'All Products')

@section('sidebar')
@parent
<div class="panel panel-default">
    <span class="label label-default">Filtering</span>
    <div class="panel-body">
        Categories
        <ul id="categories" class="list-group">
            @foreach ($categories as $category)
            <li class="list-group-item">
                <input class="" type="checkbox" checked="">
                {{$category->title}}
            </li>
            @endforeach
        </ul>
    </div>

    <div class="panel-body">
        Attributes
        <ul id="attributes" class="list-group">
            @foreach ($attributes as $attribute)
            <li class="list-group-item">
                <input type="checkbox" checked="">
                {{$attribute->title}}
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection

@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            @foreach ($products as $product)
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="{{ $product->imgUrl }}" alt="{{ $product->title }} - {{ $product->model }}">
                    <div class="caption">
                        <h3>{{ $product->title }}</h3>
                        <p>{{ $product->model }}</p>
                        <p><a href="#" class="btn btn-primary" role="button">BUY</a></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection