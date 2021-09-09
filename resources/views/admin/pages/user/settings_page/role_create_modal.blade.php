<!-- create modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog"
     aria-labelledby="createModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5>{{ __('user.settings.roles.create_role') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::model(['route' => 'roles.store', 'POST']) !!}
                @csrf
                <div class="modal-body" id="createBody">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('user.settings.roles.name') }}</strong>
                            {!! Form::text('name', null, array('class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('user.settings.roles.permission') }}</strong>
                            @foreach($permission as $value)
                                <div class="custom-control custom-checkbox">
                                    {{ Form::checkbox('permission[]', $value->id, false, ['class' => 'custom-control-input', 'id' => 'permission' . $loop->index]) }}
                                    {{ Form::label('permission' . $loop->index, $value->name, ['class' => 'custom-control-label']) }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-light">{{ __('user.settings.roles.save') }}</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
