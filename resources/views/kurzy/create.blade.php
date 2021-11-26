@extends('templates.default')
@section('content')
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
            {!! Form::open(['action' =>'App\Http\Controllers\CourseController@store', 'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'col-6 offset-3 ']) !!}
            <div class="form-group row mb-3">
                {!! Form::label('code','Kód kurzu', ['class' => 'col-sm-2 col-form-label']); !!}
                <div class="col-sm-10">
                    {!! Form::text('code', old('code') , ['class' => 'form-control','required' => 'required','maxlength' => 3]); !!}
                </div>
            </div>
            <div class="form-group row mb-3">
                {!! Form::label('price','Cena', ['class' => 'col-sm-2 col-form-label']); !!}
                <div class="col-sm-10">
                    {!! Form::number('price', old('price'), ['class' => 'form-control','required' => 'required','step'=>'0.01']); !!}
                </div>
            </div>
            <div class="form-group row mb-3">
                {!! Form::label('short_desc_1','Popis 1', ['class' => 'col-sm-2 col-form-label']); !!}
                <div class="col-sm-10">
                    {!! Form::text('short_desc_1', old('short_desc_1'),['class' => 'form-control ','required' => 'required']); !!}
                </div>
            </div>

            <div class="form-group row mb-3">
                {!! Form::label('short_desc_2','Popis 2', ['class' => 'col-sm-2 col-form-label']); !!}
                <div class="col-sm-10">
                    {!! Form::text('short_desc_2', old('short_desc_2'),['class' => 'form-control ','required' => 'required']); !!}
                </div>
            </div>

            <div class="form-group row mb-3">
                {!! Form::label('short_desc_3','Popis 3', ['class' => 'col-sm-2 col-form-label']); !!}
                <div class="col-sm-10">
                    {!! Form::text('short_desc_3', old('short_desc_3'),['class' => 'form-control ','required' => 'required']); !!}
                </div>
            </div>

            {!! Form::submit('Uloźiť', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
