@extends('layouts.app')

@section('content')
    <br/>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Изменить вопрос: {{$question->text}}</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('question.update', $question) }}">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="text" class="col-md-4 control-label">Изменить текст вопроса: </label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="text" value="{{$question->text}}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="category" class="col-md-4 control-label">Изменить категорию: </label>

                                <div class="col-md-6">
                                    <select class="form-control" name="category">
                                        @foreach($themes as $theme)
                                            @if ($question->theme_id == $theme->id)
                                                <option selected>{{ $theme->name }}</option>
                                            @else
                                                <option>{{ $theme->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="answer" class="col-md-4 control-label">Изменить ответ на вопрос: </label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="answer" value="{{$question->answer}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="author" class="col-md-4 control-label">Изменить имя автора: </label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="author" value="{{$question->asking_user_name}}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4 col-md-offset-4">
                                    <button type="submit" class="controller-button">
                                        Сохранить
                                    </button>
                                </div>
                            </div>
                            <a href="{{ route('admin') }}" class="controller-button">Назад</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection