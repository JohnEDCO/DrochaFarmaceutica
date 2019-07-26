<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Auth::user()->img ? Auth::user()->img :asset('img/avatar5.png') }}" class="img-circle" alt="User Image"/>
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <!--<form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>-->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Menu</li>

            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-home'></i> <span>{{ trans('adminlte_lang::message.home') }} / Inicio</span></a></li>

           <!-- <li><a href="{{ route('user.create') }}"><i class='fa fa-link'></i> 
            <span>Usuarios</span></a></li>-->

            <li class="treeview">
                <a href="#"><i class='fa fa-user'></i> <span>Usuarios</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('user.create')}}">Crear nuevo</a></li>
                    <li><a href="{{ route('user.index')}}">Busqueda usuarios</a></li>
                 
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class='fa fa-book '></i> <span>Sectores</span> <i class="fa fa-angle-left pull-left"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">Financiero</a></li>
                    <li><a href="#">Servicio al cliente</a></li>
                    <li><a href="#">Gestion humana</a></li>
                    <li><a href="#">Innovacion y desarrollo</a></li>
                </ul>
            </li>

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
