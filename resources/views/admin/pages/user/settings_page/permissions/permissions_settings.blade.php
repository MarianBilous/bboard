<div class="card">
    <div class="card-body">

        @include('admin.includes.errors')

        <div>
            @can('permission-create')
                <button data-toggle="modal"
                        id="createButton"
                        data-target="#createModal"
                        data-attr="{{ route('permissions.create') }}"
                        class="btn btn-light btn-sm mb-2">
                    {{ __('user.settings.permissions.new_permission') }}
                </button>
            @endcan
            <hr>
            <div class="table-responsive" style="overflow-x:hidden !important;">
                <table class="table table-striped table-bordered mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ __('user.settings.permissions.name') }}</th>
                            <th scope="col">{{ __('user.settings.permissions.guard_name') }}</th>
                            <th scope="col">{{ __('user.settings.permissions.description') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permissions as $permission)
                            <tr>
                                <th scope="row">{{ $permission->id }}</th>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->guard_name }}</td>
                                <td>{{ $permission->description }}</td>
                                <td>
                                    <div class="btn-group pull-right">
                                        @can('permission-edit')
                                            <button data-toggle="modal"
                                                    id="editButton"
                                                    data-target="#editModal"
                                                    data-attr="{{ route('permissions.edit', $permission->id) }}"
                                                    class="btn btn-sm btn-default">
                                                <span class="fa fa-edit" > </span>
                                            </button>
                                        @endcan
                                        @can('permission-delete')
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id]]) !!}
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-default">
                                                    <span class="fa fa-trash" > </span>
                                                </button>
                                            {!! Form::close() !!}
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- edit modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog"
     aria-labelledby="mediumModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5>{{ __('user.settings.permissions.permissions_edit') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="editBody">

            </div>
        </div>
    </div>
</div>

<!-- create modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog"
     aria-labelledby="createModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5>{{ __('user.settings.permissions.permissions_create') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="createBody">

            </div>
        </div>
    </div>
</div>
