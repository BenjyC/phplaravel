@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @for($i=0; $i < sizeof($datas); $i++)
                        <p>{{$datas[$i]}}</p>
                        <a href="{{ route('wishlist', $i) }}" class="btn btn-primary"> Add to Wishlist </a>
                        <hr>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
