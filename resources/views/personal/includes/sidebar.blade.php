<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="{{ route('personal.main.index') }}" class="nav-link">
              <i class="fas fa-home"></i>
              <p>
                Головна сторінка
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('personal.liked.index') }}" class="nav-link">
              <i class="far fa-heart"></i>
              <p>
                Цікаві пости
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('personal.comment.index') }}" class="nav-link">
              <i class="far fa-comment"></i>
              <p>
                Коментарі
              </p>
            </a>
          </li>

          
           
          </ul>
    </div>
    <!-- /.sidebar -->
  </aside>