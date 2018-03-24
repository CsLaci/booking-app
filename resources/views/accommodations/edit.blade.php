@extends('layouts.app')

@section('content')

    <h1>Edit {{ $accommodation->title }}</h1> 
    {{--   Ez egy echo   --}}

    <form action="/accommodations/{{ $accommodation->id }}" method="post">

        {{ csrf_field() }}
        {{--  {{ csrf_field() }}  --}}
        {{--  ovintezkedes, hogy ne tuddjanak mas honnan kuldeni-hasznalni a te formodat  --}}

        {{ method_field('put') }}
        {{--  erolteti, hogy a post helyett put legyen  --}}

        <p>
        <input type="text" name="title" value="{{ $accommodation->title }}">
        </p>
        <p>
            Description: <input type="text" name="description" value="{{ $accommodation->description }}">
        <p>
        <input type="submit" value="Update">
    </form>

@endsection