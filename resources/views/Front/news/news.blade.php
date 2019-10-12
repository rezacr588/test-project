@extends('layouts.front')
@section('main')
    <article dir="rtl">
        <div id="title">
            {{$news->title}}
        </div>
        <div id="body">
            <img src="/storage/posts/{{$news->thumb()->fake}}" alt="{{$news->title}}">
            <hr>
            {{$news->text}}
            <br>
            {{verta($news->created_at)}}
        </div>
    </article>
@endsection
