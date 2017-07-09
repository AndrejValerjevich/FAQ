@extends('layouts.app')

@section('content')
    @if (!empty($themes[0]))
    <section class="cd-faq">
        <ul class="cd-faq-categories">
            @foreach ($themes as $theme)
                <li><a href="#{{ $theme->name }}">{{ $theme->name }}</a></li>
            @endforeach
        </ul> <!— cd-faq-categories —>

        <div class="cd-faq-items">
            <a href="{{ route('theme.create') }}"><h3 class="add-theme">Добавить тему</h3></a>
                @foreach ($themes as $theme)
                    @php $all_count = 0; $non_answered_count = 0; @endphp
                    <ul id="{{ $theme->name }}" class="cd-faq-group">
                        <form role="form" method="POST" action="{{ route('theme.destroy', $theme) }}">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <li class="cd-faq-title"><h2>{{ $theme->name }} &nbsp; <input type="submit" value="Удалить тему" class="del-theme"></h2></li>
                        </form>

                        @foreach ($questions as $question)
                            @if ($question->theme_id == $theme->id)
                                @php $all_count++; @endphp
                                @if ($question->status == 0)
                                    @php $non_answered_count++; $status = 'Нет ответа'; @endphp
                                    <li>
                                        <a class="cd-faq-trigger" href="#0"><img src="/diplom/diplom/img/non-aswered.png" width="18" height="18">   {{ $question->text }}</a>
                                        <div class="cd-faq-content">
                                            <p> Автор вопроса: {{$question->asking_user_name}}</p>
                                            <p> Электронный адрес: {{$question->asking_user_email}}</p>
                                            <p> Дата создания: {{$question->date}}</p>
                                            <p> Статус: {{$status}}</p>
                                            <hr/>
                                            <form role="form" method="POST" action="{{ route('question.answer', $question) }}">
                                                {{ method_field('PUT') }}
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label for="answer" class="col-md-4 control-label">Напишите ответ на вопрос:</label>
                                                    <div class="col-md-6">
                                                        <input id="question" type="text" class="form-control" name="answer">
                                                    </div>
                                                </div>
                                                <input type="submit" value="Ответить" class="faq-answer">
                                            </form>
                                            <hr/>
                                            <form class="small-form" role="form" method="GET" action="{{ route('question.show', $question) }}">

                                                <input type="submit" value="Изменить " class="admin-button">
                                            </form>
                                            <form class="small-form" role="form" method="POST" action="{{ route('question.destroy', $question) }}">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <input type="submit" value="Удалить" class="admin-button">
                                            </form>
                                        </div> <!— cd-faq-content —>
                                    </li>
                                @else
                                    @if ($question->status == 1)
                                        @php $status = 'Есть ответ'; $action = 'Скрыть'; $visibility = 'hidden-image'; @endphp
                                    @else
                                        @php $status = 'Скрыт'; $action = 'Показать'; $visibility = 'visible-image'; @endphp
                                    @endif
                                    <li>
                                        <a class="cd-faq-trigger" href="#0"><img src="/diplom/diplom/img/hide.png" width="18" height="18" class="{{$visibility}}"> {{ $question->text }}</a>
                                        <div class="cd-faq-content">
                                            <p> Автор вопроса: {{$question->asking_user_name}}</p>
                                            <p> Электронный адрес: {{$question->asking_user_email}}</p>
                                            <p> Дата создания: {{$question->date}}</p>
                                            <p> Статус: {{$status}}</p>
                                            <form role="form" method="POST" action="{{ route('question.hide', $question) }}">
                                                {{ method_field('PUT') }}
                                                {{ csrf_field() }}
                                                <input type="hidden" name="hidden_status" value="{{$question->status}}">
                                                <input type="submit" value="{{$action}}" class="visibility-answer">
                                            </form>
                                            <hr/>
                                            <p>{{ $question->answer }}</p>
                                            <hr/>
                                            <form class="small-form" role="form" method="GET" action="{{ route('question.show', $question) }}">
                                                <input type="submit" value="Редактировать " class="admin-button">
                                            </form>
                                            <form class="small-form" role="form" method="POST" action="{{ route('question.destroy', $question) }}">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <input type="submit" value="Удалить" class="admin-button">
                                            </form>
                                        </div> <!— cd-faq-content —>
                                    </li>
                                @endif
                            @endif
                        @endforeach
                        <li class="cd-faq-title"><h2>Всего вопросов в теме: @php echo $all_count.', ожидают ответа: '.$non_answered_count; @endphp </h2></li>
                    </ul>
            <hr/>
                @endforeach
            </form>
        </div> <!— cd-faq-items —>
    </section> <!— cd-faq —>
    @else
        <h1 class="main-h1">Пока что нет ни одной темы:(</h1>
        <a href="AddTheme"><h3 class="main-h4">Добавить тему</h3></a>
    @endif
    <script src="/diplom/diplom/public/js/jquery-2.1.1.js"></script>
    <script src="/diplom/diplom/public/js/jquery.mobile.custom.min.js"></script>
    <script src="/diplom/diplom/public/js/main.js"></script> <!— Resource jQuery —>

@endsection