    <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark p-0">
        <div class="container bg-dark">
            <!-- スマホ表示トグル -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav4" aria-controls="navbarNav4" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div id="Right-navbar" class="ml-auto">
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav">
                    <!-- ログインしていなかったらログイン画面へのリンクを表示 -->
                    @guest
                        <li><a class="nav-link" href="{{ route('login') }}">{{ __('messages.Login') }}</a></li>
                    <!-- ログインしていたらユーザー名とログアウトボタン表示 -->
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        
                        <div class="dropdown-menu rightnav" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item rightnav" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('messages.Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>    
                    </li>
                    @endguest
                </ul>
            </div>
            <!-- スマホ以外 -->
            <div class="collapse navbar-collapse" id="navbarNav4">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('top') }}">トップページ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('post') }}">投稿一覧</a>
                    </li>
                    @auth<!-- ログイン中の表示 -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('mypage') }}">マイページ</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="/register">会員登録</a>
                    </li>
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">お問い合せ</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>