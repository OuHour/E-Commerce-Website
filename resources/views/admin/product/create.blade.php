{{-- @extends('admin.product.index')

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
								<span class="icon"><i class="fas fa-laptop"></i></span>
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

@section('content') --}}
    {{-- <br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Add New Item</h2>
            </div>
            <br>

            <div class="float-right">
                <a class="btn btn-success" href="{{ route('admin.product.index') }}">Back</a>
            </div>
        </div>
    </div> --}}

    <form action="{{ url('admin/dashboard/store/products') }}" method="post" enctype="multipart/form-data">
        {{-- {{csrf_field()}} --}}
        @csrf

        <div class="form-group">
            <label for="category_id">Category</label>
                {{-- <select class="form-control select2" name="category_id"> --}}
                    {{-- @foreach($categories as $id => $categories)
                        <option value="{{ $id }}">{{ $categories }}</option>
                    @endforeach --}}
                    {{-- <option>1</option>
                </select> --}}
            {{-- <label>Category</label> --}}
            <select name="category_id" class="form-control">
                @foreach ($categories as $id => $category)
                    <option value="{{$id}}">{{$category}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Code</label>
            <input type="text" name="code" class="form-control" placeholder="Item Code...">
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="text" name="price" class="form-control" placeholder="Item Price...">
        </div>
        <div class="form-group">
            <label>Amount</label>
            <input type="text" name="stock" class="form-control" placeholder="Item Amount...">
        </div>

        <div class="form-group">
            <label>model</label>
            <input type="text" name="model" class="form-control" placeholder="Item Model...">
        </div>

        <div class="form-group">
            <label>Brand Name</label>
            <input type="text" name="brand_name" class="form-control" placeholder="Item Brand Name...">
        </div>

        <div class="form-group">
            <label>Detail</label>
            <textarea name="description" id="summernote" class="form-control" rows="3" style="height: 150px"></textarea>
        </div>

        <div class="form-group">
            <label>Color</label>
            <input type="text" name="color" class="form-control" placeholder="Item Color...">
        </div>

        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control-file">
        </div>

        <div class="float-right">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        
    </form>

{{-- @endsection --}}