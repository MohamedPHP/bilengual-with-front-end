@extends('backend.layouts.backend-master')


@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Quizes Table</h4><hr>
                            <p class="category"><a href="#" id="Add_Quize">Add New Quize</a></p>
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
                                	<th>Quize Level</th>
                                	<th>Actions</th>
                                </thead>
                                <tbody>
                                    @foreach ($quizes as $quize)
                                        <tr data-quizeid="{{ $quize->id }}">
                                            <td>{{ $quize->id }}</td>
                                            <td class="quizename" id="name">{{ $quize->name }}</td>
                                            <td class="quizenumber" id="quize_level">{{ $quize->level->number }}</td>
                                            <td>
                                                <a href="" class="btn btn-success Edit_Quize">Edit</a>
                                                <a href="{{ route('quizes.delete', ['id' => $quize->id]) }}" class="btn btn-danger">Delete</a>
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
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="Add_Quize_Modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel">Add New Quize</h4>
                </div>
                <form action="{{ route('quizes.create') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="Quize">Quize Content</label>
                            <input name="name" type="text" class="form-control" id="Quize" placeholder="Quize name" style="background-color:#fff; box-shadow: 3px 3px 10px #ccc;" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="Quize">Quize Level</label>
                            <select class="form-control" name="quize_level" style="background-color:#fff; box-shadow: 3px 3px 10px #ccc;">
                                <option value="">---------- Select A Level ----------</option>
                                @foreach ($levels as $level)
                                    <option value="{{ $level->id }}">{{ $level->name }} {{ $level->number }}</option>
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
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="Edit_Quize_Modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel">Edit Quize</h4>
                </div>
                    <form action="#" method="post">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="Quize">Quize Content</label>
                                <input name="name" type="text" class="form-control" id="QuizeName" placeholder="Quize name" style="background-color:#fff; box-shadow: 3px 3px 10px #ccc;" autocomplete="off" >
                            </div>
                            <div class="form-group">
                                <label for="Quize">Quize Level</label>
                                <select class="form-control" name="quize_level" style="background-color:#fff; box-shadow: 3px 3px 10px #ccc;" id="QuizeNumber">
                                    <option value="">---------- Select A Level ----------</option>
                                    @foreach ($levels as $level)
                                        <option value="{{ $level->id }}">{{ $level->name }} {{ $level->number }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="Edit_Save">Save changes</button>
                    </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!--End Edit Modal-->




@endsection

@section('scripts')
    <script type="text/javascript">
        $('#Add_Quize').click(function (event) {
            event.preventDefault();
            $('#Add_Quize_Modal').modal();
        });
        /*=================== Edit ===================*/

        // Set Empty Vars To get The Data Element
        var quizeId = 0;
        var quizeNameElement  = null;
        var quizeLevelElement = null;
        $('.Edit_Quize').click(function (event) {
            event.preventDefault();
            // Select The Data Containers Starts From the Edit Link That Shows the Edit Modal
            quizeNameElement  = event.target.parentNode.parentNode.childNodes[3];
            quizeLevelElement = event.target.parentNode.parentNode.childNodes[5];


            var name = quizeNameElement.textContent.trim();
            var levelnumber = quizeLevelElement.textContent.trim();
            quizeId = event.target.parentNode.parentNode.dataset['quizeid'];


            // Put The Data In The Edit field
            $('#QuizeName').val(name);
            $('#QuizeNumber').val(levelnumber);


            // To See The Modal
            $('#Edit_Quize_Modal').modal();
        });


        // Start The Ajax Request
        var token = '{{ Session::token()  }}';
        var url = '{{ route('quizes.update') }}';
        $('#Edit_Save').click(function(event) {
            $.ajax({
                method: 'POST',
                url: url,
                data: {
                    Name : $('#QuizeName').val(),
                    LevelNumber : $('#QuizeNumber').val(),
                    quizeId : quizeId,
                    _token : token
                },
            }).done(function (msg) {
                $(quizeNameElement).text(msg['name']);
                $(quizeLevelElement).text(msg['quize_level']);
                $('#Edit_Quize_Modal').modal('hide');
            });
        });


        /*=================== Edit ===================*/
        $('.close').click(function(event) {
            $(this).parent('.alert').fadeOut('500');
        });
    </script>
@endsection
