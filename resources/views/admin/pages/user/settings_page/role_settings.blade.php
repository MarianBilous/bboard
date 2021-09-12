<div class="card">
    <div class="card-body">

        @include('admin.includes.errors')

        <div>
            <h5></h5>
            @can('role-create')
                <button data-toggle="modal"
                        id="createButton"
                        data-target="#createModal"
                        data-attr="{{ route('roles.create') }}"
                        class="btn btn-light btn-sm mb-2">
                    {{ __('user.settings.roles.new_role') }}
                </button>
            @endcan
            <hr>
            <div class="table-responsive" style="overflow-x:hidden !important;">
                <table class="table table-striped table-bordered mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ __('user.settings.roles.name') }}</th>
                            <th scope="col">{{ __('user.settings.roles.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <th scope="row">{{ $role->id }}</th>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <div class="btn-group pull-right">
                                        @if($role->id != 1)
                                            @can('role-edit')
                                                <button data-toggle="modal"
                                                        id="editButton"
                                                        data-target="#editModal"
                                                        data-attr="{{ route('roles.edit', $role->id) }}"
                                                        class="btn btn-sm btn-default">
                                                    <span class="fa fa-edit" > </span>
                                                </button>
                                            @endcan
                                            @can('role-delete')
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id]]) !!}
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-default">
                                                        <span class="fa fa-trash" > </span>
                                                    </button>
                                                {!! Form::close() !!}
                                            @endcan
                                        @endif
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
                <h5>{{ __('user.settings.roles.edit_role') }}</h5>
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
                <h5>{{ __('user.settings.roles.create_role') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="createBody">

            </div>
        </div>
    </div>
</div>
