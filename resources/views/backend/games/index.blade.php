@extends('backend.layouts.backend-master')


@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Games Table</h4>
                            <p class="category"><a href="#" id="Add_Game">Add Game</a></p>
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
                                	<th>Reffered Quize id</th>
                                	<th>Created_at</th>
                                	<th>Actions</th>

                                </thead>
                                <tbody>
                                    @foreach ($games as $game)
                                        <tr data-gameid="{{ $game->id }}">
                                            <td>{{ $game->id }}</td>
                                            <td>{{ $game->name }}</td>
                                            <td width="250" data-quizeid="{{ $game->quize->id }}">{{ $game->quize->name }}</td>
                                            <td>{{ $game->created_at }}</td>
                                            <td>
                                                <a href="#" class="btn btn-success edit">Edit</a>
                                                <a href="{{ route('games.delete', ['id' => $game->id]) }}" class="btn btn-danger">Delete</a>
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
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="Add_Game_Modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel">Add New Game</h4>
                </div>
                <form action="{{ route('games.create') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="Quize">Quize Content</label>
                            <input name="game_name" type="text" class="form-control" placeholder="Quize name" style="background-color:#fff; box-shadow: 3px 3px 10px #ccc;" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="Quize">Quize Level</label>
                            <select class="form-control" name="game_quize" style="background-color:#fff; box-shadow: 3px 3px 10px #ccc;">
                                <option value="">---------- Select A Quize ----------</option>
                                @foreach ($quizes as $quize)
                                    <option value="{{ $quize->id }}">{{ $quize->name }}</option>
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
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="Edit_Game_Modal">
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
                                <label for="Quize">Quize Content</label>
                                <input name="name" type="text" class="form-control" id="game_name" placeholder="Quize name" style="background-color:#fff; box-shadow: 3px 3px 10px #ccc;" autocomplete="off" >
                            </div>
                            <div class="form-group">
                                <label for="Quize">Quize Level</label>
                                <select class="form-control" name="quize_level" id="game_quize" style="background-color:#fff; box-shadow: 3px 3px 10px #ccc;" id="QuizeNumber">
                                    <option value="">---------- Select A Level ----------</option>
                                    @foreach ($quizes as $quize)
                                        <option value="{{ $quize->id }}">{{ $quize->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="Seve_Game">Save changes</button>
                    </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!--End Edit Modal-->
@endsection


@section('scripts')
    <script type="text/javascript">
        $('#Add_Game').click(function (event) {
            event.preventDefault();
            $('#Add_Game_Modal').modal();
        });

        var gameid = null;
        var gameNameElement = null;
        var gameQuizeElement = null;


        // preview The Modal On clicking in class edit
        $('.edit').click(function (event) {
            event.preventDefault();

            gameNameElement = event.target.parentNode.parentNode.childNodes[3]; // Detect The data Container
            gameQuizeElement = event.target.parentNode.parentNode.childNodes[5]; // Detect The data Container


            // set vars to get the text content of the selected element
            var game_name = gameNameElement.textContent.trim();
            var game_quize = gameQuizeElement.dataset['quizeid']; // use the data set to get the id بدل ما نعرضها جوا ال عنصر ذات نفسه
            gameid = event.target.parentNode.parentNode.dataset['gameid'];

            // Put The Data In The Edit field
            $('#game_name').val(game_name);
            $('#game_quize').val(game_quize);

            $('#Edit_Game_Modal').modal(); // open the modal
        });


        var token = '{{ Session::token()  }}';
        var url = '{{ route('games.update') }}';

        $('#Seve_Game').click(function (){
            $.ajax({
                method: 'POST',
                url: url,
                data: {
                    Name     : $('#game_name').val(),
                    quize_id : $('#game_quize').val(),
                    game_id  : gameid,
                    _token   : token
                },
            }).done(function (msg) {
                $(gameNameElement).text(msg['game_name']);
                $(gameQuizeElement).text(msg['game_quize_name']);
                $(gameQuizeElement).attr("data-quizeid", msg['game_quize_id']);
                $('#Edit_Game_Modal').modal('hide');
            });
        });



        /*=================== Edit ===================*/
        $('.close').click(function(event) {
            $(this).parent('.alert').fadeOut('500');
        });
    </script>
@endsection
