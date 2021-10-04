@extends('admin.layouts.layout')

@section('content')

    @include('admin.includes.breadcrumb', ['title' => __('authors.create')])

    @include('admin.includes.errors')

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'authors.store', 'method' => 'POST']) !!}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <strong>{{ __('authors.name') }}</strong>
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-6">
                        <strong>{{ __('authors.surname') }}</strong>
                        {!! Form::text('surname', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                {{Form::submit(__('authors.create'), ['class' => 'btn btn-light'])}}
            {!! Form::close() !!}
        </div>
    </div>

@endsection
