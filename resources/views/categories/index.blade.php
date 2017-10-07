@extends('layouts.app2')

@section('content')


  <div class="row">
    <div class="col-md-12">
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#">Kategori</a></li>
      </ul>
    </div>
  </div>

  <p></p>
  
  <div class="row">
    <div class="col-md-6  ">
    <div class="form-group">
      <a href="{{ route('categories.create') }}">
          <button type="button" class="btn btn-warning btn-sm">
          <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span> Kategori Baru
          </button>
      </a>
    </div>
    
    @foreach($categories as $category)
      <div class="form-group">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Kategori Produk : <b>{{ $category->name }}</b></h3>
          </div>
        <div class="list-group">
          <table class="table table-bordered">
              <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama Sub Kategori</th>
                    <th></th>
                  </tr>
              </thead>
              <?php $i = 1; ?>
              @foreach(App\Category::where('induk_id',$category->id)->get() as $subcategory)
              @if ($i > 1) @endif
                <tr>
                  <td>{{ $i }}</td>
                  <td>{{ $subcategory->name }}</td>
                  <td>
                  {!! Form::model($subcategory, ['route' => ['categories.destroy', $subcategory], 'method' => 'delete', 'class' => 'form-inline js-confirm', 'data-confirm'=> 'Yakin mau di hapus ..!!'] ) !!}
                    <a href="{{ route('categories.edit', $subcategory->id)}}"><button type="button" class="btn btn-xs btn-link">Edit</button></a> &nbsp;| &nbsp;
                      {!! Form::submit('delete', ['class'=>'btn btn-xs btn-danger js-submit-confirm']) !!}
                  {!! Form::close()!!}
                  </td>
                </tr>
                <?php $i++; ?>
                @endforeach
              <tbody>

              </tbody>
          </table>
        </div>
        </div>
      </div>
    @endforeach
    </div>

  </div>

@endsection