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
        <div class="login-zone">
            <div class="login-form">
                <div class="login-form-content">
                    {!! Form::open(['route' => 'signup.post']) !!}
                        <div class="title">
                            <h3>新規登録</h3>
                        </div>
                        <div class="form-group">
                            {!! Form::label('name','ユーザー名',['class' => 'text-secondary']) !!}
                            {!! Form::text('name',old('name'),['class' => 'form-control']) !!}
                        </div>
                        
                        <div class="form-group">
                            {!! Form::label('email','メールアドレス',['class' => 'text-secondary']) !!}
                            {!! Form::email('email',old('email'),['class' => 'form-control']) !!}
                        </div>
                        
                        <div class="form-group">
                            {!! Form::label('password','パスワード',['class' => 'text-secondary']) !!}
                            {!! Form::password('password',['class' => 'form-control']) !!}
                        </div>
                        
                        <div class="form-group">
                            {!! Form::label('password_confirmation','パスワード再確認',['class' => 'text-secondary']) !!}
                            {!! Form::password('password_confirmation',['class' => 'form-control']) !!}
                        </div>
                        
                        {!! Form::submit('新規登録',['class' => 'btn btn-secondary']) !!}
                    {!! Form::close() !!}
                    @include('commons.error_messages')
                </div>
            </div>
            {{-- ユーザ登録ページへのリンク --}}
            <div class="signup">
                {!! link_to_route('login','ログイン',[],['class' => 'signup-url']) !!}
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>
</html>