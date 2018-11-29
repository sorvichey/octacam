@extends('layouts.front')
@section('content')
<!-- ##### Blog Area Start ##### -->
<div class="blog-area">
    <div class="container">
        <br>
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="blog-posts-area" style="background:#fff; padding: 0 15px; ">
                    <!-- Single Featured Post -->
                    <div class="single-blog-post featured-post single-post">
                        <div class="post-thumb">
                            <a href="#"><img src="img/bg-img/25.jpg" alt=""></a>
                        </div>
                        <div class="post-data">
                            <h6 class="post-title">{{$post->title}}</h6>
                            <div class="post-meta row">
                                <div class="col-md-6">
                                        <span>
                                            Share to ៖​
                                            <ul class="rrssb-buttons">
                                                <a href="https://www.facebook.com/sharer/sharer.php?u={{url('post/detail/'.$post->id)}}"  class="popup">
                                                    <span style="color:#4267b2;" class="fa fa-2x fa-facebook-official"></span>
                                                </a>
                                                <a href="https://twitter.com/intent/tweet?text={{$post->title}} {{url('post/detail/'.$post->id)}}"
                                                class="popup">
                                                <span style="color:#00aced;" class="fa fa-2x text-info fa-twitter"></span>
                                                </a>
                                                <a href="mailto:?Subject={{$post->title}}&amp;body={{url('post/detail/'.$post->id)}}">
                                                    <span class="fa fa-google-plus text-danger fa-2x"></span>
                                                </a>
                                            </ul>
                                        </div>
                                        </span> 
                                <div class="col-md-12">
                                <div class="youtube-video">
                                    {!!$post->description!!} 
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div> <br>
                    <?php $lested_news = DB::table('posts')->where('category_id', 2)->where('active', 1)->orderBy('id', 'desc')->limit('5')->get(); ?>
                    <div class="col-12 col-lg-4">
                    <div class="blog-sidebar-area">
                        <div class="latest-posts-widget mb-15">
                        <div class="single-blog-post small-featured-post  shadow-sm bg-light rounded" style="padding: 10px 15px 1px 15px;">
                            <div class="title-news">
                                Lastes News
                            </div>
                            <hr class="hr1">
                        </div>
                        @foreach($lested_news as $n)
                        <div class="single-blog-post small-featured-post pr-0 shadow-sm p-2 bg-light rounded">
                        <div class="row">
                            @if($n->featured_image != null)
                            <div class="col-md-4 col-4 padding-right-0 feature-image-smaller">
                                <a href="{{url('post/detail/'.$n->id)}}"><img src="{{asset('uploads/posts/small/'.$n->featured_image)}}" alt=""></a>
                            </div>
                            @endif
                            @if($n->featured_image != null)
                            <div class="post-meta col-8 col-md-8 pl-0">
                            @else 
                            <div class="post-meta col-12 col-md-12">
                            @endif
                                <div class="post-data">
                                    <a href="{{url('post/detail/'.$n->id)}}" class="post-catagory">{{str_limit(strip_tags($n->title), $n->title = 35, $end = '...')}}</a>
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
<br>
@endsection