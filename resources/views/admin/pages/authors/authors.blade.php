@extends('admin.layouts.layout')

@section('content')

    {{ Breadcrumbs::render('authors.index') }}

    <div class="card">
        <div class="card-body">
            <div>
                <a href="{{ route('authors.create') }}"
                        class="btn btn-light btn-sm mb-2">
                    {{ __('authors.new_author') }}
                </a>
                <hr>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">{{ __('authors.id') }}</th>
                                <th scope="col">{{ __('authors.name') }}</th>
                                <th scope="col">{{ __('authors.surname') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($authors as $author)
                                <tr>
                                    <th scope="row">{{ $author->id }}</th>
                                    <td>{{ $author->name }}</td>
                                    <td>{{ $author->surname }}</td>
                                    <td>
                                        <div class="btn-group pull-right">
                                            <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-sm btn-default">
                                                <span class="fa fa-edit"> </span>
                                            </a>

                                            {{ Form::open(['method' => 'DELETE', 'route' => ['authors.destroy', $author->id]]) }}
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
