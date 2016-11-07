@extends('backend.layouts.backend-master')


@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Questions Table</h4>
                            <p class="category"><a href="#" id="Add_Quistion">Add Question</a></p>
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
                                	<th>Reffered Game</th>
                                	<th>Created At</th>
                                	<th>Actions</th>
                                </thead>
                                <tbody>
                                    @foreach ($questions as $q)
                                        <tr data-qid="{{ $q->id }}">
                                            <td>{{ $q->id }}</td>
                                            <td>{{ $q->content }}</td>
                                            <td data-gameid="{{ $q->game_id }}">{{ $q->game->name }}</td>
                                            <td>{{ $q->created_at }}</td>
                                            <td>
                                                <a href="#" class="btn btn-success edit">Edit</a>
                                                <a href="{{ route('question.delete', ['id' => $q->id]) }}" class="btn btn-danger">Delete</a>
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





    <!-- Start Add New Quize -->
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="Add_Question_Modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel">Add New Question</h4>
                </div>
                <form action="{{ route('question.create') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="Quize">Question Content</label>
                            <textarea name="question_content" class="form-control" rows="8" cols="40" style="background-color:#fff; box-shadow: 3px 3px 10px #ccc;"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="Quize">Reffered Game</label>
                            <select class="form-control" name="question_game_id" style="background-color:#fff; box-shadow: 3px 3px 10px #ccc;">
                                <option value="">---------- Select A Game ----------</option>
                                @foreach ($games as $game)
                                    <option value="{{ $game->id }}">{{ $game->name }}</option>
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
    <!-- End Add New Quize -->

    <!--Edit Modal-->
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="Edit_Question_Modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel">Edit Game</h4>
                </div>
                <form action="#" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="Quize">Question Content</label>
                            <textarea id="question_content" name="question_content" rows="8" class="form-control" cols="40" style="background-color:#fff; box-shadow: 3px 3px 10px #ccc;"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="Quize">Quize Level</label>
                            <select id="question_game_id" class="form-control" name="question_game_id" style="background-color:#fff; box-shadow: 3px 3px 10px #ccc;">
                                <option value="">---------- Select A Game ----------</option>
                                @foreach ($games as $game)
                                    <option value="{{ $game->id }}">{{ $game->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="Seve_Question">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!--End Edit Modal-->
@endsection



@section('scripts')
    <script type="text/javascript">
        $('#Add_Quistion').click(function (event) {
            event.preventDefault();
            $('#Add_Question_Modal').modal();
        });

        var qid = null;
        var contentElement = null;
        var gameidElement = null;

        $('.edit').click(function (event) {
            event.preventDefault();

            // set vars to get the text content of the selected element
            contentElement = event.target.parentNode.parentNode.childNodes[3];
            gameidElement = event.target.parentNode.parentNode.childNodes[5];

            // set vars to get the text content of the selected element
            var question_content = contentElement.textContent.trim();
            var question_game = gameidElement.dataset['gameid'];
            qid = event.target.parentNode.parentNode.dataset['qid'];

            // Put The Data In The Edit field
            $('#question_content').val(question_content);
            $('#question_game_id').val(question_game);



            $('#Edit_Question_Modal').modal(); // open the modal
        });

        var token = '{{ Session::token()  }}';
        var url = '{{ route('question.update') }}';

        $('#Seve_Question').click(function () {
            $.ajax({
                method: 'POST',
                url: url,
                data: {
                    question_content : $('#question_content').val(),
                    question_game_id : $('#question_game_id').val(),
                    qid : qid,
                    _token : token,
                },
            }).done(function (msg) {
                $(contentElement).text(msg['question_content']);
                $(gameidElement).text(msg['question_game_name']);
                $(gameidElement).attr("data-gameid", msg['question_game_id']);
                $('#Edit_Question_Modal').modal('hide');
            })
        });



        $('.close').click(function(event) {
            $(this).parent('.alert').fadeOut('500');
        });
    </script>
@endsection
