<!-- Navigation Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">B N S P</a>
            <a class="navbar-brand hidden" href="{{ url('/') }}"><img src="{{ asset('public/img/bnsp2.jpg') }}" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <h3 class="menu-title">Menu</h3>
                <li>
                    <a href="{{ url('/admin') }}" > <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>
                <li>
                    <a href="{{ url('/admin/kategori') }}"> <i class="menu-icon fa fa-bars"></i>Kategori </a>
                </li>
                <li>
                    <a href="{{ url('/admin/tugas') }}"> <i class="menu-icon fa fa-file"></i>Tugas </a>
                </li>
                
            </ul>
        </div>
    </nav>
</aside>