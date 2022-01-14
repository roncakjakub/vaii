@extends('templates.default')
@section('content')
    <h1 class="text-center mt-4 ff-mrsw">Kurzy</h1>

    <div class="kurzy container mt-5 ff-crd">
        <div class="row justify-content-center">
            <table class="table w-75 bg-white text-my-grey2 my-shadow">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Typ</th>
                    <th scope="col">Od</th>
                    <th scope="col">Do</th>
                    <th scope="col">Použité vozidlo</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($courses as $i =>  $c)
                    <tr class="align-middle">
                        <th scope="row">{{$c->id}}</th>
                        <td>{{$c->licence_type_code}}</td>
                        <td>{{$c->date_from_formatted}}</td>
                        <td>{{$c->date_to_formatted}}</td>
                        <td>{{$c->vehicle->name ?? '-'}}</td>
                        <td class="text-end">
                            <a class="text-dark btn"
                               href="{{route('admin.courses.edit',['course' => $c])}}"><i
                                    class="fas fa-edit"></i></a>
                            <button class="text-danger cursor-pointer btn"
                                    onclick="showDeleteModal(this,'{{route('admin.courses.destroy',['course' => $c])}}')">
                                <i
                                    class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="6" class="text-center p-0">
                        <a class="text-dark" href="{{route('admin.courses.create')}}">
                            <div class="w-100" style="background-color: lightgrey">
                                <i class="fas fa-plus mx-3 my-3"></i></div>
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>
@endsection
