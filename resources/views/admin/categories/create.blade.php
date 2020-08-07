{{-- @extends('admin.product.index')
@section('createProduct')
    <br>
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

    <form action="{{ route('admin.categories.store') }}" method="post" enctype="multipart/form-data">
        
        @csrf

        <div class="form-group">
            <label for="exampleFormControlInput1">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Category Name...">
        </div>
        <div class="float-right">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        
    </form>

{{-- @endsection --}}