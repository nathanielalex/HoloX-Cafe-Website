
@extends('main')
{{-- sesuaiin dengan nama blade, skrg main krn punya navbar-nya --}}


{{-- untuk isiin content di navbar --}}
@section('content')
<link rel="stylesheet" href="/css/homePage.css">
    
    <div class="banner">
        <img src="assets/mv-pc.jpg">
    </div>

    
    
    <div class="content-container">
        <div class="content-banner">
            <div class="img-banner">

                <img src="assets/broadcasting-main.png">
            </div>
        </div>
        <div class="banner-txt">Come and order our specialty!</div>

        <div class="food-section">
            @foreach($barangs as $b)
            <div class="product-card">
                <img src={{Storage::url('public/' . $b->image )}} alt="" class="">
                <div class="caption">
                    <div class="product-name">{{ $b->nama }}</div>
                    {{-- <div class="product-price">Rp {{ $b->harga }}</div> --}}
                </div>
            </div>
            @endforeach
        </div>
        <a href="" class="menu-btn">See Menu</a>
    </div>
    


@endsection

