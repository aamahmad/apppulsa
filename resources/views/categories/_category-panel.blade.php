@foreach(App\Category::get()->where('induk_id',$category->id) as $subcategory)
<div class="col-md-3">
	<p>   
    <div class="panel panel-primary">
        <div class="panel-heading">
        	<h3 class="panel-title">{{ $subcategory->name }}</h3>
       	</div>
   		<div class="list-group">
      
      @if( $category->id == 1 )  
        
          <a href="#" class="list-group-item">Sisa saldo : 
          <span class="badge">
            Rp {{ number_format(App\Deposit::get()->where('category_id', $subcategory->id)->sum('jumlah') - App\Category::find($subcategory->id)->sells->sum('harga_awal')         
            ) }} 
          </span></a>
      @else
        @foreach(App\Product::get()->where('category_id',$subcategory->id) as $productlist)
          <a href="#" class="list-group-item">{{ $productlist->name }} 
          <span class="badge">
          {{ $stocks->where('product_id',$productlist->id)->sum('jumlah') - $sells->where('product_id',$productlist->id)->sum('qty')
          }} stok
          </span></a>
        @endforeach
      @endif

   		
  		</div>
    </div>

</div>
@endforeach