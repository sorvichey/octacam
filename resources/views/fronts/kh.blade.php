
@extends('layouts.front-kh')
@section('content')  
 <!-- ##### Header Area End ##### -->
 <div class="frame-content container">
    <!-- ##### Hero Area Start ##### -->
    <div class="hero-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-9">
                    <!-- Breaking News Widget -->
                    @if($qoutes != null)
                    <div class="col-md-12">
                       <div class="row">
                            <div class="col-1 col-md-1">
                                <i class="fa fa-quote-left text-danger"></i>
                            </div>
                            <div class="col-9 col-md-10">
                                <div class="marquee"><span>{{$qoutes->description}}</span></div>
                            </div>
                            <div class="col-1 col-md-1">
                                <i class="fa fa-quote-right text-danger"></i>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <?php
                     
                     $month = date('m');
                     $day = date("d");
                     $year = date("Y");  
                ?>
                <div class="col-12 col-lg-3">
                    <div class="hero-add text-center">
                        <a href="#" class="text-white">ថ្ងៃទី​  {{App\Http\Controllers\Helper::toKh($day)}} ខែ 
                        {{App\Http\Controllers\Helper::khMonth($month)}} ឆ្នាំ 
                            {{App\Http\Controllers\Helper::toKh($year)}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Hero Area End ##### -->
    <div class="container ">
        <div class="row">
            <div class="pb-4 col-md-9">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                    <?php $i = 1; ?>
                    @foreach($slides as $s)
                        @if($i++ == 1 )
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{asset('uploads/slides/'.$s->photo)}}" width="100%">
                            <div class="carousel-caption d-none d-md-block">
                                <p class="text-slide">{{$s->name}}</p>
                            </div>
                        </div>
                        @else 
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{asset('uploads/slides/'.$s->photo)}}" width="100%">
                            <div class="carousel-caption d-none d-md-block">
                                <p class="text-slide">{{$s->name}}</p>
                            </div>
                        </div>
                        @endif
                    @endforeach 
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
    <?php 
       $videos = DB::table('videos')
        ->where('active', 1)
        ->orderBy('order', 'asc')
        ->get();
    ?>
    <div class="col-md-3">
    @foreach($videos as $v)
        <p>
            <iframe 
                class="video-akp"
                src="{{$v->url}}" 
                frameborder="0" 
                allowfullscreen
            >
            </iframe>
        </p>
    @endforeach
    </div>
    </div>
    </div>
    <!-- ##### Featured Post Area Start ##### -->
    <div class="featured-post-area">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-8">
                    <div class="section-heading section-heading-kh">
                        <p>
                            ព័ត៌មានជាតិ
                        </p>
                    </div>
                    <br>    
                    @foreach($posts as $p)
                        <div class="single-blog-post small-featured-post    shadow-sm p-3  bg-light rounded">
                               
                                <div class="post-data">
                                    <a href="{{asset('kh/post/detail/'.$p->id)}}" class="post-catagory">{{str_limit(strip_tags($p->title), $p->title = 210, $end = '...')}}</a>
                                </div>
                                <hr>
                                <div class="row">
                                @if($p->featured_image != null)
                                    <div class="col-md-4 featured-image">
                                        <a href="{{asset('kh/post/detail/'.$p->id)}}">
                                            <img src="{{asset('uploads/posts/small/'.$p->featured_image)}}" alt="">
                                        </a>
                                    </div>
                                @endif
                                @if($p->featured_image != null)
                                    <div class="post-meta col-md-8">
                                @else
                                    <div class="post-meta col-md-12">
                                @endif
                                        <a href="{{asset('kh/post/detail/'.$p->id)}}" class="post-title">
                                            <h6>{!!  str_limit(strip_tags($p->description), $p->description = 350, $end = '...') !!}</h6>
                                        </a>
                                    </div>
                                </div>
                               
                        </div> <br>
                    @endforeach
                    <div class="row">
                        <div class="mb-4 w-100 col-md-4  mt-3">
                            {{$posts->links()}}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-4">
                        <div class="section-heading2 section-heading-kh">
                            <p>
                                ព័ត៌មានរូបថត
                            </p>
                        </div>
                                @foreach($photo_news as $p)
                                    <div class="single-blog-post small-featured-post d-flex">
                                        <div class="col-md-12 px-0">
                                            <a href="{{asset('kh/post/detail/'.$p->id)}}"><img src="{{asset('uploads/posts/small/'.$p->featured_image)}}" alt=""></a>
                                            <div class="post-meta shadow-sm p-3  bg-light rounded">
                                                <a href="{{asset('kh/post/detail/'.$p->id)}}"  class="photo">
                                                {{str_limit(strip_tags($p->title), $p->title = 220, $end = '...')}}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                    <a class="btn btn-primary mt-3 mb-3"  href="{{url('kh/post/category/4')}}"><i class="fa fa-arrow-right"></i> ព័ត៌មានចាស់ៗ </a>
                                            <div class="section-heading3 shadow p-2 section-heading-kh">
                                                <p>ទីទុកឯកសារ</p>
                                            </div>
                                            <div class="document shadow p-2">
                                                <p>
                                                    <i class="fa fa-file-text text-dark"></i>  2018
                                                </p>
                                                <p>
                                                    <i class="fa fa-file-text text-dark"></i> 2017
                                                </p>
                                                <p>
                                            <i class="fa fa-file-text text-dark"></i> 2016
                                        </p>
                                        <p>
                                            <i class="fa fa-file-text text-dark"></i> 2015
                                        </p>
                                        <p>
                                                <i class="fa fa-file-text text-dark"></i> 2014
                                            </p>
                                            <p>
                                                <i class="fa fa-file-text text-dark"></i> 2013
                                            </p>
                                            <p>
                                                    <i class="fa fa-file-text text-dark"></i> 2012
                                                </p>
                                                <p>
                                                    <i class="fa fa-file-text text-dark"></i> 2011
                                                </p>
                                                <p>
                                                        <i class="fa fa-file-text text-dark"></i> 2010
                                                    </p>
                                                    
                                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div><br>
 @endsection
   