@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">

        @if (isset($items))
        @foreach ($items as $item)
        <div class="col-md-4 mb-2">

            <p>
                {{ $item->name }}
            </p>
            <p class="row justify-content-center">
                <img src="{{ asset('/asset/images/fanta.jpg') }}" alt="" width="100%">
                <img src="{{ asset('/asset/images/1.jpg') }}" alt="" width="100%">
            </p>

            <p class="row justify-content-center">
                <a href="{{ route('cart.add', ['id' => $item->id]) }}" class="btn btn-outline-primary">カートに入れる</a>
            </p>
        </div>
        @endforeach
        @endif

    </div>
</div>
@endsection