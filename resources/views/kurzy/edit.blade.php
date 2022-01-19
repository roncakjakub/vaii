@extends('templates.default')
@section('content')
    <h1 class="text-center mt-4 ff-mrsw">Úprava kurzu #{{$course->id}}</h1>

    <div class="kurzy container mt-5 ff-crd">
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

        <div class="row justify-content-center">
            <form action="{{route('admin.courses.update',['course' => $course])}}" method="post"
                  class="col-xl-7 col-md-9 col-12">
                @csrf
                @method('put')

                <div class="form-group row mb-3">
                    <label for="licence_type_code" class="col-sm-3 col-form-label dont-wrap-words">Typ
                        *</label>
                    <div class="col-sm-9">
                        <select name="licence_type_code" required id="licence_type_code"
                                class="select2 w-100">
                            <option value="">Vyberte</option>
                            @foreach($licenceTypes as $type)
                                <option
                                    {{(old('licence_type_code')== $type->code || (!old('licence_type_code') && $course->licence_type_code == $type->code)) ? 'selected': ''}}
                                    value="{{$type->code}}">{{$type->code}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="date_from" class="col-sm-3 col-form-label dont-wrap-words">Od *</label>
                    <div class="col-sm-9">
                        <input type="date" id="date_from" name="date_from"
                               value="{{old('date_from') ?? $course->date_from}}"
                               class="form-control"
                               required step="0.01">
                    </div>

                </div>
                <div class="form-group row mb-3">
                    <label for="date_to" class="col-sm-3 col-form-label dont-wrap-words">Do *</label>
                    <div class="col-sm-9">
                        <input type="date" id="date_to" name="date_to"
                               value="{{old('date_to') ?? $course->date_to}}"
                               class="form-control" required>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="capacity" class="col-sm-3 col-form-label dont-wrap-words">Kapacita *</label>
                    <div class="col-sm-9">
                        <input type="number" id="capacity" name="capacity"
                               value="{{old('capacity') ?? $course->capacity}}"
                               class="form-control" required min="0">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="vehicle_id" class="col-sm-3 col-form-label dont-wrap-words">Použité
                        vozidlo</label>
                    <div class="col-sm-9">
                        <select name="vehicle_id" id="vehicle_id"
                                class="select2 w-100">
                            <option value="">Vyberte</option>
                            @foreach($vehicles as $v)
                                <option
                                    {{(old('vehicle_id') == $v->id || (!old('vehicle_id') && $course->vehicle_id == $v->id)) ? 'selected': ''}}
                                    value="{{$v->id}}">{{$v->brand}} {{$v->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="w-100 text-end">
                    <button type="submit" class="btn btn-success ">Odoslať</button>
                </div>
            </form>
        </div>
    </div>
@endsection
