


<div class="header clearfix">
  <nav>
  <ul class="nav nav-pills float-right">
    <li class="nav-item">
      <a class="nav-link" href="/">Aktuelle Spielfeldbelegung<span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/spieler">Spieler</a>
    </li>

    @if (Auth::guest())
    <li class="nav-item">
      <a class="nav-link" href="/login">Login</a>
    </li>
    @else
      <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
              Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          </li>
    @endif



  </ul>
</nav>
<h3 class="text-muted">Badminton Planing Tool</h3>
</div>
