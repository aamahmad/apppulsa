@extends('layouts.app2')

@section('content')

<div class="row">
      <div class="col-md-12">

 	<ul class="nav nav-tabs" role="tablist">
    	<li role="presentation" ><a href="{{ route('stocks.index') }}">Data Stock</a></li>
    	<li role="presentation" class="active"><a href="#">Form Tambah Stock Baru</a></li>
  	</ul>
  	<p></p>

	{!! Form::open(['route' => 'stocks.store', 'method' => 'post', 'class'=>'form-horizontal']) !!}
		@include('stocks._form')
	{!! Form::close() !!}

</div>
</div>

@endsection

@section('script')

<script type="text/javascript">
    $(document).ready(function(){

       	$(document).on('change','.productcategory',function(){
            // console.log("hmm its change");

            var cat_id=$(this).val();
            // console.log(cat_id);
            var div=$(this).parent();

            var op=" ";

            $.ajax({
                type:'get',
                url:'{!!URL::to('findProduct')!!}',
                data:{'id':cat_id},
                success:function(data){
                    //console.log('success');

                    //console.log(data);

                    //console.log(data.length);
                    op+='<option value="0" selected disabled>chose product</option>';
                    for(var i=0;i<data.length;i++){
                    op+='<option value="'+data[i].id+'">'+data[i].name+'</option>';
                   }

                   div.find('.productname').html(" ");
                   div.find('.productname').append(op);
                },
                error:function(){

                }
            });
        });

       	// Tanggal
        $(function(){
			window.prettyPrint && prettyPrint();
			$('#tgl_beli').datepicker({
				format: 'yyyy-mm-dd'
			});
		});

    });
</script>

@endsection