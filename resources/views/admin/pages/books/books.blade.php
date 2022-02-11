@extends('admin.layouts.layout')

@section('content')

    {{ Breadcrumbs::render('books.index') }}

    <div class="card">
        <div class="card-body">
            <div>
                <h5></h5>
                <a href="{{ route('books.create') }}"
                   class="btn btn-light btn-sm mb-2">
                    {{ __('books.new_book') }}
                </a>
                <hr>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">{{ __('books.labels.id') }}</th>
                                <th scope="col">{{ __('books.labels.title') }}</th>
                                <th scope="col">{{ __('books.labels.author') }}</th>
                                <th scope="col">{{ __('books.labels.genre') }}</th>
                                <th scope="col">{{ __('books.labels.year') }}</th>
                                <th scope="col">{{ __('books.labels.inventory_number') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($books as $book)
                                <tr>
                                    <th scope="row">{{ $book->id }}</th>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->author->full_name }}</td>
                                    <td>{{ $book->genre->name }}</td>
                                    <td>{{ $book->year }}</td>
                                    <td>{{ $book->inventory_number }}</td>
                                    <td>
                                        <div class="btn-group pull-right">
                                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm btn-default">
                                                <span class="fa fa-edit"> </span>
                                            </a>

                                            {{ Form::open(['method' => 'DELETE', 'route' => ['books.destroy', $book->id]]) }}
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
