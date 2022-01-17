@extends('templates.default')
@section('content')
    <h1 class="text-center mt-4 ff-mrsw">Kurzy</h1>

    <div class="kurzy container mt-5 ff-crd">
        <div class="row justify-content-center">
            <table class="table w-75 bg-white text-my-grey2 my-shadow text-center">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Typ</th>
                    <th scope="col">Termín</th>
                    <th scope="col" class="d-none d-md-table-cell">Použité vozidlo</th>
                    <th scope="col">Prihlásení</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($courses as $i =>  $c)
                    <tr class="align-middle">
                        <th scope="row">{{$c->id}}</th>
                        <td>{{$c->licence_type_code}}</td>
                        <td>{{$c->date_from_formatted}} - {{$c->date_to_formatted}}</td>
                        <td class="d-none d-md-table-cell">{{$c->vehicle->name ?? '-'}}</td>
                        <td>
                            <div class="lineProgressBarContainer position-relative" data-capacity="{{$c->capacity}}" data-actual-students-count="{{$c->actualStudentsCount}}" style="height: 4px;width: 100%"></div>
                        </td>
                        <td class="text-lg-end">
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
