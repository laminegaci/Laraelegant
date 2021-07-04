<div class="right-sidebare is-closed">
    <div class="card profile">
        <img src="{{ asset('storage/'.Auth::user()->avatar) }}" class="img-circle" width="150" />
    </div>

    <div class="card">
        {{ Auth::user()->name  }}
    </div>
    <div class="card">
        {{ Auth::user()->email  }}
    </div>
    <div class="card">
        @foreach (Auth::user()->roles as $role)
            {{ $role->name }}
        @endforeach
    </div>
    <div class="card">
        <p>Left-Sidebar Color</p>
        <div class="chage-sidebar-color">
            <div class="color 1" style="background-color:red"></div>
            <div class="color 2" style="background-color:green"></div>
            <div class="color 3" style="background-color:orange"></div>
        </div>
    </div>
    <!-- End right-Sidebar scroll-->
</div>
<button class="sidebar-toggle">
    <i class="fa fa-plus icon"></i>
</button>

<script>
            $('document').ready(function() {
                alert('ok');
            })
        </script>