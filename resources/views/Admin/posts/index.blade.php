@extends('layouts.admin')
@section('style')
    <style>
        table{
            border-collapse: collapse;
        }
        table,th,td{
            border: #1d68a7 solid 2px;
            padding: 10px;
        }
        #newPost:active{
            color: #1d68a7;
        }

    </style>
@endsection
@section('mainPart')
    <a href="{{route('posts.create')}}"> <button type="button" class="btn btn-secondary"> ایجاد خبر </button></a>
    <table>
        <tr>
            <th>شماره</th>
            <th>عنوان</th>
            <th>تاریخ ایجاد</th>
            <th>عملیات</th>
        </tr>
        @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{verta($post->created_at)->formatDifference()}}</td>
                <td>
                    <form action="{{route('posts.destroy',$post)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="{{route('posts.edit',['post'=>$post])}}" id="newPost">ویرایش</a>
                        <button type="submit" class="btn btn-danger">حذف</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
