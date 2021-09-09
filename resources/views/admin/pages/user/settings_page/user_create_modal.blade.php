<!-- create modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog"
     aria-labelledby="createModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5>{{ __('user.settings.administrators.create_user') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::model(['route' => 'user.store', 'POST']) !!}
                @csrf
                <div class="modal-body" id="createBody">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('user.settings.administrators.first_name') }}</strong>
                            {!! Form::text('first_name', null, array('class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('user.settings.administrators.last_name') }}</strong>
                            {!! Form::text('last_name', null, array('class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('user.settings.administrators.email') }}</strong>
                            {!! Form::text('email', null, array('class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('user.settings.administrators.password') }}</strong>
                            {!! Form::password('password', array('class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('user.settings.administrators.confirm_password') }}</strong>
                            {!! Form::password('password_confirmation', array('class' => 'form-control')) !!}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-light">{{ __('user.settings.administrators.save') }}</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
