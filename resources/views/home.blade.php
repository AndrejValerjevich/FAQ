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
                @foreach ($themes as $theme)
                    <ul id="{{ $theme->name }}" class="cd-faq-group">
                        <li class="cd-faq-title"><h2>{{ $theme->name }}</h2></li>
                        @foreach ($questions as $question)
                            @if ($question->theme_id == $theme->id && $question->status == 1)
                                <li>
                                    <a class="cd-faq-trigger" href="#0">{{ $question->text }}</a>
                                    <div class="cd-faq-content">
                                        <hr/>
                                        <p>{{ $question->answer }}</p>
                                    </div> <!— cd-faq-content —>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                @endforeach
            </div> <!— cd-faq-items —>
        </section> <!— cd-faq —>
    @else
        <h1 class="main-h1">Задать вопрос пока невозможно!</h1>
        <a href="{{ route('login') }}"><h4 class="main-h4">Войдите в кабинет администратора</h4></a>
    @endif
@endsection