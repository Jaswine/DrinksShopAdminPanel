@extends('main')

@section('title', 'Auth page')

@section('content')
<div class='page'>
<h2>Shop The Latest</h2>
<div class="page__blocks">
   <div>Filters</div>
   @if(count($products) != 0)
   @else
   <p>Products Not Found</p>
   @endif
</div>
</div>
@endsection