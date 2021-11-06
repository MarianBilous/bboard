@extends('admin.layouts.layout')

@section('content')

    @include('admin.includes.breadcrumb', ['title' => __('genres.title')])

    <div class="card">
        <div class="card-body">
            <div>
                <h5></h5>
                <hr>
                <a href="{{ route('genres.create') }}"
                        class="btn btn-light btn-sm mb-2">
                    {{ __('genres.new_genre') }}
                </a>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">{{ __('genres.id') }}</th>
                                <th scope="col">{{ __('genres.name') }}</th>
                                <th scope="col">{{ __('genres.is_enabled') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($genres as $genre)
                                <tr>
                                    <th scope="row">{{ $genre->id }}</th>
                                    <td>{{ $genre->name }}</td>
                                    <td>{{ $genre->is_enabled_to_string }}</td>
                                    <td>
                                        <div class="btn-group pull-right">
                                            <a href="{{ route('genres.edit', $genre->id) }}" class="btn btn-sm btn-default">
                                                <span class="fa fa-edit"> </span>
                                            </a>

                                            {{ Form::open(['method' => 'DELETE', 'route' => ['genres.destroy', $genre->id]]) }}
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-default">
                                                    <span class="fa fa-trash"></span>
                                                </button>
                                            {{ Form::close() }}
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

@endsection
