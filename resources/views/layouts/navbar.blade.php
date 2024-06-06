<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Travel App</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">

        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.booking.create') }}">Booking</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item dropdown">
                    @guest
                        <a class="nav-link btn-sm btn-primary d-inline-block text-white"
                            href="{{ route('login') }}">Login</a>
                        <a class="nav-link btn-sm btn-secondary d-inline-block text-white"
                            href="{{ route('register') }}">Register</a>
                    @else
                        <a class="nav-link dropdown-toggle nav-link-lg nav-link-user" href="#" id="navbarDropdown"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1"
                                style="width: 30px;">
                            <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <div class="dropdown-divider"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="fas fa-sign-out-alt"></i> {{ __('Log Out') }}
                                </button>
                            </form>
                        </div>
                    @endguest
                </li>
            </ul>
        </div>
    </div>
</nav>
