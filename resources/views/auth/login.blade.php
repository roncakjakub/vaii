@extends('templates.default')
@section('content')
    <div class="login container mt-5">
        <div class="row justify-content-center">
            <div class="col-6 ff-crd my-shadow bg-white">
                <div class="row">
                    @if(count($errors) > 0)
                        @foreach($errors->all() as $error)
                            <div class='alert-danger alert'>{{$error}}</div>
                        @endforeach
                    @endif
                    @if(session('success'))
                        <div class='alert alert-success'>{{session('success')}}</div>
                    @endif
                    @if(session('error'))
                        <div class='alert alert-danger'>{{session('error')}}</div>
                    @endif

                    <div class="col-12 py-3 ff-crd bg-white2 ">
                        <h1 class="text-center">Prihlásenie</h1>

                        <form method="post" action="{{route('login')}}" class="row justify-content-center">
                            @csrf
                            <div class="col-8 w-75 input-group mb-3">
                                <div class="input-group-prepend">
                                        <span class="input-group-text h-100" id="basic-addon2"><i
                                                class="fas fa-envelope"></i></span>
                                </div>
                                <input required type="text" class="form-control" placeholder="Email"
                                       aria-label="Email" name="email" value="{{old('email')}}" aria-describedby="basic-addon2">
                            </div>

                            <div class="col-8 w-75 input-group mb-3">
                                <div class="input-group-prepend">
                                        <span class="input-group-text h-100" id="basic-addon2">
                                            <i class="fas fa-key"></i></span>
                                </div>
                                <input required type="password" class="form-control" placeholder="Heslo"
                                       aria-label="Heslo" name="password" value="{{old('password')}}" aria-describedby="basic-addon2">
                            </div>
                            <div class="col-4">
                                <button type="submit" class="btn bg-red text-white ff-mrsw fs-16 w-100">
                                    Prihlásiť sa
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
