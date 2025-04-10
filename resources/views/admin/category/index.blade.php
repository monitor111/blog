@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Категории</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Головна</a></li>
            <li class="breadcrumb-item active">Категорії</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-12 col-md-3 mb-3">
          <a href="{{ route('admin.category.create') }}" class="btn btn-block btn-primary">Додати нову категорію</a>
        </div>
      </div>
      <div class="row">  
        <div class="col-12">         
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Назва</th>
                    <th colspan="3" class="text-center">Дії</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($categories as $category)
                  <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->title}}</td>
                    <td class="text-center"><a href="{{ route('admin.category.show', $category->id) }}">
                      <i class="fa-regular fa-eye"></i></a></td>
                    <td class="text-center"><a href="{{ route('admin.category.edit', $category->id) }}" class="text-success">
                      <i class="fa-solid fa-pen"></i></a></td>
                    <td class="text-center">
                      <form action="{{ route('admin.category.delete', $category->id); }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="border-0 bg-transparent">
                          <i class="fa-solid fa-trash-can text-danger" role="button"></i>
                        </button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
      <!-- /.row -->
      
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection