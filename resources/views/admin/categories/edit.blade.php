{{-- @extends('admin.master_dashboard')

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
							<a href="{{ route('admin.product.index') }}">
								<span class="icon"><i class="fas fa-laptop"></i></span>
								<span class="list">Product</span>
							</a>
						</li>
						<li>
							<a href="{{ route('admin.categories.index') }}" class="active">
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
    <br>
    <div class="row">
            <div style="margin-left: 20px; margin-right: 1100px">
                <h2>Edit Category</h2>
            </div>
            <br>

            <div>
                <a class="btn btn-success" href="{{ route('admin.categories.index') }}">Back</a>
            </div>
    </div> --}}

    <form action="{{url('dashboard/update/category/'.$cate->id)}}" method="post" enctype="multipart/form-data">

        @csrf

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{$cate->name}}">
        </div>

        <div class="float-right">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
        
    </form>

{{-- @endsection --}}