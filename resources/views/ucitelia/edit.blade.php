@extends('templates.default')
@section('content')
    <h1 class="text-center mt-4 ff-mrsw">Úprava učiteľa #{{$teacher->id}}</h1>
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
            <form action="{{route('admin.teachers.update',['teacher' => $teacher])}}" method="post" class="col-6 offset-3">
                @csrf
                @method('put')
                <div class="form-group row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Meno *</label>
                    <div class="col-sm-10">
                        <input type="text" id="name" name="name" value="{{old('name') ?? $teacher->name}}"
                               class="form-control"
                               required>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email *</label>
                    <div class="col-sm-10">
                        <input type="email" id="email" name="email" value="{{old('email')?? $teacher->email}}"
                               class="form-control"
                               required>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="number" class="col-sm-2 col-form-label">Telefón</label>
                    <div class="col-sm-10">
                        <input type="tel" id="number" name="number" value="{{old('number')?? $teacher->number}}"
                               class="form-control">
                    </div>
                </div>

                <div class="w-100 text-end">
                    <button type="submit" class="btn btn-success ">Odoslať</button>
                </div>
            </form>
        </div>
    </div>
@endsection
