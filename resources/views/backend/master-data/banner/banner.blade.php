@extends('backend.layouts.app')
@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3>Banner</h3>
        </div>
        <div class="col-auto ml-auto text-right mt-n1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Master Data</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Banner</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Search</h5>
                </div>
                <form role="form" method="GET">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" autocomplete="off" class="form-control" placeholder="Name" name="name" value="{{ app('request')->input('name') }}"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="form-control" name="status">
                                        <option value="all" {{ app('request')->input('status') == 'all' ? 'selected' : '' }}>All Status</option>
                                        <option value="1" {{ app('request')->input('status') == '1' ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ app('request')->input('status') == '0' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary float-right">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Banner List</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3" style="padding-top: 0px">
                        <a href="{{ url('/panel/master-data/banner/create') }}" class="btn btn-primary">Create Banner</a>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($bannerList as $keyBanner => $valBanner)
                            <tr>
                                <td>{{ $keyBanner + 1 }}</td>
                                <td>{{ $valBanner->name }}</td>
                                <td><img src="{{ url('/'.$valBanner->image.'') }}" class="img-fluid" width="400" height="200" alt="{{ $valBanner->name }}"></td>
                                <td>{!! $valBanner->flag_active == 1 ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>' !!}</td>
                                <td class="table-action">
                                    <a href="{{ url('/panel/master-data/banner/update/'.\Crypt::encryptString($valBanner->id).'') }}"><i class="align-middle" data-feather="edit-2"></i></a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" style="text-align: center">Empty Data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $bannerList->links() }}
                </div>
            </div>
        </div>
    </div>
@stop
@section('javascript')

@endsection