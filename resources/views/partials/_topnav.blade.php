@if(Auth::check())
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">კონტრაგენტები</a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('clients.store') }}">{{ __('დამატება') }}</a>
            <a class="dropdown-item" href="{{ route('clients.store') }}">{{ __('სია') }}</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">პოზიციები</a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('clients.store') }}">{{ __('დამატება') }}</a>
            <a class="dropdown-item" href="{{ route('clients.store') }}">{{ __('სია') }}</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">ოპერატორები</a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('clients.store') }}">{{ __('დამატება') }}</a>
            <a class="dropdown-item" href="{{ route('clients.store') }}">{{ __('სია') }}</a>
        </div>
    </li>
@endif