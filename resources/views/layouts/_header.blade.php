<header class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="{{route('task_list')}}">Task</a>
        </li>
        <x-permission :value="[102,1021,1022,1023,1024,1025]" or="true">
        <li class="nav-item">
          <a class="nav-link" href="{{route('user_list')}}">User</a>
        </li>
      </x-permission>
      <x-permission :value="[103,1031,1032,1033,1034,1035]" or="true">
        <li class="nav-item">
          <a class="nav-link" href="{{route('desig_list')}}">Designation</a>
        </li>
      </x-permission>
    
      <!-- Profile dropdown on the right -->
      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
               data-bs-toggle="dropdown" aria-expanded="false">
                Profile
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ route('password',[auth()->user()->id]) }}">Change Password</a></li>
                <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
            </ul>
        </li>
    </ul>
      </ul>
    </div>
</header>

