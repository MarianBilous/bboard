@extends('admin.layouts.layout')

@section('title', "BBS")

@section('content')

    @include('admin.includes.breadcrumb', ['title' => 'BBS'])

    <div class="card">
        <div class="card-body">
            <div>
                <h5></h5>
                <hr>
                <button id="table2-new-row-button" class="btn btn-light btn-sm mb-2">New Row</button>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered mb-0" id="table2">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="chat-message-container" id="panel-body">
    </div>

@endsection

@section('additional_js')
    <script>
        function yourFunction(){
            $.ajax({
                headers: {'X-CSRF-Token': '{{ csrf_token() }}'},
                type: "POST",
                url: "{{ url('/isRead') }}",
                datatype: 'html',
                data: {
                    'user_id': '1'
                },
                success: function (data) {
                    $('#panel-body').html(data);
                    //console.log(data.html);
                },
                error: function (e) {
                    console.log(e);
                }
            });

            setTimeout(yourFunction, 1000);
        }

        yourFunction();


    </script>
@endsection
