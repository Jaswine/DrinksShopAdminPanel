@extends('main')

@section('title', 'Profile')

@section('content')
<div class="page__profile">
   <h2>{{ auth()->user()->username }}</h2>
   <p>
      {{ auth()->user()->email }} -
      @if(auth()->user()->isAdmin)
         <span>Is an admin</span>
      @else
         <span>Isn't an admin</span>
      @endif
   </p>
</div>
<div class='trash'>
   <div class="admin__right">
      <div class="admin__header">
         <h2>Trash</h2>
      </div>
   </div>
   <div class="admin__left">
      <div class="admin__header">
         <h2>Lowers</h2>
      </div>
   </div>
</div>
@endsection