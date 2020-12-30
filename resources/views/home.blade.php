@extends('layouts.app')

@section('content')
    <div class="container">
        @if(!Auth::user()->premium)
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
            @else
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>Hi {{Auth::user()->name }}!</strong> You have not yet purchased premium. 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        @else
        <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Hi {{Auth::user()->name }}!</strong> Enjoy premium paintings. 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class = 'jumbotron'>
            <ul class="nav nav-tabs" id="myTab">
                <li class="nav-item" style="width: 50%;text-align: center">
                    <a href="#standard" class="nav-link active" data-toggle="tab">Standard</a>
                </li>
                <li class="nav-item" style="width: 50%;text-align: center">
                    <a href="#premium" class="nav-link" data-toggle="tab">Premium</a>
                </li>
            </ul>
            <div class="tab-content">
            <div id = 'standard' class="tab-pane fade show active">
                <h1 style='text-align:center;'> Non-Premium Paintings </h1>
                <hr>
                <div class='row justify-content-center'>
                    @foreach($products as $product)
                        <div class="card col-md-3 col-sm-12 m-2 p-2">
                            <img class="card-img-top" src="{{ $product->image }}.jpg" alt="Card image cap" style="width: 100%; height: 50%;">
                            <div class="card-body">
                                <h5 class="card-title">{{$product->title}}</h5>
                                <p class="card-text">{{$product->description}}</p>
                            </div>
                        </div>  
                    @endforeach
                </div>
                <hr>                                                                                                                
            </div>
            <div id = 'premium' class="tab-pane fade">
                @if(!Auth::user()->premium)
                    <div style='text-align:center;'>
                        <p><strong>This section is accesible only to paying users.<br> Please use before button to complete purchase. You will automatically get access once your payment is confirmed </strong></p>
                        <a href="" class="blockoPayBtn" data-toggle="modal" data-uid=7299c86444ea11eb><img width=160 src="https://www.blockonomics.co/img/pay_with_bitcoin_medium.png"></a>
                    </div>
                @else
                <h1 style='text-align:center;'> Premium Paintings</h1>
                <hr>
                <div class='row justify-content-center'>
                    @foreach($premium as $product)
                        <div class="card col-md-3 col-sm-12 m-2 p-2">
                            <img class="card-img-top" src="{{ $product->image }}.jpg" alt="Card image cap" style="width: 100%; height: 50%;">
                            <div class="card-body">
                                <h5 class="card-title">{{$product->title}}</h5>
                                <p class="card-text">{{$product->description}}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                @endif                                                                                                   
            </div>
            </div>
    </div>
@endsection

