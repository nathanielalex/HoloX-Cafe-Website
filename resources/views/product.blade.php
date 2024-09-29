
@extends('main')
{{-- sesuaiin dengan nama blade, skrg main krn punya navbar-nya --}}


{{-- untuk isiin content di navbar --}}
@section('content')
<link rel="stylesheet" href="/css/productPage.css">
    

    
    <div class="container">

        <div class="wrapper">
            
            @foreach($barangs as $b)
            <div class="product-card" id="card{{$b->id}}">
                

                <img src={{Storage::url('public/' . $b->image )}} alt="" class="">
                <div class="caption">
                    <div class="product-name">{{ $b->nama }}</div>
                    <div class="product-price">Rp {{ $b->harga }}</div>
                </div>
                
                <form action="/addToCart/{{$b->id}}" method="POST">
                    @csrf
                    <div class="quantity-container">

                        <input type="number" name="quantity" value="1" min="1" step="1" class="quantity-input" id="quantity{{$b->id}}">
                    </div>
                    <input type="submit" value="add to cart" class="add-btn">
                </form>
            </div>
            @endforeach
            
        </div>
        
    </div>
    


    <script>
    

    var cards = {}; // Object to hold the card elements
    var quantities = {}; // Object to hold the card elements

    @foreach($barangs as $b)

        // Create a dynamic property name using the ID
        cards['card' + {{$b->id}}] = document.getElementById('card' + {{$b->id}});
        quantities['quantity' + {{$b->id}}] = document.getElementById('quantity' + {{$b->id}});
        $("#quantity" + {{$b->id}}).hide();

        $("#card" + {{$b->id}}).on('mouseenter', function() {
            $("#quantity" + {{$b->id}}).fadeIn();
        });
        $("#card" + {{$b->id}}).on('mouseleave', function() {
            $("#quantity" + {{$b->id}}).fadeOut();
        });

    @endforeach

    // Example of accessing a specific card element later in the script
    // console.log(cards['card1']); // Accesses the element with ID 'card1' if it exists
</script>
@endsection

