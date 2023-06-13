@extends('main')

@section('title', 'Admin page')

@section('content')
<div class='admin'>
<div class="admin__right">
   <div class="admin__header">
      <h2>Products</h2>
      <a href=""  class="link">
         <span class="material-symbols-outlined">
            add_circle
            </span>
      </a>
   </div>
</div>
<div class="admin__left">
   <div class="admin__header">
      <h2>Categories</h2>
   </div>

   <form class="admin__header" method="POST">
      @csrf
      <input type="hidden" name="type" value="category">
      <input type="text" name="title" placeholder="Enter category title..." required/>
      <button class="link">
         <span class="material-symbols-outlined">
            add_circle
         </span>
      </button>
   </form>

   @foreach($categories as $category)
      <form class='category' method='POST'>
      @csrf
         <input type="hidden" name="type" value="delete_category">
         <input type="hidden" name="category_id" value="{{ $category->id }}">
         <h3>{{ $category ->title  }}</h3>
         <button class='link'>
            <span  span class="material-symbols-outlined">
               delete
            </span>
         </button>
      </form>
   @endforeach

   <div class="admin__header">
      <h2>Under Categories</h2>
   </div>

   <form class="admin__header" method="POST">
      @csrf
      <input type="hidden" name="type" value="under_category">
      <input type="text" name="title" placeholder="Enter title..." required/>
      <select name="category_id"  required>
         <option disabled selected>Choose Category</option>
            @foreach($categories as $category)
               <option value="{{ $category ->id  }}" >{{ $category ->title  }}</option>
            @endforeach
      </select>
      <button class="link">
         <span class="material-symbols-outlined">
            add_circle
         </span>
      </button>
   </form>

   @foreach($underCategories as $category)
      <form class='category' method='POST'>
         @csrf
        <input type="hidden" name="type" value="delete_under_category">
         <input type="hidden" name="category_id" value="{{ $category->id }}">
         <h3>{{ $category ->title  }}</h3>
         <span>{{ $category->category->title }}</span>
         <button  class='link'>
            <span  span class="material-symbols-outlined">
               delete
            </span>
         </button>
      </form>
   @endforeach
</div>
</div>
@endsection