@extends('admin.layouts.layout')

@section('content')

    {{ Breadcrumbs::render('genres.create') }}

    @include('admin.includes.errors')

    <div class="card">
        <div class="card-body">
            {{ Form::open(['route' => 'genres.store', 'method' => 'POST']) }}
                <div class="form-group col-md-6">
                    <strong>{{ __('genres.name') }}</strong>
                    {{ Form::text('name', null, ['class' => 'form-control']) }}
                </div>
                <div class="custom-control custom-switch ml-3">
                    <input type="checkbox" class="custom-control-input" name="is_enabled" id="is_enabled">
                    <label class="custom-control-label" for="is_enabled">{{ __('genres.is_enabled') }}</label>
                </div>
                <hr>
                {{ Form::submit(__('genres.create'), ['class' => 'btn btn-light']) }}
            {{ Form::close() }}
        </div>
    </div>

@endsection
