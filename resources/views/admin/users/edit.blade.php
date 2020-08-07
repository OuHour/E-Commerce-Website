
    <form action="{{route('admin.users.update', $user->id)}}" method="post" enctype="multipart/form-data">
        {{-- {{csrf_field()}} --}}
        {{-- {{ method_field('PUT')}} --}}
        @csrf

		@foreach($roles as $role)
			<div class="form-check">
				<input type="radio" name="roles" value="{{$role->id}}" @if($user->roles->pluck('id')->contains($role->id)) checked @endif>
				<label for="roles">{{$role->name}}</label>
			</div>
		@endforeach
		
        <div class="float-right">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
        
    </form>
