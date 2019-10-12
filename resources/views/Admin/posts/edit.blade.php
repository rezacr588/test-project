@extends('layouts.admin')
@section('style')
    <style>
        .form-a{
            margin: 2% 15%;
        }
        .img-e{
            text-align: center;
        }
        img{
            width: 70%;
            height: 70%;
        }
    </style>
@endsection
@section('mainPart')
    @if($errors->any())
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    <li class="error">{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="form-a">
        <div class="img-e">
            <img src="/storage/posts/{{$post->thumb()->fake}}" alt="{{$post->title}}" >
        </div>
        <form action="{{route('posts.update',$post)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
            <div class="form-g">
                <label for="title"> عنوان </label>
                <input type="text" name="title" id="title" value="{{$post->title}}">
            </div >
            <div class="form-g">
                <label for="text"> متن خبر </label>
                <textarea name="text" rows="20" cols="120" id="text">{{$post->text}}</textarea>
            </div>
            <div class="form-g">
                <label for="image">تغییر تصویر اصلی</label>
                <input type="file" name="image" id="image">
            </div>
            <div>
                <button type="submit">ذخیره</button>
            </div>
        </form>
    </div>
@endsection

