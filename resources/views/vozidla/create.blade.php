@extends('templates.default')
@section('content')
    <h1 class="text-center mt-4 ff-mrsw">Nové vozidlo</h1>
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
            <form action="{{route('admin.vehicles.store')}}" method="post" class="col-6 offset-3">
                @csrf
                <div class="form-group row mb-3">
                    <label for="licence_type_code" class="col-sm-2 col-form-label">Preferovaná licencia</label>
                    <div class="col-sm-10">
                        <select name="preferred_licence_type_code" id="preferred_licence_type_code"
                                class="select2 w-100">
                            @foreach($licenceTypes as $type)
                                <option {{old('license_type_code') == $type->code ? 'selected': ''}}
                                        value="{{$type->code}}">{{$type->code}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Názov *</label>
                    <div class="col-sm-10">
                        <input type="text" id="name" name="name" value="{{old('name')}}"
                               class="form-control"
                               required>
                    </div>
                </div>

                <div class="w-100 text-end">
                    <button type="submit" class="btn btn-success ">Odoslať</button>
                </div>
            </form>
        </div>
    </div>
@endsection
