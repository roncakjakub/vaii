@extends('templates.default')
@section('content')
    <h1 class="text-center mt-4 ff-mrsw">Študenti</h1>

    <div class="kurzy container mt-5 ff-crd">
        <div class="row justify-content-center">
            <table class="table w-75 bg-white text-my-grey2 my-shadow">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Meno</th>
                    <th scope="col">Email</th>
                    <th scope="col">Číslo</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($students as $s)
                    <tr class="align-middle">
                        <th scope="row">{{$s->id}}</th>
                        <td>{{$s->name}}</td>
                        <td>{{$s->email}}</td>
                        <td>{{$s->number ?: '-'}}</td>
                        <td class="text-end">
                            <a class="text-dark btn"
                               href="{{route('admin.students.edit',['student' => $s])}}"><i
                                    class="fas fa-edit"></i></a>
                            <button class="text-danger cursor-pointer btn"
                                    onclick="showDeleteModal(this,'{{route('admin.students.destroy',['student' => $s])}}')">
                                <i
                                    class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="5" class="text-center p-0">
                        <a class="text-dark" href="{{route('admin.students.create')}}">
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
