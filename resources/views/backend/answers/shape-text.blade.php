@extends('backend.layouts.backend-master')


@section('styles')
    <style media="screen">
        .answer{
            background-color: #eee;
            margin: 15px 0;
            padding: 5px;
            border-radius: 5px;
            box-shadow: 2px 2px 5px #ccc;
        }
        .img-container{
            width: 200px;
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
                            <h4 class="title">Striped Table</h4>
                            <p class="category"><a href="#" id="View_Answers_Modal">Add Answer For Spescific Question</a></p>
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
                            <table class="table table-striped table-sm">
                                <thead>
                                    <th>ID</th>
                                	<th>Question Content</th>
                                	<th>Question Answers</th>
                                </thead>
                                <tbody>
                                    @foreach ($questions as $question)
                                        <tr>
                                            <td width="50">{{ $question->id }}</td>
                                            <td>
                                                <div class="img-container">
                                                    <img class="img-responsive" src="{{ asset($question->content) }}" alt="" />
                                                </div>
                                            </td>
                                            <td width="500">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        @if (count(App\Answer::where('question_id', $question->id)->get()) > 0)
                                                            <ul class="list-unstyled">
                                                                @foreach (App\Answer::where('question_id', $question->id)->get() as $answer)
                                                                    <li class="answer" data-answercontent="{{$answer->content}}" data-questionid="{{$question->id}}" data-answerid="{{$answer->id}}">
                                                                        <div class="row">
                                                                            <div class="col-md-7">{{$answer->content}}</div>
                                                                            @if ($answer->result == 1)
                                                                                <div class="col-md-1">
                                                                                    <span class="badge"><i class="fa fa-check" aria-hidden="true"></i></span>
                                                                                </div>
                                                                            @endif
                                                                            <div class="col-md-4 pull-right">
                                                                                <a href="#" class="btn btn-sm btn-success answer_singel">Edit</a>
                                                                                <a href="{{ route('answer.question-shape.answer-text.delete', ['id' => $answer->id]) }}" class="btn btn-sm btn-danger">Delete</a>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @else
                                                            <div class="alert alert-danger">No Answers For This Question</div>
                                                        @endif
                                                    </div>
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
        </div>
    </div>


    <!-- Start Add New Quize -->
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="Answers_Modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel">Add New Answer</h4>
                </div>
                <form action="{{ route('answers.question-shape.answer-text.create') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Answers Content</label>
                            <div class="input-group" style="background-color:#fff; box-shadow: 3px 3px 10px #ccc;">
                                <span class="input-group-addon">
                                    mark as right
                                    <input type="radio" name="answer_1_ckeck" value="1">
                                </span>
                                <input type="text" class="form-control" name="answer_1" style="background-color:#fff; box-shadow: 3px 3px 10px #ccc;">
                            </div><!-- /input-group -->


                            <div class="input-group" style="background-color:#fff; box-shadow: 3px 3px 10px #ccc;">
                                <span class="input-group-addon">
                                    mark as right
                                    <input type="radio" name="answer_2_ckeck" value="1">
                                </span>
                                <input type="text" class="form-control" name="answer_2" style="background-color:#fff; box-shadow: 3px 3px 10px #ccc;">
                            </div><!-- /input-group -->


                            <div class="input-group" style="background-color:#fff; box-shadow: 3px 3px 10px #ccc;">
                                <span class="input-group-addon">
                                    mark as right
                                    <input type="radio" name="answer_3_ckeck" value="1">
                                </span>
                                <input type="text" class="form-control" name="answer_3" style="background-color:#fff; box-shadow: 3px 3px 10px #ccc;">
                            </div><!-- /input-group -->


                            <div class="input-group" style="background-color:#fff; box-shadow: 3px 3px 10px #ccc;">
                                <span class="input-group-addon">
                                    mark as right
                                    <input type="radio" name="answer_4_ckeck" value="1">
                                </span>
                                <input type="text" class="form-control" name="answer_4" style="background-color:#fff; box-shadow: 3px 3px 10px #ccc;">
                            </div><!-- /input-group -->
                        </div>
                        <div class="form-group">
                            <label for="">Reffered Question</label>
                            <select class="form-control" name="question_id" style="background-color:#fff; box-shadow: 3px 3px 10px #ccc;">
                                <option value="">---------- Select A Question ----------</option>
                                @foreach ($questions as $question)
                                    <option value="{{ $question->id }}">{{ $question->content }}</option>
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
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="Edit_Single_Answer_Modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel">Edit Game</h4>
                </div>
                <form action="{{ route('answer.question-shape.answer-text.update') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" id="id" value="">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Answer Content</label>
                            <input type="text" name="answercontent" id="answercontent" placeholder="answer_content" class="form-control" style="background-color:#fff; box-shadow: 3px 3px 10px #ccc;" value="sdftgdsrgsdghdryh">
                        </div>
                        <div class="form-group">
                            <label for="">Question</label>
                            <select name="questionid" id="questionid" class="form-control" style="background-color:#fff; box-shadow: 3px 3px 10px #ccc;">
                                <option value="">---------- Select A Question ----------</option>
                                @foreach ($questions as $question)
                                    <option value="{{ $question->id }}">{{ $question->content }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save changes</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!--End Edit Modal-->

@endsection



@section('scripts')
    <script type="text/javascript">
        $('#View_Answers_Modal').click(function (event) {
            event.preventDefault();
            $('#Answers_Modal').modal();
        });

        $('.answer_singel').click(function (event) {
            event.preventDefault();
            // answercontent
            // questionid
            // answerid
            var answercontent = event.target.parentNode.parentNode.parentNode.dataset['answercontent'];
            var questionid = event.target.parentNode.parentNode.parentNode.dataset['questionid'];
            var answerid = event.target.parentNode.parentNode.parentNode.dataset['answerid'];

            $('#id').val(answerid);
            $('#answercontent').val(answercontent);
            $('#questionid').val(questionid);

            $('#Edit_Single_Answer_Modal').modal();
        });

        $('.close').click(function(event) {
            $(this).parent('.alert').fadeOut('500');
        });
    </script>
@endsection
