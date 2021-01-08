<nav class="navbar navbar-expand-md sticky-top navbar-dark bg-dark">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav4" aria-controls="navbarNav4" aria-expanded="false" aria-label="Toggle navigation">
                       <span class="navbar-toggler-icon"></span>
                    </button>
                       
                 <div class="collapse navbar-collapse">
                      <ul class="navbar-nav">
                         <li class="nav-item">
                             <a class="nav-link" href="{{ route('top') }}">HOME</a>
                         </li>
                         <li class="nav-item">
                           <a class="nav-link" href="{{ route('post') }}">投稿一覧</a>
                         </li>
                         <li class="nav-item">
                            <a class="nav-link" href="{{ route('mypage') }}">マイページ</a>
                         </li>
                         <li class="nav-item">
                            <a class="nav-link" href="/register">会員登録</a>
                         </li>
                         <li class="nav-item">
                            <a class="nav-link" href="{{ route('form') }}">お問合せ</a>
                         </li>
                      </ul>
                 </div>
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                        <!-- ログインしていなかったらログイン画面へのリンクを表示 -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('messages.Login') }}</a></li>
                        <!-- ログインしていたらユーザー名とログアウトボタン表示 -->
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
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
                </div>
            </nav>