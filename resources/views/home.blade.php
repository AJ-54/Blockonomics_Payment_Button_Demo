@extends('layouts.app')

@section('content')
    <div class="container">
        @if(isset($transaction))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Important!</strong> Your latest transaction 
                @if ($transaction->status == '-2') 
                    has been expired
                @elseif ($transaction->status == '-1')
                    has payment error 
                @elseif ($transaction->status == '0') 
                    has not been paid
                @elseif ($transaction->status == '1') 
                    is in process. We will unlock premium as soon as we receive confirm payment. Thank You 
                    for your patience.
                @elseif (($transaction->status == '2') )  
                    is successfully paid. You are now a premium member!!
                @endif
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif (!Auth::user()->premium )
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hi {{Auth::user()->name }}!</strong> You have not yet purchased premium. 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class = 'jumbotron'>
            <h1 style='text-align:center;'> Paintings @if(Auth::user()->premium) - Premium Pass @endif  </h1>
            <hr>
            <div class='row justify-content-center'>
            @foreach($products as $product)
            <div class="card col-lg-3 col-md-1 m-2 p-2" style="width: 18rem;">
                <img class="card-img-top" src="{{ Storage::url($product->image) }}.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$product->title}}</h5>
                    <p class="card-text">>{{$product->description}}</p>
                </div>
            </div>
            @endforeach
            </div>
            <hr>
            @if(!Auth::user()->premium)
            <div style='text-align:center;'>
                <a href="" class="blockoPayBtn" data-toggle="modal" data-uid=7299c86444ea11eb><img width=160 src="https://www.blockonomics.co/img/pay_with_bitcoin_medium.png"></a>            </div>
            </div>
            @else
            <h1 style='text-align:center;'> Premium Paintings</h1>
            <hr>
            <div class='row justify-content-center'>
            @foreach($premium as $product)
            <div class="card col-lg-3 col-md-1 m-2 p-2" style="width: 18rem;">
                <img class="card-img-top" src="{{ $product->image }}.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$product->title}}</h5>
                    <p class="card-text">>{{$product->description}}</p>
                </div>
            </div>
            @endforeach
            </div>
            @endif
    </div>
@endsection

