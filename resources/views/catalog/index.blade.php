@extends('layout.site')

@section('content')
    <h1>Каталог товаров</h1>

    <p>
    CactusHub предоставляет большое разнообразие кактусов и не только. Ниже продставлен наш католог, поделенныей на 
    разделы для удобства навигации.
    </p>

    <h2>Разделы каталога</h2>
    <div class="row">
        @foreach ($roots as $root)
            @include('catalog.part.category', ['category' => $root])
        @endforeach
    </div>
@endsection