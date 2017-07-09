@extends('layouts.app')

@section('content')
    <section class="cd-faq">
        <a href="{{ route('register') }}"><h3 class="add-button__new">Новый администратор</h3></a>
            <div class="cd-faq-items">
                @foreach ($users as $user)
                    <ul class="cd-faq-group">
                        <li class="cd-faq-title"><h2>{{ $user->name }}</h2></li>
                        <li>
                            <a class="cd-faq-trigger" href="#0">{{ $user->name }}</a>
                            <div class="cd-faq-content">
                                <p>{{ $user->email }}</p>
                                <hr/>
                                <form class="small-form" role="form" method="POST" action="{{ route('password.reset') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="hidden_id" value="{{$user->id}}">
                                    <input type="hidden" name="email" value="{{$user->email}}">
                                    <input type="submit" value="Изменить пароль" class="admin-button">
                                </form>
                                <form class="small-form" role="form" method="POST" action="{{ route('user.destroy') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="hidden_id" value="{{$user->id}}">
                                    <input type="submit" value="Удалить" class="admin-button">
                                </form>
                            </div> <!— cd-faq-content —>
                        </li>
                    </ul>
                @endforeach
            </div> <!— cd-faq-items —>

    </section> <!— cd-faq —>
    <script src="/diplom/diplom/public/js/jquery-2.1.1.js"></script>
    <script src="/diplom/diplom/public/js/jquery.mobile.custom.min.js"></script>
    <script src="/diplom/diplom/public/js/main.js"></script> <!— Resource jQuery —>
@endsection