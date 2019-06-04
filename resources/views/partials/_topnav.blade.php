@if(Auth::check())
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">კონტრაგენტები</a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('clients.create') }}">{{ __('დამატება') }}</a>
            <a class="dropdown-item" href="{{ route('clients.index') }}">{{ __('სია') }}</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">პოზიციები</a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('clients.store') }}">{{ __('დამატება') }}</a>
            <a class="dropdown-item" href="{{ route('clients.store') }}">{{ __('სია') }}</a>
        </div>
    </li>
    @role('Admin')
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">პარამეტრები</a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('operators.index') }}">{{ __('ოპერატორები') }}</a>
            <a class="dropdown-item" href="{{ route('clients.store') }}">{{ __('პოზიციები') }}</a>
            <a class="dropdown-item" href="{{ route('clients.store') }}">{{ __('ქალაქები') }}</a>
        </div>
    </li>
    @endrole
@endif