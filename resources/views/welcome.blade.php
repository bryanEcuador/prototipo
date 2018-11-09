@extends('layouts.principal')
@section('title',"Bienvenido")
@section('css')
@endsection
@section('nombre_breadcrumb')
@endsection
@section('breadcrumb_tree')
@endsection
@section('contenido')
		<!-- SECTION -->
		<div class="section" id="colecciones">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop01.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Laptop<br>Colección</h3>
								<a href="#" class="cta-btn">comprar ahora <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop03.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Accessories<br>Colección</h3>
								<a href="#" class="cta-btn">comprar ahora <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop02.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Cameras<br>Colección</h3>
								<a href="#" class="cta-btn">Comprar ahora <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->


        <!-- SECTION -->
		<div class="section" id="nuevos">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Nuevos productos</h3>

						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<!-- product -->
										@foreach($top as $product)
										<div class="product">
											<div class="product-img">
												<img src={{$product->imagen}}>
												<div class="product-label">
													<span class="sale"></span>
													<span class="new">Nuevo</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">{{$product->categoria}}</p>
												<h3 class="product-name"><a href="/detalles/{{$product->id}}">{{$product->prooducto}}</a></h3>
												<h4 class="product-price"> {{"$".$product->precio}}</h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button style="display:none;" class="add-to-wishlist"><!--<i class="fa fa-heart-o"></i>--><span class="tooltipp">add to wishlist</span></button>
													<button style="display:none;" class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button style="display:none;" class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
											</div>
										</div>
										@endforeach
										<!-- /product -->
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- SECTION -->

        <!-- SECTION -->
		<div class="section" id="top">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Mas vendidos</h3>
							<div class="section-nav">

							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-2">
										<!-- product -->
										@foreach($vendidos	 as $product)
											<div class="product">
												<div class="product-img">
													<img src={{$product->imagen}}>
													<div class="product-label">
														<span class="sale"></span>
														<span class="new">Nuevo</span>
													</div>
												</div>
												<div class="product-body">
													<p class="product-category">{{$product->categoria}}</p>
													<h3 class="product-name"><a href="/detalles/{{$product->id}}">{{$product->prooducto}}</a></h3>
													<h4 class="product-price"> {{"$".$product->precio}}</h4>
													<div class="product-rating">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
													</div>
													<div class="product-btns">
														<button style="display:none;" class="add-to-wishlist"><!--<i class="fa fa-heart-o"></i>--><span class="tooltipp">add to wishlist</span></button>
														<button style="display:none;" class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
														<button style="display:none;" class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
													</div>
												</div>
												<div class="add-to-cart">
													<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
												</div>
											</div>
									@endforeach
										<!-- /product -->
									</div>
									<div id="slick-nav-2" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
@endsection
@section('js')
@endsection
