<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>gulp 4.0 builder</title>
    <meta content="" name="author">
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <link rel="icon" href="{{asset('/img/favicon.ico')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('/css/foundation.css')}}">
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <script src="{{asset('/js/foundation.js')}}" defer></script>
    <script src="{{asset('/js/bundle.js')}}" defer></script>
    <!--[if lt IE 9]>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script><![endif]-->
</head>
<body>
<!--[if lt IE 7]>
<p class="browsehappy">Вы используете <strong>устаревший</strong> браузер. Пожалуйста <a href="http://browsehappy.com/">обновите
    его</a></p>
<![endif]-->
<div class="wrapper">
    <div class="header">
        <div class="container">
            <div class="logo"><img src="{{asset('/img/logo.png')}}" title="logo" class="logo__img"></div>
            <div id="sidebar" class="sidebar">
                <div id="sidebar__title" class="sidebar__title">Посмотреть всех</div>
                <div id="menu-btn" class="sidebar__btn">
                    <div class="sidebar__btn-bar"></div>
                </div>
            </div>
        </div>
    </div>
    <div id="sidebarInner" class="sidebar__inner addblock">
        <div class="addblock__top">
            <div class="addblock__title">Понравились</div>
            <ul class="addblock__list">
                @foreach ($liked as $like)
                    <li class="addblock__item">
                        <div class="addblock__img-wrapper"><img src="{{$like['photo']}}" class="addblock__img"></div>
                        <a class="remove" href="{{route('person.destroy',$like['person_id'])}}"></a>
                        <div class="addblock__user">{{$like['name'].' '.$like['surname']}}</div>
                    </li>
                @endforeach
            </ul>
            {{ $liked->links() }}
            <div class="line"></div>
        </div>
        <div class="addblock__down">
            <div class="addblock__title">Не понравились</div>
            <ul class="addblock__list">
                @foreach ($unliked as $unlike)
                    <li class="addblock__item">
                        <div class="addblock__img-wrapper"><img src="{{$unlike['photo']}}" class="addblock__img"></div>
                        <a class="remove" href="{{route('person.destroy',$unlike['person_id'])}}"></a>
                        <div class="addblock__user">{{$unlike['name'].' '.$unlike['surname']}}</div>
                    </li>
                @endforeach
            </ul>
            {{ $unliked->links() }}
        </div>
    </div>

    <div class="main">
        {{--{{dd($person)}}--}}
        <div class="main-foto">
            <div class="main-foto__inner">
                <div class="main-foto__wrapper"><img src="{{$person['photo_400_orig']}}" alt="" class="main-foto__img">
                </div>
                <div class="main-foto__name">{{$person['first_name'].' '.$person['last_name']}}</div>
                @if(isset($person['university_name']))
                    <div class="main-foto__uni">{{$person['university_name']}}</div>
                @endif
            </div>
            <div class="main-foto__buttons">
                <a href="{{route('like',$person['id'])}}"
                   class="btn btn_true">Нравится</a>
                <a href="{{route('unlike',$person['id'])}}"
                   class="btn btn_false">Не
                    нравится</a></div>
        </div>
    </div>
</div>
<div class="footer">
    <div class="container">
        <div class="footer__text">2016 | Создано командой профессионалов на курсе “Комплексное обучение разработке на
            PHP” от Loftschool
        </div>
    </div>
</div>
</body>
</html>