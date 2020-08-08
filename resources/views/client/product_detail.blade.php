@extends('client.index')

@section('nav')

	<!-- container -->
	<div class="container">
		<!-- responsive-nav -->
		<div id="responsive-nav">
			<!-- NAV -->
			<ul class="main-nav nav navbar-nav">
				<li><a href="/">Home</a></li>
				<li><a href="/categories/laptops">Laptops</a></li>
				<li><a href="/categories/smartphones">Smartphones</a></li>
				<li><a href="/categories/tablets">Tablets</a></li>
			</ul>
			<!-- /NAV -->
		</div>
		<!-- /responsive-nav -->
	</div>
	<!-- /container -->

@endsection

@section('content')

    <!-- Product main img -->
    {{-- <div class="col-md-5 col-md-push-2">
        <div id="product-main-img">
            <div class="product-preview">
                <img src="{{ URL::to($product->image) }}" width="100px" height="150px">
            </div>
        </div>
    </div> --}}
    <!-- /Product main img -->

    

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- Product main img -->
                    <div class="col-md-5 col-md-push-2">
                        <img src="{{ URL::to($product->image) }}" width="350px" height="400px">
                    </div>
                <!-- /Product main img -->

                <!-- Product details -->
                    <div class="col-md-5" style="margin-left: 150px">
                        <div class="product-details">
                            <h2 class="product-name">{{$product->model}}</h2>
                            <div>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    {{-- <i class="fa fa-star-o"></i> --}}
                                </div>
                                {{-- <a class="review-link" href="#">10 Review(s) | Add your review</a> --}}
                            </div>
                            <div>
                                <h3 class="product-price">${{$product->price}}</h3>
                            </div>
                            <p style="margin-bottom: 20px">
                                {{$product->description}}
                            </p>

                            {{-- <div class="product-options">
                                <label>
                                    Size
                                    <select class="input-select">
                                        <option value="0">X</option>
                                    </select>
                                </label>
                                <label>
                                    Color
                                    <select class="input-select">
                                        <option value="0">Red</option>
                                    </select>
                                </label>
                            </div> --}}

                            <div class="add-to-cart">
                                <div class="qty-label">
                                    Qty
                                    <div class="input-number">
                                        <input type="number">
                                        <span class="qty-up">+</span>
                                        <span class="qty-down">-</span>
                                    </div>
                                </div>
                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                            </div>

                            <ul class="product-btns">
                                <li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
                                <li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li>
                            </ul>

                            <ul class="product-links">
                                <li>Category:</li>
                                <li>{{$product->categories->name}}</li>
                            </ul>

                            <ul class="product-links">
                                <li>Share:</li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                            </ul>

                        </div>
                    </div>
                <!-- /Product details -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- Section Prodcut Relate-->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3 class="title">Related Products</h3>
                    </div>
                </div>

                <!-- product -->
                @foreach($productRelated as $pro)
                <div class="col-md-3 col-xs-6">
                    <div class="product">
                        <div class="product-img">
                            <img src="{{ URL::to($pro->image) }}" height="250px" style="padding: 5px">
                        </div>
                        <div class="product-body">
                            <p class="product-category">{{$pro->categories->name}}</p>
                            <h3 class="product-name"><a href="{{url('/product', $pro->id)}}">{{$pro->model}}</a></h3>
                            <h4 class="product-price">${{$pro->price}}</h4>
                            <div class="product-rating">
                            </div>
                            <div class="product-btns">
                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                            </div>
                        </div>
                        <div class="add-to-cart">
                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- /product -->

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /Section -->

    

@endsection