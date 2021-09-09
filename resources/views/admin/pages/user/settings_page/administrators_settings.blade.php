<div class="card">
    <div class="card-body">
        @include('admin.includes.errors')
        <div>
            <h5></h5>
            <button data-toggle="modal"
                    id="createButton"
                    data-target="#createModal"
                    data-attr="{{ route('user.create') }}"
                    class="btn btn-light btn-sm mb-2">
                {{ __('user.settings.administrators.new_user') }}
            </button>
            <hr>
            <div class="table-responsive" style="overflow-x:hidden !important;">
                <table class="table table-striped table-bordered mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ __('user.settings.administrators.full_name') }}</th>
                            <th scope="col">{{ __('user.settings.administrators.email') }}</th>
                            <th scope="col">{{ __('user.settings.administrators.roles') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->full_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>greg</td>
                                @if($user->id != 1)
                                    <td>
                                        <div class="btn-group pull-right">
                                            <button data-toggle="modal"
                                                    id="editButton"
                                                    data-target="#editModal"
                                                    data-attr="{{ route('user.edit', $user->id) }}"
                                                    class="btn btn-sm btn-default">
                                                <span class="fa fa-edit" > </span>
                                            </button>

                                            {!! Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user->id]]) !!}
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-default">
                                                    <span class="fa fa-trash" > </span>
                                                </button>
                                            {!! Form::close() !!}
                                        </div>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('admin.pages.user.settings_page.user_edit_modal')

@include('admin.pages.user.settings_page.user_create_modal')
