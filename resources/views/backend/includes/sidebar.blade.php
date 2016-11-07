<div class="sidebar" data-background-color="white" data-active-color="danger">

<!--
    Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
    Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
-->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="{{url('/')}}" class="simple-text">
                Bylengual Frontend
            </a>
        </div>

        <ul class="nav">
            <li class="active">
                <a href="{{url('/admin/dashboard')}}">
                    <i class="ti-panel"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a href="{{url('/admin/levels')}}">
                    <i class="ti-hand-point-right"></i>
                    <p>Levels</p>
                </a>
            </li>
            <li>
                <a href="{{url('/admin/quizes')}}">
                    <i class="ti-hand-drag"></i>
                    <p>Quizes</p>
                </a>
            </li>
            <li>
                <a href="{{url('/admin/games')}}">
                    <i class="ti-hand-drag"></i>
                    <p>Games</p>
                </a>
            </li>
            <li>
                <a href="{{url('/admin/quistions')}}">
                    <i class="ti-hand-drag"></i>
                    <p>Quistions Text</p>
                </a>
            </li>
            <li>
                <a href="{{ route('answers.index') }}">
                    <i class="ti-hand-drag"></i>
                    <p>Answers Text</p>
                </a>
            </li>

            <li>
                <a href="{{route('quistions.vioce.index')}}">
                    <i class="ti-hand-drag"></i>
                    <p>Quistions Vioce</p>
                </a>
            </li>
            <li>
                <a href="{{ route('answers.voice.index') }}">
                    <i class="ti-hand-drag"></i>
                    <p>Answers Vioce</p>
                </a>
            </li>

            <li>
                <a href="{{ route('quistions.shape.index') }}">
                    <i class="ti-hand-drag"></i>
                    <p>Quistions Shapes</p>
                </a>
            </li>
            <li>
                <a href="{{ route('answers.shape.index') }}">
                    <i class="ti-hand-drag"></i>
                    <p>Answers Shapes</p>
                </a>
            </li>

            <li>
                <a href="{{ route('quistions.questions-voice.answers-text.index') }}">
                    <i class="ti-hand-drag"></i>
                    <p>Quistions Vioce For Answers Text</p>
                </a>
            </li>

            <li>
                <a href="{{ route('answers.question-vioce.answer-text.index') }}">
                    <i class="ti-hand-drag"></i>
                    <p>Answers text For Questions Vioce</p>
                </a>
            </li>

            <li>
                <a href="{{ route('quistions.questions-text.answers-voice.index') }}">
                    <i class="ti-hand-drag"></i>
                    <p>Questions Text  For Answers  Vioce</p>
                </a>
            </li>

            <li>
                <a href="{{ route('answers.question-text.answer-voice.index') }}">
                    <i class="ti-hand-drag"></i>
                    <p>Answers  Vioce for Questions Text</p>
                </a>
            </li>

            <li>
                <a href="{{ route('quistions.questions-text.answers-shape.index') }}">
                    <i class="ti-hand-drag"></i>
                    <p>Questions Text  For Answers  Shape</p>
                </a>
            </li>

            <li>
                <a href="{{ route('answers.question-text.answer-shape.index') }}">
                    <i class="ti-hand-drag"></i>
                    <p>Answers  Shape For questions-text</p>
                </a>
            </li>

            <li>
                <a href="{{ route('quistions.questions-shape.answers-text.index') }}">
                    <i class="ti-hand-drag"></i>
                    <p>Questions Shape  For Answers  Text</p>
                </a>
            </li>

            <li>
                <a href="{{ route('answers.question-shape.answer-text.index') }}">
                    <i class="ti-hand-drag"></i>
                    <p>Answers Text For questions-shape</p>
                </a>
            </li>


        </ul>
    </div>
</div>
