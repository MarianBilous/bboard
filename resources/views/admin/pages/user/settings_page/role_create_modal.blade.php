{!! Form::open(['route' => 'roles.store', 'method' => 'POST']) !!}
    @method('POST')
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('user.settings.roles.name') }}</strong>
            {!! Form::text('name', null, array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ __('user.settings.roles.permission') }}</strong>
            @foreach($permissions as $value)
                <div class="custom-control custom-checkbox">
                    {{ Form::checkbox('permission[]', $value->id, false, ['class' => 'custom-control-input', 'id' => 'permission' . $loop->index]) }}
                    {{ Form::label('permission' . $loop->index, $value->name, ['class' => 'custom-control-label']) }}
                </div>
            @endforeach
        </div>
        </div>
    <div class="modal-footer">
        {{Form::submit(__('user.settings.roles.save'), ['class' => 'btn btn-light'])}}
    </div>
{!! Form::close() !!}
