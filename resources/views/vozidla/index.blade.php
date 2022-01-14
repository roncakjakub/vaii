@extends('templates.default')
@section('content')
    <h1 class="text-center mt-4 ff-mrsw">Vozidlá</h1>

    <div class="kurzy container mt-5 ff-crd">
        <div class="row justify-content-center">
            <table class="table w-75 bg-white text-my-grey2 my-shadow">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Názov</th>
                    <th scope="col">Preferovaná licencia</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($vehicles as $v)
                    <tr class="align-middle">
                        <th scope="row">{{$v->id}}</th>
                        <td>{{$v->name}}</td>
                        <td>{{$v->preferred_licence_type_code}}</td>
                        <td class="text-end">
                            <a class="text-dark btn"
                               href="{{route('admin.vehicles.edit',['vehicle' => $v])}}"><i
                                    class="fas fa-edit"></i></a>
                            <button class="text-danger cursor-pointer btn"
                                    onclick="showDeleteModal(this,'{{route('admin.vehicles.destroy',['vehicle' => $v])}}')">
                                <i
                                    class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="5" class="text-center p-0">
                        <a class="text-dark" href="{{route('admin.vehicles.create')}}">
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
