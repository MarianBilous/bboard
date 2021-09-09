<!-- edit modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog"
     aria-labelledby="mediumModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5>{{ __('user.settings.roles.edit_role') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{ dump($permissions) }}
            <form method="POST" action="{{ route('roles.update', $role->id) }}">
                @method('patch')
                @csrf
                <input value="{{ $role->name }}">
            </form>
            {!! Form::model($role, ['method' => 'patch', 'route' => ['roles.update', $role->id]]) !!}
                <div class="modal-body" id="editBody">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('user.settings.roles.name') }}</strong>
                            {{ Form::text('name', $role->name, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    @if(isset($permissions))
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>{{ __('user.settings.roles.permission') }}</strong>
                                @foreach($permissions as $value)
                                    <div class="custom-control custom-checkbox">
                                        {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, ['class' => 'custom-control-input', 'id' => 'permission' . $loop->index]) }}
                                        {{ Form::label('permission' . $loop->index, $value->name, ['class' => 'custom-control-label']) }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-light">{{ __('user.settings.roles.save') }}</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
