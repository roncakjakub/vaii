@extends('templates.default')
@section('content')
    <div class="kontakt container mt-5 ff-crd my-shadow bg-white">
        <div class="row  ">
            <div class="col-lg-3 col-12 px-0 left-image">
                <img src="{{asset('img/kontakt-left.png')}}" alt="" class="w-100">
            </div>
            <div class="col-lg-6 col-md-8 col-sm-7 col-12 py-3 ff-crd bg-white2 ">
                <p class="text-my-grey">
                    Nech už ide o čokoľvek, <br>
                    v prípade otázok nás <span class="text-red">neváhajte kontaktovať</span>
                </p>
                <form action="" class="row">
                    <div class="col-8 w-75 input-group mb-3">
                        <div class="input-group-prepend">
                                        <span class="input-group-text h-100" id="basic-addon1"><i
                                                class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Meno"
                               aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="col-8 w-75 input-group mb-3">
                        <div class="input-group-prepend">
                                        <span class="input-group-text h-100" id="basic-addon2"><i
                                                class="fas fa-envelope"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Email"
                               aria-label="Email" aria-describedby="basic-addon2">
                    </div>
                    <div class="col-8 w-75 input-group mb-3">
                        <div class="input-group-prepend">
                                        <span class="input-group-text h-100" id="basic-addon3"><i
                                                class="fas fa-phone"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Telefón"
                               aria-label="Telefón" aria-describedby="basic-addon3">
                    </div>
                    <div class="form-group col-12 mb-2">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                  placeholder="Vaša správa"></textarea>
                    </div>
                    <div class="offset-8 col-4 align-content-end ">
                        <button type="submit" class="btn bg-red text-white ff-mrsw fs-16 w-100">
                            Odoslať
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-5 col-12 px-0 right-side">
                <img src="{{asset('img/map.png')}}" alt="" class="w-100 mb-3">
                <div class="ff-mrsw fs-18 ms-3 mb-2">
                    <i class="fas fa-user-alt"></i>
                    Filip Testovač
                </div>
                <div class="ff-mrsw fs-18 ms-3 mb-2">
                    <i class="fas fa-envelope fs-18"></i>
                    as.ft@gmail.com
                </div>
                <div class="ff-mrsw fs-18 ms-3">
                    <i class="fas fa-phone"></i>
                    0909 987 654
                </div>
            </div>
        </div>
    </div>
@endsection
