{!! Form::open(['route' => 'user.store', 'POST']) !!}
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('user.settings.administrators.first_name') }}</strong>
            {{ Form::text('first_name', null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('user.settings.administrators.last_name') }}</strong>
            {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('user.settings.administrators.email') }}</strong>
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('user.settings.administrators.role') }}</strong>
            {{ Form::select('role', [$roles], null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('user.settings.administrators.password') }}</strong>
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('user.settings.administrators.confirm_password') }}</strong>
            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-light">{{ __('user.settings.administrators.save') }}</button>
    </div>
{!! Form::close() !!}
