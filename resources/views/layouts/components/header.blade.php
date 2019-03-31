<nav class="navbar navbar-expand-md navbar-light navbar-laravel bg-success">
    <div class="container">
        @auth <!-- Condition to show only members logged -->
            <a class="navbar-brand icon-home text-white" href="{{ url('/home') }}">
                <i class="fas fa-home"></i>
            </a>
            <button class="navbar-toggler border border-white text-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <ul class="navbar-nav">
                        <li><a class="nav-link text-white" href="#">{{ __('Profile') }}</a></li>
                        <li><a class="nav-link text-white" href="#">{{ __('Challenges') }}</a></li>
                        <li><a class="nav-link text-white" href="#">{{ __('Ranking') }}</a></li>
                        <li><a class="nav-link text-white" href="#">{{ __('Contribute') }}</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbardrop" data-toggle="dropdown">{{ __('Admin') }}</a>
                            <div class="dropdown-menu bg-success border border-white">
                                <a class="dropdown-item text-dark font-weight-bold" href="{{ action('Admin\DashboardController@index') }}">{{ __('Dashboard') }}</a>
                                <a class="dropdown-item text-dark font-weight-bold" href="{{ action('Admin\QuestionController@index') }}">Questions</a>
                                <a class="dropdown-item text-dark font-weight-bold" href="#">{{ __('Challenges') }}</a>
                                <a class="dropdown-item text-dark font-weight-bold" href="#">{{ __('History') }}</a>
                                <a class="dropdown-item text-dark font-weight-bold" href="#">{{ __('Feedback') }}</a>
                            </div>
                        </li>
                    </ul>
                </ul>
        @endauth
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav">
                <!-- Authentication Links -->
                @guest <!-- Condition for to login members and register member -->
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @else <!-- Condition to view logout button just for members -->
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right bg-success border border-white" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-dark font-weight-bold" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
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