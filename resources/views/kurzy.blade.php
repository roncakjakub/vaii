@extends('templates.default')
@section('content')
    <div class="kurzy container mt-5 ff-crd">
        <div class="row">
            @foreach($courses as $course)
                <a class="text-black col-lg-4 col-12 col-sm-6 mb-3 text-my-grey2" href="{{route('courses.show',['course' => $course])}}">
                    <div class="bg-white my-shadow w-100">

                        <div class="row justify-content-between py-2 align-items-center w-100 mx-0 px-2">
                            <h2 class="col-7 ff-crd fw-bold fs-24 pt-2 ps-0 my-0">Skupina {{$course}}</h2>
                            <span
                                class="col-4 text-center p-1 ff-mrsw fs-24 fw-bold text-red my-shadow ">750€</span>
                        </div>

                        <div class="row w-100 mx-0">
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
                </a>
            @endforeach
        </div>
    </div>
@endsection
