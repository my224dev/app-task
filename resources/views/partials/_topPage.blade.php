@if (Route::has('login'))
<div class="top-right links">
    @auth
    <div class="dropdown">
        <a class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
          <strong>{{ ucfirst(Auth::user()->name)}}</strong>
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <li><a class="dropdown-item" href="/logout">отключение</a></li>
        </ul>
      </div>
    @else
        <a href="{{ route('login') }}">логин</a>

        @if (Route::has('register'))
            <a href="{{ route('register') }}">регистр</a>
        @endif
    @endauth
</div>
@endif