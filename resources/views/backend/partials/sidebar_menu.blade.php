<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{asset('adminlte/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{auth()->user()->name}}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            {{-- dashboard --}}
            <li class="nav-item">
                <a href="{{ route("backIndex") }}" class="nav-link active">
                    <i class="nav-icon fas fa-fw fa-tachometer-alt">
                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            {{-- users management --}}
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa-fw fas fa-users"></i>
                    <p>
                        {{ trans('dao_custom.userManagement.title') }}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fa-fw fas fa-unlock-alt nav-icon"></i>
                            <p>{{ trans('dao_custom.permission.title') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('roles.index')}}" class="nav-link">
                            <i class="fa-fw fas fa-briefcase nav-icon"></i>
                            <p>{{ trans('dao_custom.role.title') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('users.index')}}" class="nav-link">
                            <i class="fa-fw fas fa-user nav-icon"></i>
                            <p>{{ trans('dao_custom.user.title') }}</p>
                        </a>
                    </li>
                </ul>
            </li>
            {{-- formations management --}}
            <li class=" nav-item has-treeview">
                <a class="nav-link" href="#"><i class="nav-icon fas fa-graduation-cap"></i>{{__('formations')}}<i class="right fas fa-angle-left"></i></a>
                <ul class="nav nav-treeview">
                    @hasanyrole('admin|manager')

                    <li >
                        <a href="{{route('formations.index')}}" class="nav-link"><i class="nav-icon fas fa-graduation-cap "></i>{{__('formation')}} </a>
                    </li>
                    <li>
                        <a href="{{route('categories.index')}}" class="nav-link"><i class="nav-icon fas fa-list"></i>{{__('category')}} </a>
                    </li>
                    @endhasanyrole

                </ul>
            </li>
            {{--event --}}
            <li class=" nav-item">
                <a class="nav-link" href="{{route('events.index')}}">
                    <i class="nav-icon fas fa-calendar-alt"></i>
                    {{__('events')}}</a>
            </li>
            {{--language --}}
            <li class="nav-item">
                <a href="{{route('languages')}}" class="nav-link">
                    <i class="nav-icon fa fa-language"></i>{{__('language_trans')}}</a>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>