@extends('templates.default')
@section('content')
    <h1 class="text-center mt-4 ff-mrsw">Úprava študenta #{{$student->id}}</h1>
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
            <form action="{{route('admin.students.update',['student' => $student])}}" method="post" class="col-xl-7 col-md-9 col-12">
                @csrf
                @method('put')
                <div class="form-group row mb-3">
                    <label for="name" class="col-sm-3 col-form-label dont-wrap-words">Meno *</label>
                    <div class="col-sm-9">
                        <input type="text" id="name" name="name" value="{{old('name') ?? $student->name}}"
                               class="form-control"
                               required>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="email" class="col-sm-3 col-form-label dont-wrap-words">Email *</label>
                    <div class="col-sm-9">
                        <input type="email" id="email" name="email" value="{{old('email')?? $student->email}}"
                               class="form-control"
                               required>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="number" class="col-sm-3 col-form-label dont-wrap-words">Telefón</label>
                    <div class="col-sm-9">
                        <input type="tel" id="number" name="number" value="{{old('number')?? $student->number}}"
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
