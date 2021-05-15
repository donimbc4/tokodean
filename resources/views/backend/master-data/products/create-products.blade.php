@extends('backend.layouts.app')
@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3>Create Products</h3>
        </div>
        <div class="col-auto ml-auto text-right mt-n1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Master Data</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/panel/master-data/products') }}">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Products</li>
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
                    <input type="text" class="form-control" name="name" placeholder="Name" autocomplete="off" required maxlength="255" />
                </div>
                <div class="mb-3">
                    <label class="form-label">Category Product</label>
                    <select class="form-control" name="category" required>
                        <option value="" disabled selected>-- Select Category--</option>
                        @foreach ($mCategoryProducts as $keyCategory => $valCategory)
                        <option value="{{ $valCategory->id }}">{{ $valCategory->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="description" placeholder="Description" cols="30" rows="4" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="number" class="form-control" name="price" placeholder="Price" autocomplete="off" required />
                </div>
                <div class="mb-3">
                    <label class="form-label">Size</label>
                    <input type="text" class="form-control" name="size" placeholder="Size" autocomplete="off" required />
                </div>
                <div class="mb-3">
                    <label class="form-label">Color</label>
                    <input type="text" class="form-control" name="color" placeholder="Color" autocomplete="off" required />
                </div>
                <div class="mb-3">
                    <label for="thumbnail" class="form-label">Thumbnail</label>
                    <input type="file" class="form-control" onchange="renderFile(this)" required />
                    <input type="hidden" id="thumbnail" name="thumbnail">
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
                document.getElementById('divImage').innerHTML = `<img src="${event.target.result}" class="img-fluid" style="height: 250px;" alt="thumbnail products" />`
                document.getElementById('thumbnail').value = event.target.result
            }
            reader.readAsDataURL(file)
        }
    </script>
@endsection