@extends('templates.default')
@section('content')
    <div class="kurzy container mt-5 ff-crd">
        <div class="row">
            @foreach($licenceTypes as $type)
                <a class="text-black col-lg-4 col-12 col-sm-6 mb-4 text-my-grey2 position-relative"
                    {{--                   href="{{route('courses.show',['course' => $type])}}"--}}
                >
                    @auth()
                        <div data-href="{{route('admin.licence_types.edit',['type' => $type])}}"
                             class="addressable admin-actions position-absolute cursor-pointer">
                            <i class="fas fa-edit"></i>
                        </div>
                    @endauth
                    <div class="bg-white my-shadow w-100">

                        <div class="row justify-content-between py-2 align-items-center w-100 mx-0 px-2">
                            <h2 class="col-7 ff-crd fw-bold fs-24 pt-2 ps-0 my-0">Skupina {{$type->code}}</h2>
                            <span
                                class="col-4 text-center p-1 ff-mrsw fs-24 fw-bold text-red my-shadow ">{{$type->price}}€</span>
                        </div>

                        <div class="row w-100 mx-0">
                            <div class="p-0 image w-100">
                                <img class="w-100 h-100" src="{{asset('img/courses/am.png')}}" alt="">
                            </div>
                            <ul class="text-my-grey fs-16 my-2 w-100">
                                <li>{{$type->short_desc_1}}</li>
                                <li>{{$type->short_desc_2}}</li>
                                <li>{{$type->short_desc_3}}</li>
                            </ul>

                        </div>
                    </div>
                </a>
            @endforeach
            @auth()
                <a class="text-black col-lg-4 col-12 col-sm-6 mb-3 text-my-grey2 new-item"
                   href="{{route('admin.licence_types.create')}}">
                    <div
                        class="bg-white my-shadow w-100 row h-100 justify-content-center align-content-center ms-0">
                        +
                    </div>
                </a>
            @endauth
        </div>
    </div>
@endsection
