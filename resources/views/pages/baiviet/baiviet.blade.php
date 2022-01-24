@extends('layout')
@section('content')
    <style type="text/css">
        .baiviet ul li {
            padding: 2px;
            font-size: 16px;
        }

        .baiviet ul li a {
            color: #000;
        }

        .baiviet ul li a:hover {
            color: #FE980F;
        }

        .baiviet ul li {
            list-style-type: decimal-leading-zero;
        }

        .mucluc h1 {
            font-size: 20px;
            color: brown;
        }

    </style>
    <div class="features_items">


        <h2 style="margin:0;position: inherit;font-size: 22px" class="title text-center">{{ $meta_title }}</h2>


        <div class="product-image-wrapper" style="border: none;">
            @foreach ($post_by_id as $key => $p)
                <div class="single-products" style="margin:10px 0;padding: 2px">
                    {!! $p->post_content !!}

                </div>
                <div class="clearfix"></div>
            @endforeach
        </div>

    </div>
    <!--features_items-->

    <style type="text/css">
        ul.post_relate li {
            list-style-type: disc;
            font-size: 16px;
            padding: 6px;
        }

        ul.post_relate li a {
            color: #000;
        }

        ul.post_relate li a:hover {
            color: #FE980F;
        }

    </style>


    <!--/recommended_items-->
@endsection
