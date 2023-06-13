@extends('main')

@section('title', 'Auth page')

@section('content')
<div class='page'>
<div class="page__blocks">
   @if(count($products) != 0)
      @foreach($products as $product)
         <div class="product">
            <img src="/uploads/{{ $product->image }}" alt="{{ $product->title }}">
            <div class="product__footer">
               <h3>{{ $product->title }}</h3>
               <span>{{ $product->price }}$</span>
            </div>
            <div class="product__footer">
               <button class="add">Add To Trash</button>
               <button>
                  <span class="material-symbols-outlined">
                     favorite
                  </span>
               </button>
            </div>
         </div>
      @endforeach
   @else
   <p>Products Not Found</p>
   @endif
</div>
</div>
@endsection