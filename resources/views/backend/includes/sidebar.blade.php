<div class="sidebar" style="background: #F17153 !important; background: -webkit-linear-gradient(#3CF6F1, #13B2BD) !important; background: -o-linear-gradient(#3CF6F1, #13B2BD) !important; background: -moz-linear-gradient(#3CF6F1, #13B2BD) !important; background: linear-gradient(#09a4af, #3CF6F1) !important;">
    <nav class="sidebar-nav">
        <ul class="nav">
            @if ($logged_in_user->isAdmin())
                <li class="nav-title">
                    System
                </li>
                <li class="nav-item">
                    <a class="nav-link {{
                        active_class(Route::is('admin/auth/user*'))
                        }}" href="{{ route('admin.auth.user.index') }}">
                        <i class="nav-icon far fa-user" style="color:white"></i>
                        User Management

                        @if ($pending_approval > 0)
                            <span class="badge badge-danger">{{ $pending_approval }}</span>
                        @endif
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{
                        active_class(Route::is('admin/auth/guest*'))
                        }}" href="{{ route('admin.auth.user.guest') }}">
                        <i class="nav-icon fas fa-list" style="color:white"></i>
                        Guest Management

                        @if ($pending_approval > 0)
                            <span class="badge badge-danger">{{ $pending_approval }}</span>
                        @endif
                    </a>
                </li>
            @endif


        </ul>
    </nav>

    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div><!--sidebar-->
