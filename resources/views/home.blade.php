@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 col-sm-2 sidebar">
            <ul>
                <li><a href="/products">Products</a></li>
                <li><a href="/suppliers">Suppliers</a></li>
            </ul>
        </div>
        <div class="col-md-10 col-sm-10">
            @yield('page')
        </div>
    </div>
</div>

@endsection