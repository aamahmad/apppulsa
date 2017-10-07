@extends('layouts.app')

@section('content')

<div class="container">
<span>Product Category: </span>
    <select style="width: 200px" class="productcategory" id="prod_cat_id">

        <option value="0" disabled="true" selected="true">-Select-</option>
        @foreach($prod as $cat)
            <option value="{{$cat->id}}">{{$cat->name}}</option>
        @endforeach

    </select>

    <span>Product Name: </span>
    <select style="width: 200px" class="productname">

        <option value="0" disabled="true" selected="true">Product Name</option>
    </select>

    <span>Product Price: </span>
    <input type="text" class="harga_dasar">
    <input type="text" class="harga_jual">
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
                url:'{!!URL::to('findProductName')!!}',
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
                url:'{!!URL::to('findPrice')!!}',
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

    });
</script>


@endsection