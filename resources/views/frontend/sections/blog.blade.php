<section class="blog-area section-padding-top" id="blog-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 text-center">
                <div class="section-title">
                    <h3 class="title">{{ $blogSection->title }}</h3>
                    <div class="desc">
                        <p>{!! $blogSection->sub_title !!}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="blog-slider">
                    @foreach ($blogs as $blog)
                        <div class="single-blog">
                            <figure class="blog-image">
                                <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}">
                            </figure>
                            <div class="blog-content">
                                <h3 class="title"><a href="{{ route('show.blog', $blog->id) }}">{{ $blog->title }}</a>
                                </h3>
                                <div class="desc">
                                    {!! Str::limit($blog->description, 150, '...') !!}
                                </div>
                                <a href="{{ route('show.blog', $blog->id) }}"
                                    class="button-primary-trans mouse-dir">Leia mais<span class="dir-part"></span> <i
                                        class="fal fa-arrow-right"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
