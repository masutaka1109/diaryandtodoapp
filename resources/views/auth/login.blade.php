<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Diary</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/welcome.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    </head>

    <body>
        @if(Auth::check())
            <?php return redirect('calendar'); ?>
        @else
            <div class="login-zone">
                <div class="login-form">
                    <div class="login-form-content">
                        {!! Form::open(['route' => 'login.post']) !!}
                            <div class="title">
                                <h3>ログイン</h3>
                            </div>
                            <div class="form-group">
                                {!! Form::label('email','メールアドレス',['class' => 'text-secondary']) !!}
                                {!! Form::email('email',old('email'),['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('password','パスワード',['class' => 'text-secondary']) !!}
                                {!! Form::password('password',['class' => 'form-control']) !!}
                            </div>
                            {!! Form::submit('ログイン',['class' => 'btn btn-secondary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
                {{-- ユーザ登録ページへのリンク --}}
                <div class="signup">
                    {!! link_to_route('signup.get','新規登録',[],['class' => 'signup-url']) !!}
                </div>
            </div>
        @endif
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>
</html>