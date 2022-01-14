@extends('templates.default')
@section('content')
    <h1 class="text-center mt-4 ff-mrsw">Nový kurz</h1>
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

        <div class="row">
            <form action="{{route('admin.courses.store')}}" method="post" class="col-6 offset-3">
                @csrf
                <div class="form-group row mb-3">
                    <label for="licence_type_code" class="col-sm-2 col-form-label">Typ *</label>
                    <div class="col-sm-10">
                        <select name="licence_type_code" required id="licence_type_code"
                                class="select2 w-100">
                            @foreach($licenceTypes as $type)
                                <option {{old('license_type_code') == $type->code ? 'selected': ''}}
                                        value="{{$type->code}}">{{$type->code}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="date_from" class="col-sm-2 col-form-label">Od *</label>
                    <div class="col-sm-10">
                        <input type="date" id="date_from" name="date_from" value="{{old('date_from')}}"
                               class="form-control"
                               required step="0.01">
                    </div>

                </div>
                <div class="form-group row mb-3">
                    <label for="date_to" class="col-sm-2 col-form-label">Do *</label>
                    <div class="col-sm-10">
                        <input type="date" id="date_to" name="date_to" value="{{old('date_to')}}"
                               class="form-control" required>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="capacity" class="col-sm-2 col-form-label">Kapacita *</label>
                    <div class="col-sm-10">
                        <input type="number" id="capacity" name="capacity" value="{{old('capacity')}}"
                               class="form-control" required min="0">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="vehicle_id" class="col-sm-2 col-form-label">Použité vozidlo</label>
                    <div class="col-sm-10">
                        <select name="vehicle_id" id="vehicle_id"
                                class="select2 w-100">
                            @foreach($vehicles as $v)
                                <option {{old('license_type_code') == $v->id ? 'selected': ''}}
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
