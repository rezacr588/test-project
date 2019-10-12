@extends('layouts.admin')
@section('style')
    <style>
        .form-a{
            margin: 2% 15%;
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
        <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
            <div class="form-g">
                <label for="title"> عنوان </label>
                <input type="text" name="title" id="title">
            </div>
            <div class="form-g">
                <label for="text"> متن خبر </label>
                <textarea name="text" id="text"></textarea>
            </div>
            <div class="form-g">
                <label for="image">تصویر اصلی</label>
                <input type="file" name="image" id="image">
            </div>
            <button type="submit">ذخیره</button>
        </form>
    </div>
@endsection
@section('script')

@endsection
