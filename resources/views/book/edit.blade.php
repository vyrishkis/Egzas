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



    <div class=" h-92 flex content-start flex-wrap m-auto lg:w-8/12 xl:w-6/12 sm:w-10/12 mt-10 bg-gray-100">
        <a class="text-2xl sm:text-3xl m-auto py-6 ">Redaguoti knygą</a>
        <table class="m-auto w-11/12  ">

            <tr class="h-12 text-xl border-solid   border-gray-500 border-2 ">
                <td>
                    <p>Pavadinimas:</p>
                </td>
                <form method="POST" action="{{route('book.update',[$book])}}">
                    
                <td>
                    <input class="w-7/12" type="text" name="book_title" value="{{$book->title}}">
                </td>
            </tr>


            <tr class="h-12 text-xl border-solid   border-gray-500 border-2">
                <td>
                    <p>ISBN:</p>
                </td>
                <td>
                <input class="w-7/12" type="text" name="book_isbn" value="{{$book->isbn}}">
                </td>
            </tr>


            <tr class="h-12 text-xl border-solid   border-gray-500 border-2">
                <td>
                    <p>Puslapiai:</p>
                </td>
                <td>
                <input class="w-7/12" type="text" name="book_pages" value="{{$book->pages}}">            </tr>


            <tr class="h-12 text-xl border-solid   border-gray-500 border-2">
                <td>
                    <p>Apie autorių:</p>
                </td>
                <td>
                <textarea class="w-7/12" name="book_about">{{$book->about}}"</textarea>
                </td>
                        </tr>
            <br>

            <tr class="h-12 text-xl border-solid   border-gray-500 border-2">
                <td>
                    <p>Apie autorių:</p>
                </td>
                <td>
                <select class="w-7/12" name="author_id">
           @foreach ($authors as $author)
               <option  value="{{$author->id}}" @if($author->id == $book->author_id) selected @endif>
                   {{$author->name}} {{$author->surname}}
               </option>
           @endforeach
</select>
            </tr>
            <br>

        </table>

        @csrf

        <div class="relative h-10 w-full">


            <button class="bg-gray-600 hover:bg-gray-400 text-gray-100 w-auto h-auto m-1 p-3  rounded-full mt-12 absolute top-0 right-0     " type="submit">Pridėti</button>

        </div>
        </form>


    </div>

</body>










<!-- <form method="POST" action="{{route('book.update',[$book])}}">
       Title: <input type="text" name="book_title" value="{{$book->title}}">
       ISBN: <input type="text" name="book_isbn" value="{{$book->isbn}}">
       Pages: <input type="text" name="book_pages" value="{{$book->pages}}">
       About: <textarea name="book_about">{{$book->about}}"</textarea>
       <select name="author_id">
           @foreach ($authors as $author)
               <option value="{{$author->id}}" @if($author->id == $book->author_id) selected @endif>
                   {{$author->name}} {{$author->surname}}
               </option>
           @endforeach
</select>
       @csrf
       <button type="submit">EDIT</button>
</form> -->