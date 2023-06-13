<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>@yield('title')</title>

   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

   <style>
         * {
         box-sizing: border-box;
         padding: 0;
         margin: 0;
         text-decoration: none;
      }
      body {
         background-color: #E5E5E5;
         color: #000000;
         font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
         font-size: 16px;
         overflow-x: hidden;
         padding: 0 5vw;
      }
      input, select {
         background-color: rgb(254,254,254,.05);
         font-size: 18px;
         padding: 10px 10px;
         margin: 4px 0;
         border: none;
         color: black;
         transition: all .3s linear;
         outline: none;
         width: 100%;
         border-bottom: 2px solid rgb(0,0,0,.1);
         border-radius: 0;
      }
      input:focus, select:focus {
         border-bottom: 2px solid rgb(0,0,0);
      }
     
      header {
         padding: 10px 0 4px 0;
         height: 60px;
         display: flex;
         justify-content: space-between;
         align-items: center;
         width: 100%;
         border-bottom: 1px solid rgb(0,0,0,.1);
      }
      .header a {
         font-size: 22px;
      }
      header .logo {
         font-size: 24px;
      }
      .header__menu {
         display: flex;
         justify-content: center;
         align-items: center;
         gap: 10px
      }
      .header__menu a, .link {
         padding: 8px;
         transition: all .3s linear;
         display: flex;
         justify-content: center;
         align-items: center;
         flex-direction: column;
         background-color: transparent;
         font-size: 18px;
         border: none;
         outline: none;
      }
      .header__menu a:hover, .link:hover {
         background-color: rgb(0,0,0,.1);
         border-radius: 100%;
         cursor: pointer;
      }
      a {
         color: #000000;
      }
      a:hover {

      }
      .page__flex__center {
         display: flex;
         justify-content: center;
         align-items: center;
      }
      .page__margin5 {
         margin-top: 3vh;
         margin-bottom: 2vh;
      }
      .page__flex__center__menu {
         min-width: 200px;
         background-color: lightgray;
         display: flex;
         justify-content: center;
         align-items: center;
         flex-direction: column;
         padding: 12px ;
         transition: all .3s linear;
      }
      .page__flex__center__menu:hover {
         background-color: #000000;
         color: lightgray;
      }
      .page__left__menu {
         border-radius: 4px 0 0 4px;
      }
      .page__right__menu {
         border-radius: 0 4px 4px 0;
      }
      .page {
         display: flex;
         justify-content: center;
         align-items: center;
         flex-direction: column;
         width: 100%;
      }
      .page form {
         width: 100%;
         max-width: 400px;
         display: flex;
         justify-content: center;
         align-items: center;
         flex-direction: column;
         row-gap: 4px;
      }
      .page form button{
         width: 100%;
         background-color: black;
         color: white;
         font-size: 18px;
         padding: 10px 10px;
         border: none;
         border-radius: 4px;
         transition: all .3s linear;
         cursor: pointer;
      }
      .page form button:hover {
         background-color: #E5E5E5;
         color: #000000;
         border: 2px solid #000000;
      }
      .admin {
         width: 100%;
         display: flex;
         justify-content: space-between;
         padding: 10px 2vw;
         gap: 3vw
      }
      .admin__right {
         width: 60%;
      }
      .admin__left {
         width: 40%;
      }
      .admin__header {
         width: 100%;
         display: flex;
         justify-content: space-between;
         align-items: center; 
         border-bottom: 2px solid rgb(0,0,0,.1);
         padding: 10px 0;
         margin-bottom: 6px;
      }
      .category {
         width: 100%;
         display: flex;
         justify-content: space-between;
         align-items: center;
      }
   </style>
</head>
<body>
   <header>
      <a href="" class="logo">SHOP</a>
      <div class="header__menu">
         @auth
            <a href="/trash">
            <span class="material-symbols-outlined">
            shopping_cart
            </span>
         </a>
         <a href="/favorites">
            <span class="material-symbols-outlined">
               favorite
               </span>
         </a>
         <a href="/profile">
            <span class="material-symbols-outlined">
               account_circle
            </span>
         </a>
         <a href='/admin'>
         <span class="material-symbols-outlined">
            view_list
            </span>
         </a>
         <a href="/logout">
            <span class="material-symbols-outlined">
               logout
               </span>
         </a>
         @else
         <a href='/login'>
         <span class="material-symbols-outlined">
            login
            </span>
         </a>
         @endauth
      </div>
   </header>

   @yield('content')
</body>
</html>