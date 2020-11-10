<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel - TailWindCSS</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>



<body class="bg-gray-100">

  <div class="bg-gray-300 lg:w-screen  h-36 sm:h-48  grid grid-cols-1 grid-rows-none sm:grid-cols-2 lg:grid-cols-3 lg:grid-rows-1">
    <img class=" col-span-1 row-span-1 invisible sm:visible w-1/2 h-1/2 max-w-xl m-auto " src="{{asset('img/log.svg')}}" alt="Monkey">

    <div class="grid grid-cols-1   lg:grid-cols-4 lg:py-16  lg:col-span-2  gap-px lg:px-5 lg:gap-4">
      <form method="GET" action="{{route('author.create')}}" class="grid">
        <button class="h-10 sm:h-full lg:h-10 lg:text-sm bg-gray-600 text-cool-gray-100 uppercase hover:bg-gray-500 ">Pridėti autorių</button></form>
      <form method="GET" action="{{route('author.index')}}" class="grid">
        <button class="h-10 sm:h-full lg:h-10 lg:text-sm  bg-gray-600 text-cool-gray-100 uppercase hover:bg-gray-500  ">Redaguoti autorių</button></form>
      <form method="GET" action="{{route('book.create')}}" class="grid">
        <button class="h-10 sm:h-full lg:h-10 lg:text-sm bg-gray-600 text-cool-gray-100 uppercase hover:bg-gray-500  ">Pridėti knygą</button></form>
      <form method="GET" action="{{route('book.index')}}" class="grid">

        <button class="h-10 sm:h-full lg:h-10 lg:text-sm  bg-gray-600 text-cool-gray-100 uppercase hover:bg-gray-500  ">Redaguoti knygas</button></form>
    </div>

    @if (Route::has('login'))
    <div class="absolute top-40 sm:top-48 lg:top-0 right-0 px-4 py-2">

      @auth
      <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
      @else
      <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Jungtis</a>

      @if (Route::has('register'))
      <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Registracija</a>
      @endif
      @endif
    </div>
    @endif

  </div>



  <div class="flex content-start flex-wrap m-auto lg:w-8/12 xl:w-6/12 sm:w-10/12 mt-10 bg-gray-100">
    <a class="text-2xl sm:text-3xl m-auto py-6 ">Autorių sąrašas</a>
    <table class="m-auto w-11/12  ">

    @foreach ($books as $book)
          <tr class="border-solid border-gray-500 border-2 ">
        <td>
          
        <a class="pl-2" href="{{route('book.edit',[$book])}}">{{$book->title}} {{$book->bookAuthor->name}} {{$book->bookAuthor->surname}}</a>

        </a></td>


        <td>
          
          
        <form method="GET" action="{{route('book.edit', [$book])}}">
            <button class=" bg-gray-600 hover:bg-gray-400 text-gray-100 w-8 h-8 m-1 p-1  rounded-full float-right" type="submit">R</button>
          </form>
        </td>




        <td class="w-10 h-10">



          <form method="POST" action="{{route('book.destroy', [$book])}}">

            @csrf
            <button class="bg-gray-600 hover:bg-gray-400 text-gray-100 w-8 h-8 m-1 p-1  rounded-full float-right" type="submit">T</button>
        </td>
        </form>
      </tr>
      @endforeach

    </table>

  </div>



</body>










<!-- @foreach ($books as $book)
  <a href="{{route('book.edit',[$book])}}">{{$book->title}} {{$book->bookAuthor->name}} {{$book->bookAuthor->surname}}</a>
  <form method="POST" action="{{route('book.destroy', [$book])}}">
   @csrf
   <button type="submit">DELETE</button>
  </form>
  <br>
@endforeach -->