@extends('layouts.frontend')
@section('styles')
@endsection

@section('content')
<div class="container-fluid page-header py-5">
    <div class="container text-center py-5">
        <h3 class="display-5 text-primary mb-4 animated slideInDown">
            {{ $blog->title}}
        </h3>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">หน้าหลัก</a></li>
                <li class="breadcrumb-item"><a href="{{url('/about')}}">รอบรู้เรื่องขับขี่</a></li>
                <li class="breadcrumb-item text-primary" aria-current="page">{{ $blog->title}}</li>
            </ol>
        </nav>
    </div>
</div>
<div class="container py-4">
    <div class="row">
        <div class="col-lg-12">
            <article class="blog-details">
                <div class="post-img mb-3 text-center">
                    <img src="{{ asset('blogs/'.$blog->imageName) }}" alt="" class="img-fluid">
                </div>
                <h2 class="title">{{ $blog->title }}</h2>
                <div class="content">
                    {!! $blog->content !!}
                </div>
            </article>
        </div>
    </div>
</div>
@endsection
