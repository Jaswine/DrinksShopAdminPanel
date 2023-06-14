@extends('main')

@section('title', 'Auth page')

@section('content')
<div class="page">
   <h2 class="page__margin5">My account</h2>
   <div class="page__flex__center page__margin5">
      <a 
         href="/login" 
         class="page__flex__center__menu page__left__menu"
         @if($type == 'login')
            style='background-color: #000000; color: lightgray;'
         @endif
      >Sign In</a>
      <a 
         href="/registration" 
         class="page__flex__center__menu page__right__menu"
         @if($type == 'register')
            style='         background-color: #000000; color: lightgray;'
         @endif
      >Sign Up</a>
   </div>
   <form action=""  method="POST" class='auth__form' >
      @csrf

      @if($type == 'register')
         <input type="text" name="username" placeholder="Enter your username...">

         @error('username')
         <div class='message'>{{$message}}</div>
         @enderror
      @endif
      <input type="email" name="email" placeholder="Enter your email...">

      @error('email')
      <div class='message'>{{$message}}</div>
      @enderror

      <input type="password" name="password" placeholder="Enter your password...">

       @error('password')
      <div class='message'>{{$message}}</div>
      @enderror

      <button class="btn">CONTINUE</button>
   </form>
</div>
@endsection