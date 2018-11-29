@extends('layouts.front-fr')
@section('content')
<div class="frame-content container">
<br>
<div class="featured-post-area">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-8 pd-0"><br>
                <div class="infinite-scroll"> 
                    @foreach($posts as $p)
                            <div class="single-blog-post small-featured-post shadow-sm p-3  bg-light rounded">
                                <div class="post-data">
                                    <a href="{{asset('fr/post/detail/'.$p->id)}}" class="post-catagory">{{str_limit(strip_tags($p->title), $p->title = 210, $end = '...')}}</a>
                                </div>
                                <hr>
                            <div class="row">
                                @if($p->featured_image != null)
                                <div class="col-md-4 featured-image">
                                    <a href="{{asset('fr/post/detail/'.$p->id)}}"><img src="{{asset('uploads/posts/small/'.$p->featured_image)}}" width="100%" alt=""></a>
                                </div>
                                @endif
                                @if($p->featured_image != null)
                                <div class="post-meta col-md-8">
                                @else
                                <div class="post-meta col-md-12">
                                @endif
                                    <a href="{{asset('fr/post/detail/'.$p->id)}}" class="post-title">
                                        <h6>{!!  str_limit(strip_tags($p->description), $p->description = 350, $end = '...') !!}</h6>
                                    </a>
                                </div>
                            </div>
                            </div><br>
                        @endforeach
                </div>
            </div>
            <?php $lested_news = DB::table('posts')->where('category_id', 3)->where('active', 1)->orderBy('id', 'desc')->limit('5')->get(); ?>
                <div class="col-12 col-lg-4">
               
                <div class="blog-sidebar-area">                      
                <div class="latest-posts-widget mb-15">
                <div class="single-blog-post small-featured-post  shadow-sm bg-light rounded" style="padding: 10px 15px 1px 15px;">
                    <div class="title-news">
                        SOMMAIRE
                    </div>
                    <hr class="hr1">
                </div>
                    @foreach($lested_news as $n)
                        <div class="single-blog-post small-featured-post pr-0 shadow-sm p-2 bg-light rounded">
                        <div class="row">
                            @if($n->featured_image != null)
                            <div class="col-md-4 col-4 padding-right-0 feature-image-smaller">
                                <a href="{{url('fr/post/detail/'.$n->id)}}"><img src="{{asset('uploads/posts/small/'.$n->featured_image)}}" alt=""></a>
                            </div>
                            @endif
                            @if($n->featured_image != null)
                            <div class="post-meta col-8 col-md-8 pl-0">
                            @else 
                            <div class="post-meta col-12 col-md-12">
                            @endif
                                <div class="post-data">
                                    <a href="{{url('fr/post/detail/'.$n->id)}}" class="post-catagory">{{str_limit(strip_tags($n->title), $n->title = 35, $end = '...')}}</a>
                                </div>
                            </div>
                            </div>
                        </div>  
                    @endforeach
                </div>
            </div> 
        </div>
    </div>
</div>
</div>
</div>
<br>
@endsection
@section('js')
<script src="{{asset('fronts/js/jscroll-master/dist/jquery.jscroll.min.js')}}"></script>
    <script type="text/javascript">
        $('ul.pagination').hide();
        $(function() {
            $('.infinite-scroll').jscroll({
                autoTrigger: true,
                loadingHtml: '<img class="center-block" src="{{asset('fronts/img/loading.gif')}}" alt="Loading..." />',
                padding: 0,
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div.infinite-scroll',
                callback: function() {
                    $('ul.pagination').remove();
                }
            });
        });
    </script>
@endsection