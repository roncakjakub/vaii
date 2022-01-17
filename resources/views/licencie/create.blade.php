@extends('templates.default')
@section('content')
    <h1 class="text-center mt-4 ff-mrsw">Nová licencia</h1>
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
            <form action="{{route('admin.licence_types.store')}}" method="post" class="col-xl-7 col-md-9 col-12">
                @csrf
                <div class="form-group row mb-3">
                    <label for="code" class="col-sm-3 col-form-label dont-wrap-words">Kód kurzu *</label>
                    <div class="col-sm-9">
                        <input type="text" id="code" name="code" value="{{old('code')}}" class="form-control" required maxlength="3">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="price" class="col-sm-3 col-form-label dont-wrap-words">Cena *</label>
                    <div class="col-sm-9">
                        <input type="number" id="price" name="price" value="{{old('price')}}" class="form-control" required step="0.01">
                    </div>

                </div>
                <div class="form-group row mb-3">
                    <label for="short_desc_1" class="col-sm-3 col-form-label dont-wrap-words">Popis 1 *</label>
                    <div class="col-sm-9">
                        <input type="text" id="short_desc_1" name="short_desc_1" value="{{old('short_desc_1')}}" class="form-control" required">
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="short_desc_2" class="col-sm-3 col-form-label dont-wrap-words">Popis 2 *</label>
                    <div class="col-sm-9">
                        <input type="text" id="short_desc_2" name="short_desc_2" value="{{old('short_desc_2')}}" class="form-control" required">
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="short_desc_3" class="col-sm-3 col-form-label dont-wrap-words">Popis 3 *</label>
                    <div class="col-sm-9">
                        <input type="text" id="short_desc_3" name="short_desc_3" value="{{old('short_desc_3')}}" class="form-control" required">
                    </div>
                </div>
                <div class="w-100 text-end">
                    <button type="submit" class="btn btn-success ">Odoslať</button>
                </div>
            </form>
        </div>
    </div>
@endsection
