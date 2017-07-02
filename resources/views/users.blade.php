@extends('layouts.app')

@section('content')
    <section class="cd-faq">

        <div class="cd-faq-items">
            @foreach ($users as $user)
                <ul class="cd-faq-group">
                    <li class="cd-faq-title"><h2>{{ $user->name }}</h2></li>
                            <li>
                                <a class="cd-faq-trigger" href="#0">{{ $user->name }}</a>
                                <div class="cd-faq-content">
                                    <p>{{ $user->email }}</p>
                                </div> <!— cd-faq-content —>
                            </li>
                </ul>
            @endforeach
        </div> <!— cd-faq-items —>

        <a href="#0" class="cd-close-panel">Close</a>
    </section> <!— cd-faq —>
    <script src="/diplom/diplom/public/js/jquery-2.1.1.js"></script>
    <script src="/diplom/diplom/public/js/jquery.mobile.custom.min.js"></script>
    <script src="/diplom/diplom/public/js/main.js"></script> <!— Resource jQuery —>
@endsection