@extends('backend.layouts.backend-master')

@section('styles')
    <style media="screen">
        .img-container{
            width: 200px;
            height: 200px;
        }
    </style>
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Questions Shape Table</h4>
                            <p class="category"><a href="#" id="Add_Quistion">Add Shape Question</a></p>
                        </div>
                        @if (count($errors) > 0)
                            <div class="col-md-8 col-md-offset-2">
                                @foreach ($errors->all() as $e)
                                    <div class="alert alert-danger">
                                        <button type="button" aria-hidden="true" class="close">×</button>
                                        <span><b> Error - </b> "{{ $e }}"</span>
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
                                	<th>Content</th>
                                	<th>Reffered Round</th>
                                	<th>Created At</th>
                                	<th>Actions</th>
                                </thead>
                                <tbody>
                                    @foreach ($questions as $q)
                                        <tr data-qid="{{ $q->id }}" data-roundid="{{ $q->round->id }}">
                                            <td>{{ $q->id }}</td>
                                            <td>
                                                <div class="img-container">
                                                    <img class="img-responsive img-rounded" src="{{ asset($q->content) }}" alt="" />
                                                </div>
                                            </td>
                                            <td>{{ $q->round->name }}</td>
                                            <td>{{ $q->created_at }}</td>
                                            <td>
                                                <a href="#" class="btn btn-success edit">Edit</a>
                                                <a href="{{ route('quistions.shape.delete', ['id' => $q->id]) }}" class="btn btn-danger">Delete</a>
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


    <!-- Start Add New Question -->
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="Add_Shape_Question_Modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel">Add New Question Shape</h4>
                </div>
                <form action="{{ route('quistions.shape.create') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Question Content</label>
                            <input type="file" name="shape_question_content" class="form-control" style="background-color:#fff; box-shadow: 3px 3px 10px #ccc;">
                        </div>
                        <div class="form-group">
                            <label for="">Reffered Round</label>
                            <select class="form-control" name="shape_question_round" style="background-color:#fff; box-shadow: 3px 3px 10px #ccc;">
                                <option value="">---------- Select A Round ----------</option>
                                @foreach ($rounds as $round)
                                    <option value="{{ $round->id }}">{{ $round->name }}</option>
                                @endforeach
                            </select>
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
    <!-- End Add New Question -->

    <!--Edit Modal-->
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="Edit_Question_Modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel">Edit Question Shape</h4>
                </div>
                <form action="{{ route('quistions.shape.update') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" id="id">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="Quize">Question Content</label>
                                <input id="shape_question_content" type="file" name="shape_question_content" class="form-control" style="background-color:#fff; box-shadow: 3px 3px 10px #ccc;">
                            </div>
                            <div class="form-group">
                                <label for="">Question Round</label>
                                <select id="shape_question_round" class="form-control" name="shape_question_round" style="background-color:#fff; box-shadow: 3px 3px 10px #ccc;">
                                    <option value="">---------- Select A Round ----------</option>
                                    @foreach ($rounds as $round)
                                        <option value="{{ $round->id }}">{{ $round->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="Seve_Question">Save changes</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!--End Edit Modal-->
@endsection



@section('scripts')
    <script type="text/javascript">
        $('#Add_Quistion').click(function (event) {
            event.preventDefault();
            $('#Add_Shape_Question_Modal').modal();
        });

        $('.edit').click(function (event) {
            event.preventDefault();
            var shape_question_id   = event.target.parentNode.parentNode.dataset['qid'];
            var shape_question_round      = event.target.parentNode.parentNode.dataset['roundid'];


            $('#id').val(shape_question_id);
            $('#shape_question_round').val(shape_question_round);

            $('#Edit_Question_Modal').modal(); // open the modal
        });


        $('.close').click(function(event) {
            $(this).parent('.alert').fadeOut('500');
        });
    </script>
@endsection
