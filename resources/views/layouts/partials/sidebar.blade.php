<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('home') }}" aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span class="hide-menu">Dashboard</span></a>
                </li>
                <li class="list-divider"></li>
                {{-- <li class="nav-small-cap"><span class="hide-menu">Applications</span></li> --}}

                @if(Auth::user()->role === 'admin')

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i data-feather="book" class="feather-icon"></i><span class="hide-menu"> Master </span>
                    </a>
                    <ul class="collapse first-level base-level-line" aria-expanded="false">
                        <li class="sidebar-item"><a class="sidebar-link" href="{{ route('book') }}"> Book </a></li>
                    </ul>
                </li>

                @endif

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i data-feather="book" class="feather-icon"></i><span class="hide-menu"> Transactions </span>
                    </a>
                    <ul class="collapse first-level base-level-line" aria-expanded="false">
                        <li class="sidebar-item"><a class="sidebar-link" href="{{ route('catalog') }}"> Katalog </a></li>
                        <li class="sidebar-item"><a class="sidebar-link" href="{{ route('mybook') }}"> MyBook </a></li>
                    </ul>
                </li>

                <li class="sidebar-item d-none">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i data-feather="user" class="feather-icon"></i><span class="hide-menu"> Account </span>
                    </a>
                    <ul class="collapse first-level base-level-line" aria-expanded="false">
                        <li class="sidebar-item"><a class="sidebar-link" href="{{ route('book') }}"> Settings </a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
