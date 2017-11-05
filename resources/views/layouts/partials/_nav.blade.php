<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
  		<a class="navbar-brand" href="{{ route('home') }}">{{ env('APP_NAME') }}</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item {{ set_active_route('home') }}">
					<a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item {{ set_active_route('posts.index') }}">
                    <a class="nav-link" href="{{ route('posts.index') }}">News</a>
                </li>
				<li class="nav-item {{ set_active_route('about') }}">
					<a class="nav-link" href="{{ route('about') }}">About</a>
				</li>
				<li class="nav-item {{ set_active_route('contact.create') }}">
					<a class="nav-link" href="{{ route('contact.create') }}">Contact</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Planet
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="https://laravel.com">Laravel.com</a>
						<a class="dropdown-item" href="https://laravel.io">Laravel.io</a>
						<a class="dropdown-item" href="https://laracast.com">Laracasts</a>
						<a class="dropdown-item" href="https://larajobs.com">Larajob</a>
						<a class="dropdown-item" href="https://laravel-news.com">Laravel News</a>
						<a class="dropdown-item" href="https://larachat.com">Larachat</a>
					</div>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
			    <li class="nav-item">
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </li>
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                    <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>

                        </div>
                    </li>
                @endguest
            </ul>
        </div>
	</div>
</nav>