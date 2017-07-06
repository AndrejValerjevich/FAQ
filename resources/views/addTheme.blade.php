@extends('layouts.app')

@section('content')
    <br/>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Добавить новую тему</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="AddTheme">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="theme_name" class="col-md-4 control-label">Введите название темы:</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="theme_name" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Добавить тему
                                    </button>
                                </div>
                            </div>
                            <a href="admin" class="btn btn-primary">Назад</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection