@extends('layouts.app')

@section('content')
    <br/>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Новый вопрос</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="home/AddQuestion">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Ваше имя</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" required autofocus>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Электронный адрес</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Выберите категорию</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="category">
                                        @foreach($themes as $theme)
                                            <option>{{ $theme->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-md-4 control-label">Ваш вопрос</label>

                                <div class="col-md-6">
                                    <input id="question" type="text" class="form-control" name="question" required>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-4 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Задать вопрос
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection