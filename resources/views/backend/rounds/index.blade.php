@extends('backend.layouts.backend-master')


@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Head</h4>
                            <p class="category"><a href="#" id="Add_Round">Add Round</a></p>
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
                                    <th>id</th>
                                	<th>name</th>
                                	<th>game_id</th>
                                	<th>created_at</th>
                                	<th>actions</th>
                                </thead>
                                <tbody>
                                    @foreach ($rounds as $round)
                                        <tr class="container-row container-row-{{ $round->id }}">
                                            <td>{{ $round->id }}</td>
                                            <td class="name" data-id="{{ $round->id }}">{{ $round->name }}</td>
                                            <td class="game" data-gameid="{{ $round->game_id }}">{{ $round->game->name }}</td>
                                            <td>{{ $round->created_at }}</td>
                                            <td>
                                                <a href="#" class="btn btn-success edit">Edit</a>
                                                <a href="{{ route('rounds.delete', ['id' => $round->id]) }}" class="btn btn-danger">Delete</a>
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
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="Add_Round_Modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel">Head</h4>
                </div>
                <form action="{{ route('rounds.create') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">name</label>
                            <input name="name" type="text" class="form-control" placeholder="Round name" style="background-color:#fff; box-shadow: 3px 3px 10px #ccc;" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="game_id">game_id</label>
                            <select class="form-control" name="game_id" style="background-color:#fff; box-shadow: 3px 3px 10px #ccc;">
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
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="Edit_round_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel">Head Edit</h4>
                </div>
                    <form action="#" method="post">
                        <input type="hidden" id="name_round_id" value="">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="Quize">Pram 1</label>
                                <input name="name_round" type="text" class="form-control" id="name_round" placeholder="Quize name" style="background-color:#fff; box-shadow: 3px 3px 10px #ccc;" autocomplete="off" >
                            </div>
                            <div class="form-group">
                                <label for="Quize">Pram 2</label>
                                <select class="form-control" name="round_game" id="round_game" style="background-color:#fff; box-shadow: 3px 3px 10px #ccc;" id="QuizeNumber">
                                    <option value="">---------- Select A Level ----------</option>
                                    @foreach ($games as $game)
                                        <option value="{{ $game->id }}">{{ $game->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="Seve_Round">Save changes</button>
                    </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!--End Edit Modal-->
@endsection


@section('scripts')
    <script type="text/javascript">
        $('#Add_Round').click(function (event) {
            event.preventDefault();
            $('#Add_Round_Modal').modal();
        });



        $('.edit').click(function (event) {
            event.preventDefault();

            var id   = $(this).parents('.container-row').children('.name').data('id');
            var name = $(this).parents('.container-row').children('.name').text();
            var game = $(this).parents('.container-row').children('.game').data('gameid');

            $('#name_round_id').val(id);
            $('#name_round').val(name);
            $('#round_game').val(game);

            $('#Edit_round_modal').modal(); // open the modal

        });

        $('#Seve_Round').click(function () {
            $.ajax({
                method: 'POST',
                url: "{{ route('rounds.update') }}",
                data: {
                    id: $('#name_round_id').val(),
                    round_name: $('#name_round').val(),
                    round_game: $('#round_game').val(),
                    _token: '{{ csrf_token() }}',
                },
            }).done(function (msg) {
                var row = $('.container-row-' + msg['id']);
                row.find('.name').text(msg['round_name']);
                row.find('.game').text(msg['round_game']);
                row.find('.game').attr("data-gameid", msg['round_game_id']);

                $('#Edit_round_modal').modal('hide');
            });
        });


        $('.close').click(function(event) {
            $(this).parent('.alert').fadeOut('500');
        });
    </script>
@endsection
