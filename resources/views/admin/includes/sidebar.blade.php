<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="{{ route('admin.main.index') }}" class="nav-link">
              <i class="fas fa-home"></i>
              <p>
                Головна сторінка
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.user.index') }}" class="nav-link">
              <i class="fa-solid fa-users"></i>
              <p>
                Користувачі
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.post.index') }}" class="nav-link">
              <i class="fa-regular fa-clipboard"></i>
              <p>
                Пости
              </p>
            </a>
          </li>
            
            <li class="nav-item">
              <a href="{{ route('admin.category.index') }}" class="nav-link">
                <i class="fa-solid fa-layer-group"></i>
                <p>
                  Категориії
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('admin.tag.index') }}" class="nav-link">
                <i class="fa-solid fa-tags"></i>
                <p>
                  Тегі
                </p>
              </a>
            </li>
           
          </ul>
    </div>
    <!-- /.sidebar -->
  </aside>