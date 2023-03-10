@extends('layouts.default')
<style>
    th{
        background-color:#289adc;
        color:white;
        padding:5px 40px;
    }
    tr:nth-child(odd) td{
        background-color:#ffffff;
    }
    td{
        padding:25px 40px;
        background-color:#eeeeee;
        text-align:center;
    }
    button{
        padding:10px 20px;
        background-color:#289adc;
        border:none;
        color:white;
    }
</style>
@section('title','book.add.blade.php')

@section('content')
@if(count($errors)>0)
<ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
</ul>
@endif
<form action="/book/add" method="post">
    <table>
        @csrf
        <tr>
            <th>author_id:</th>
            <td><input type="number" name="author_id"></td>
        </tr>
        <tr>
            <th>title:</th>
            <td><input type="text" name="title"></td>
        </tr>
    </table>
    <button>送信</button>
</form>
@endsection