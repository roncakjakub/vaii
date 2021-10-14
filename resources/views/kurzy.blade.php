@extends('templates.default')
@section('content')
    <div class="kurzy container mt-5 ff-crd">
            <div class="row">
                <div class="col-3 bg-white my-shadow">

                    <div class="row justify-content-between py-2 align-items-center px-2">
                        <h2 class="col-7 ff-crd fw-bold fs-24 pt-2 ps-0 my-0">Skupina AM</h2>
                        <span class="col-4 text-center p-1 ff-mrsw fs-24 fw-bold text-red my-shadow ">750€</span>
                    </div>

                    <div class="row">
                        <div class="p-0 image w-100">
                            <img class="w-100 h-100" src="{{asset('img/courses/am.png')}}" alt="">
                        </div>
                        <ul class="text-my-grey fs-16 my-2 w-100">
                            <li>Motocykel s objemom motora do 125cm3</li>
                            <li>Od 16 rokov</li>
                            <li>Zahŕňa skupinu AM</li>
                        </ul>

                    </div>
                </div>
            </div>
    </div>
@endsection
