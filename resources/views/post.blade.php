<head>
    <title>{{ $post->title }}</title>
    <style>
        h1,h2,h3{
            color: #133857 !important;
        }
        p{
            font-size: 15px;
            color: #061a2b;
        }
        /* hr{
            border-top :#32618a 1px solid !important;
        } */
        .embedded_image p{
            color: #133857;
            text-align: center;
            font-size: 17px;
            font-style: italic;
        }
        .main-post{
            margin-bottom: 30px;
        }
        ul{
            font-size: 15px;
            color: #133857;
        }
        li{
            list-style-type: disc; 
            margin-bottom: 5px;
            color: #061a2b;
        }
        .main-post a{
            color: #f05454;
            font-weight: bold;
        }
        .main-post a:hover{
            color: #922d2d;
        }
    </style>
</head>
@extends('layouts.app')
@section('content')

    <div class="main-post">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="col-md-8">
                    <div>
                        <div><h1>{{ $post->title }}</h1></div>
                        <br>
                        <div>
                            {!! $post->body !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection