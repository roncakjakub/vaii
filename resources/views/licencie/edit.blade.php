@extends('templates.default')
@section('content')
    <h1 class="text-center mt-4 ff-mrsw">Úprava licencie {{$type->code}}</h1>

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

        <div class="row ">
            {!! Form::open(['route' => ['admin.licence_types.update',['type' => $type]], 'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'col-6 offset-3  mb-2']) !!}
            @method('put')
            <div class="form-group row mb-3">
                {!! Form::label('code','Kód kurzu', ['class' => 'col-sm-2 col-form-label']); !!}
                <div class="col-sm-10">
                    {!! Form::text('code', old('code') ?? $type->code, ['class' => 'form-control','required' => 'required','maxlength' => 3]); !!}
                </div>
            </div>
            <div class="form-group row mb-3">
                {!! Form::label('price','Cena', ['class' => 'col-sm-2 col-form-label']); !!}
                <div class="col-sm-10">
                    {!! Form::number('price', old('price') ?? $type->price, ['class' => 'form-control','required' => 'required','step' => '0.01']); !!}
                </div>
            </div>
            <div class="form-group row mb-3">
                {!! Form::label('short_desc_1','Popis 1', ['class' => 'col-sm-2 col-form-label']); !!}
                <div class="col-sm-10">
                    {!! Form::text('short_desc_1', old('short_desc_1') ?? $type->short_desc_1,['class' => 'form-control ','required' => 'required']); !!}
                </div>
            </div>

            <div class="form-group row mb-3">
                {!! Form::label('short_desc_2','Popis 2', ['class' => 'col-sm-2 col-form-label']); !!}
                <div class="col-sm-10">
                    {!! Form::text('short_desc_2', old('short_desc_2') ?? $type->short_desc_2,['class' => 'form-control ','required' => 'required']); !!}
                </div>
            </div>

            <div class="form-group row mb-3">
                {!! Form::label('short_desc_3','Popis 3', ['class' => 'col-sm-2 col-form-label']); !!}
                <div class="col-sm-10">
                    {!! Form::text('short_desc_3', old('short_desc_3') ?? $type->short_desc_3,['class' => 'form-control ','required' => 'required']); !!}
                </div>
            </div>

            {!! Form::submit('Uložiť', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}

        </div>
            <div class="row ">
                {!! Form::open(['route' => ['admin.courses.destroy',['course' => $type]], 'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'col-6 offset-3']) !!}
                @method('delete')
                {!! Form::submit('Vymazať', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}

            </div>
    </div>
@endsection
