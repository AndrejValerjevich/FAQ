@extends('layouts.app')

@section('content')

    <section class="cd-faq">
        <ul class="cd-faq-categories">
            @foreach ($themes as $theme)
                <li><a href="#{{ $theme->name }}">{{ $theme->name }}</a></li>
            @endforeach
        </ul> <!— cd-faq-categories —>

        <a href="register"><h3 class="add-button__new">Новая тема</h3></a>

        <div class="cd-faq-items">
            <form role="form" method="POST" action="admin/Answer">
                {{ csrf_field() }}
                @foreach ($themes as $theme)
                    @php $all_count = 0; $non_answered_count = 0; @endphp
                    <ul id="{{ $theme->name }}" class="cd-faq-group">
                        <li class="cd-faq-title"><h2>{{ $theme->name }} </h2></li>
                        @foreach ($questions as $question)
                            @if ($question->theme_id == $theme->id)
                                @php $all_count++; @endphp
                                @if ($question->status == 0)
                                    @php $non_answered_count++; @endphp
                                    <li>
                                        <a class="cd-faq-trigger" href="#0"><img src="/diplom/diplom/img/non-aswered.png" width="18" height="18">   {{ $question->text }}</a>
                                        <div class="cd-faq-content">
                                            <p>Дата создания: {{$question->date}}</p>
                                            <p>Статус: {{$question->status}}</p>
                                            <hr/>
                                            <div class="form-group">
                                                <label for="answer" class="col-md-4 control-label">Напишите ответ на вопрос:</label>
                                                <div class="col-md-6">
                                                    <input id="question" type="text" class="form-control" name="answer">
                                                </div>
                                            </div>
                                            <input type="hidden" name="hidden_id" value="{{$question->id}}">
                                            <input type="submit" value="Ответить" class="faq-answer">
                                        </div> <!— cd-faq-content —>
                                    </li>
                                @else
                                    <li>
                                        <a class="cd-faq-trigger" href="#0">{{ $question->text }}</a>
                                        <div class="cd-faq-content">
                                            <p>Дата создания: {{$question->date}}</p>
                                            <p>Статус: {{$question->status}}</p>
                                            <hr/>
                                            <p>{{ $question->answer }}</p>
                                        </div> <!— cd-faq-content —>
                                    </li>
                                @endif
                            @endif
                        @endforeach
                        <li class="cd-faq-title"><h2>Всего вопросов в теме: @php echo $all_count.', ожидают ответа: '.$non_answered_count; @endphp </h2></li>
                    </ul>
                @endforeach
            </form>

        </div> <!— cd-faq-items —>

        <a href="#0" class="cd-close-panel">Close</a>
    </section> <!— cd-faq —>
    <script src="/diplom/diplom/public/js/jquery-2.1.1.js"></script>
    <script src="/diplom/diplom/public/js/jquery.mobile.custom.min.js"></script>
    <script src="/diplom/diplom/public/js/main.js"></script> <!— Resource jQuery —>

@endsection