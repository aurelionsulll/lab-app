@extends('layouts.app')
@section('content')
<div class="container" style="margin-top: 50px">
    <div class="row">
    @foreach ($posts as $post)
      <div class="col-md-6 col-lg-6 col-xl-6" >
        <div class="tm-sc-blog blog-style-default mb-30" style="border: 1px solid #061a2b; border-radius: 15px;">
          <article class="post type-post status-publish format-standard has-post-thumbnail">
            <div class="entry-header">
              <div class="post-thumb lightgallery-lightbox">
                <div class="post-thumb-inner">
                  <div class="thumb"> 
                      @if ($post->featured_image)
                      <img src="{{ $post->featured_image }}" alt="Image" style="border-radius: 15px 15px 0px 0px;">
                      @endif
                </div>
                </div>
              </div>
            </div>
            <div class="entry-content" style="padding: 10px">
              <h4 class="entry-title" ><a href="{{ url($post->slug) }}" style="color: #061a2b !important">{{ $post->title }}</a></h4>
              <div class="entry-meta mt-0 mb-0">
                <span class="mb-10 text-gray-darkgray mr-10 font-size-13"><i class="far fa-calendar-alt mr-10 text-theme-colored" style="color: #3ec5cc"></i> {{ $post->publish_date }}</span>
              </div>
              <div class="post-excerpt">
                <div class="mascot-post-excerpt" style="color: #061a2b !important">{{ $post->excerpt }}</div>
              </div>
              <div class="clearfix"></div>
            </div>
          </article>
        </div>
      </div>
      @endforeach
    </div>
  </div>

@endsection