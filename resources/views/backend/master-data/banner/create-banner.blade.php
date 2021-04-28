@extends('backend.layouts.app')
@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3>Update Banner</h3>
        </div>
        <div class="col-auto ml-auto text-right mt-n1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Master Data</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/panel/master-data/banner') }}">Banner</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Update Banner</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" autocomplete="off" required max="150" />
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" onchange="renderFile(this)" />
                    <input type="hidden" id="image" name="image">
                </div>
                <div class="mb-3">
                    <div id="divImage"></div>
                </div>
                <button type="submit" class="btn btn-primary float-right">Submit</button>
            </form>
        </div>
    </div>
@stop
@section('javascript')
    <script>
        renderFile = (obj) => {
            renderImage(obj.files[0])
        }

        renderImage = (file) => {
	        var reader = new FileReader()
	        reader.onload = (event) => {
                document.getElementById('divImage').innerHTML = `<img src="${event.target.result}" class="img-fluid" style="height: 250px;" alt="Banner" />`
                document.getElementById('image').value = event.target.result
	        }
	        reader.readAsDataURL(file)
	    }
    </script>
@endsection