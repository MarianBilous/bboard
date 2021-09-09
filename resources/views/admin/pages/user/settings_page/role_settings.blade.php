<div class="card">
    <div class="card-body">

        @include('admin.includes.errors')

        <div>
            <h5></h5>
            @can('role-create')
                <button data-toggle="modal"
                        id="createButton"
                        data-target="#createModal"
                        data-attr="{{ route('user.create') }}"
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
<div class="show-edit-modal">

</div>
{{--@include('admin.pages.user.settings_page.role_edit_modal')--}}

@include('admin.pages.user.settings_page.role_create_modal')
