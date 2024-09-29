
{{-- @extends('main') --}}
{{-- sesuaiin dengan nama blade, skrg main krn punya navbar-nya --}}


{{-- untuk isiin content di navbar --}}
{{-- @section('content') --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/test.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="page-container">

        @php $total = 0 @endphp
        <div class="content-container">
            <div class="table-container">
                @foreach($barangs as $barang)
                <div class="product-detail-container">
                    <div class="product-description">
                        <div class="product-name">
                            {{$barang->nama}}
                        </div>
                        <div class="product-price">
                            @php $total += $barang->pivot->quantity * $barang->harga @endphp
                            ¥{{$barang->pivot->quantity * $barang->harga}}
                        </div>
                        <div class="quanity-section">
                            {{$barang->pivot->quantity}}x
                            <form action="/deleteFromCart/{{$barang->id}}" method="POST">
                                {{method_field('DELETE')}}
                                @csrf
                                <button type="submit" class="submit-btn">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="product-img">
                        <img src="{{\Illuminate\Support\Facades\Storage::url($barang->image)}}">   
                    </div>
                </div>
                @endforeach
            </div>
    
    
            <div class="total-container">
                <h3>Payment Details</h3>
                <table>
                    <tr>
                        <td>Subtotal</td>
                        <td>¥{{$total}}</td>
                    </tr>
                    <tr>
                        <td>Other fees</td>
                        <td>¥{{$total * 0.1}}</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td style="color: red; font-weight: 700">¥{{$total + ($total * 0.1)}}</td>
                    </tr>
                </table>
            </div>
        <div>
    </div>
    <div class="confirm-bar">
        <div class="price-section">
            <div>Total Payment</div>
            <div>¥{{$total + ($total * 0.1)}}</div>
        </div>
        <div class="button-section">
            <button type="submit">Confirm Order</button>
        </div>
    </div>
</body>
</html>


{{-- <div class="container">
    <div class="slider">
        
        @foreach($barangs as $b)
        <div class="product">
            <img src={{Storage::url('public/' . $b->image )}} alt="" class="">
            <div class="caption">
                <div class="product-name">{{ $b->nama }}</div>
                <div class="product-price">Rp {{ $b->harga }}</div>
                <form action="/deleteFromCart/{{$b->id}}" method="POST">
                    {{method_field('DELETE')}}
                    @csrf
                    <input type="submit" value="delete">
                </form>
            </div>
        </div>
        @endforeach
        
    </div>

</div> --}}
{{-- @endsection --}}













