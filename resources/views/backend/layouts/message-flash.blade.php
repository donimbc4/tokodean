@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="alert-icon">
        <i class="far fa-fw fa-bell"></i>
    </div>
    <div class="alert-message">
        {{ $message }}
    </div>
</div>
@endif

@if ($message = Session::get('danger'))
<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="alert-icon">
        <i class="far fa-fw fa-bell"></i>
    </div>
    <div class="alert-message">
        {{ $message }}
    </div>
</div>
@endif