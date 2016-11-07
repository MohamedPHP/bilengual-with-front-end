@extends('backend.layouts.backend-master')


@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Levels Table</h4>
                            <p class="category"><a href="#" id="Add_Level">Add New Level</a></p>
                        </div>
                        @if (count($errors) > 0)
                            <div class="col-md-8 col-md-offset-2">
                                @foreach ($errors->all() as $e)
                                    <div class="alert alert-danger">
                                        <button type="button" aria-hidden="true" class="close">×</button>
                                        <span><b> Success - </b> "{{ $e }}"</span>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        @if (Session::has('message'))
                            <div class="col-md-8 col-md-offset-2">
                                <div class="alert alert-success">
                                    <button type="button" aria-hidden="true" class="close">×</button>
                                    <span><b> Success - </b> "{{ Session::get('message') }}"</span>
                                </div>
                            </div>
                        @endif
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped">
                                <thead>
                                    <th>ID</th>
                                	<th>Name</th>
                                	<th>Quizes</th>
                                	<th>Creation Date</th>
                                	<th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($levels as $level)
                                        <tr>
                                        	<td>{{ $level->id }}</td>
                                        	<td>{{ $level->name }} {{ $level->number }}</td>
                                        	<td>{{ count($level->quizes) }}</td>
                                        	<td>{{ $level->created_at }}</td>
                                        	<td>
                                                <a href="{{ route('level.delete', ['id' => $level->id]) }}" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Add New Level -->
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="Add_Level_Modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel">Modal title</h4>
                </div>
                <form action="{{ route('levels.create') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="level">Level Content</label>
                            <input name="name" type="text" class="form-control" id="level" placeholder="level name" style="background-color:#fff; box-shadow: 3px 3px 10px #ccc;" autocomplete="off" value="level" disabled>
                        </div>
                        <div class="form-group">
                            <label for="level">Level Number</label>
                            <input name="number" type="number" class="form-control" id="level" placeholder="level number" style="background-color:#fff; box-shadow: 3px 3px 10px #ccc;" autocomplete="off">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- End Add New Level -->

@endsection


@section('scripts')
    <script type="text/javascript">
        $('#Add_Level').click(function (event) {
            event.preventDefault();
            $('#Add_Level_Modal').modal();
        });
        $('.close').click(function(event) {
            $(this).parent('.alert').fadeOut('500');
        });
    </script>
@endsection
