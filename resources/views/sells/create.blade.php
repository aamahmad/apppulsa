@extends('layouts.app2')

@section('content')


 	<ul class="nav nav-tabs" role="tablist">
    	<li role="presentation" ><a href="{{ route('sells.index') }}">Data Trx Penjualan</a></li>
    	<li role="presentation" class="active"><a href="#">Form Transaksi Penjualan Baru</a></li>
  	</ul>
  	<p>
  	<p>

	{!! Form::open(['route' => 'sells.store', 'class'=>'form-horizontal']) !!}
		@include('sells._form')
	{!! Form::close() !!}


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

        $(document).on('change','.productname',function () {
            var product_id=$(this).val();

            var a=$(this).parent();
            console.log(product_id);
            var op="";
            $.ajax({
                type:'get',
                url:'{!!URL::to('findHarga')!!}',
                data:{'id':product_id},
                dataType:'json',//return data will be json
                success:function(data){
                    console.log("harga_jual");
                    console.log(data.harga_jual);

                    // here price is coloumn name in products table data.coln name

                    a.find('.harga_dasar').val(data.harga_dasar);
                    a.find('.harga_jual').val(data.harga_jual);

                },
                error:function(){

                }
            });
        });



		$(function(){
			window.prettyPrint && prettyPrint();
			$('#dp1').datepicker({
				format: 'yyyy-mm-dd'
			});
		});


        ////
        $(function () {
            $('.harga_jual,.qty').on('change', function () {
                var harga_jual = $(this).hasClass('harga_jual') ? $(this).val() : $(this).siblings('.harga_jual').val();
                var qty = $(this).hasClass('qty') ? $(this).val() : $(this).siblings('.qty').val();
                harga_jual = harga_jual || 0;
                qty = qty || 0;
                var val = harga_jual >= 1 && qty >= 1 ? parseFloat(harga_jual * qty) : 0;
                $(this).siblings('.amount').val(val);
                var total = 0;
                var update = false;
                $('.amount').each(function () {
                    val = parseFloat($(this).val()) | 0;
                    total = val ? (parseFloat(total + val)) : total;
                });
                $('.result').val(total);
            });
        });

        
    });
</script>


@endsection