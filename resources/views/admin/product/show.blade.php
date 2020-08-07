@extends('admin.master_dashboard')

@section('sidebar')
    <div class="wrapper">

		<div class="top_navbar"> 
			<div class="logo">
				<a href="#">E-Shopping</a>
			</div>
			<div class="top_menu">
				<div class="right_info">
					<div class="icon_wrap">
						<div class="icon">
							<i class="fas fa-bell"></i>
						</div>
					</div>
					<div class="icon_wrap">
						<div class="icon">
							<i class="fas fa-cog"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="main_body">

			<div class="sidebar_menu">
				<div class="inner__sidebar_menu">

					<ul>
						<li>
							<a href="{{ route('admin.sidebar') }}">
								<span class="icon"><i class="fas fa-border-all"></i></span>
								<span class="list">Dashboard</span>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="icon"><i class="fas fa-user"></i></span>
								<span class="list">User Role</span>
							</a>
						</li>
						<li>
							<a href="{{ route('admin.product.index') }}" class="active">
								<span class="ico n"><i class="fas fa-laptop"></i></span>
								<span class="list">Product</span>
							</a>
						</li>
						<li>
							<a href="{{ route('admin.categories.index') }}">
								<span class="icon"><i class="fas fa-bars"></i></span>
								<span class="list">Category</span>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="icon"><i class="fas fa-shopping-cart"></i></span>
								<span class="list">Ordering</span>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="icon"><i class="fas fa-shopping-basket"></i></span>
								<span class="list">Order Record</span>
							</a>
						</li>
					</ul>

					<div class="hamburger">
						<div class="inner_hamburger">
							<span class="arrow">
								<i class="fas fa-long-arrow-alt-left"></i>
								<i class="fas fa-long-arrow-alt-right"></i>
							</span>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
	</div>
@endsection


@section('content')

    <div class="row">
            <div style="margin-left: 20px; margin-right: 1150px">
                <h2>Show Item</h2>
            </div>
            <br>

            <div>
                <a class="btn btn-success" href="{{ route('admin.product.index') }}">Back</a>
            </div>
        </div>

    <div class="card">
    <div class="card-header">
        {{-- {{ trans('global.show') }} {{ trans('cruds.product.title') }} --}}
        <h3>{{$product->model}}</h3>
    </div>

    <div class="card-body">
        <div class="form-group">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            Product ID
                        </th>
                        <td>
                            {{ $product->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Model
                        </th>
                        <td>
                            {{ $product->model }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Brand Name
                        </th>
                        <td>
                            {{ $product->brand_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Code
                        </th>
                        <td>
                            {{ $product->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Price
                        </th>
                        <td>
                            {{ $product->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Description
                        </th>
                        <td>
                            {{ $product->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Image
                        </th>
                        <td>
                            <img src="{{ URL::to($product->image) }}" height="70px" width="70px">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Category
                        </th>
                        <td>
                            {{-- {{ $product->categories->name ?? '' }} --}}
                            {{ $product->category_id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Color
                        </th>
                        <td>
                            {{ $product->color }}
                        </td>
                    </tr>
                </tbody>
            </table>
            {{-- <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.products.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div> --}}
        </div>
    </div>
</div>

@endsection