@extends('frontend.layouts.app')
@section('content')
    <section class="bgwhite p-t-66 p-b-60">
        <div class="container">
            <div class="row">
                <div class="col-md-12 p-b-30">
                    <form method="POST" class="leave-comment">
                        <h4 class="m-text26 p-b-36 p-t-15 text-center">
                            Register
                        </h4>
                        @csrf
                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" placeholder="Name" required autocomplete="off" />
                        </div>
                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="username" placeholder="Username" required autocomplete="off" />
                        </div>
                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="email" name="email" placeholder="Email" required autocomplete="off" />
                        </div>
                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="password" placeholder="Password" required autocomplete="off" />
                        </div>
                        <div class="w-size25">
                            <button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
                                Register
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@stop
@section('javascript')
@endsection