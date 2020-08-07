@extends('admin.master_dashboard')

@section('sidebar')
    <div class="wrapper">

		<div class="top_navbar">
			<div class="logo">
				<img src="{{asset('assets/img/logo.png')}}" style="margin-left: 35px">
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

				<!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto float-right">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
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
							<a href="{{ route('admin.users.index') }}" class="active">
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
    <div class="row" id="category-table">
        <div style="margin-right: 1000px">
            <h2> User List </h2>
        </div>

        {{-- @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div> --}}
        {{-- @elseif($message = Session::get('unsuccess'))
            <div class="alert alert-unsuccess">
                <p>{{$message}}</p>
            </div> --}}
        {{-- @endif --}}
        
        <table class="table table-bordered text-center" style="margin-top: 10px">
            <tr>
                <th width="50px">#</th>
                <th width="50px">Name</th>
                <th width="100px">Email</th>
                <th width="50px">Role</th>
                <th width="50px">Action</th>
            </tr>

            @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
				<td>
					@foreach($user->roles as $key => $item)
                        <span class="badge badge-info">{{ $item->name }}</span>
                    @endforeach
				</td>
				<td>
                    <a class="btn btn-info" href="#"><span class="icon"><i class="fas fa-eye"></i></span></a>

					<button type="button" class="btn btn-primary" data-toggle="modal"  data-target="#editItem{{$user->id}}"><i class="fas fa-pencil-square"></i></button>

					<a class="btn btn-info" href="{{ route('admin.users.destroy', $user->id) }}"><span class="icon"><i class="fas fa-trash"></i></span></a>

					{{-- <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
						@csrf
						{{ method_field('DELETE') }}
						<button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
					</form> --}}
				</td>
				
				<!-- Edit Product Modal -->
                <div class="modal fade" id="editItem{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="editItemModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editItemModalLabel">Edit Role</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @include('admin.users.edit')
                        </div>
                        </div>
                    </div>
                </div>
            </tr>
            @endforeach
        </table>
    </div>

@endsection