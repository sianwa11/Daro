@extends('layouts.master_auth')

@section('css_after')
    <link rel="stylesheet" href="{{asset('js/plugins/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('js/plugins/slick/slick-theme.css')}}">
@endsection

@section('content')
    {{-- Hero --}}
    <div class="bg-image bg-image-bottom" style="background-image: url({{asset('media/photos/photo20@2x.jpg')}});">
        <div class="bg-primary-dark-op">
            <div class="content text-center">
                <div class="pt-50 pb-20">
                    <h1 class="font-w700 text-white mb-10">Dashboard</h1>
                    <h2 class="h4 font-w400 text-white-op">Hello {{auth()->user()->name}}</h2>
                </div>
            </div>
        </div>
    </div>
    {{--End Hero --}}

    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title"><i class="fa fa-star fa-fw text-primary"></i> Featured Classes</h3>
        </div>

        <div class="block-content">
            <div class="js-slider text-center" data-autoplay="true" data-dots="true" data-arrows="true" data-slides-to-show="3">

                @forelse($virtual_classes as $classes)
                    <div class="col">
                        <a class="block block-link-shadow block-rounded ribbon ribbon-bookmark ribbon-left ribbon-success text-center" href="preview_class/{{$classes->id}}">
                            <div class="block-content block-content-full">
                                <div class="item item-circle bg-pulse text-pulse-lighter mx-auto my-20">
                                    <i class="fa fa-book"></i>
                                </div>
                                <div class="text-warning">
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                </div>
                                <div class="font-size-sm text-muted">
                                    Created {{$classes->created_at->diffForHumans()}}
                                </div>
                            </div>
                            <div class="block-content block-content-full block-content-sm bg-body-light">
                                <div class="font-size-sm text-muted">{{$classes->class_name}}</div>
                            </div>
                            <div class="block-content block-content-full">
                                <div class="font-w600">{{$classes->description}}</div>
                                <div class="font-size-sm text-muted">10 lessons &bull; 5 hours</div>
                            </div>
                        </a>
                    </div>

                @empty
                    <p>No available classes...</p>
                @endforelse
            </div>
        </div>


@endsection

@section('js_after')

    <script src="{{asset('js/plugins/slick/slick.min.js')}}"></script>
    <script>jQuery(function(){ Codebase.helpers('slick'); });</script>
@endsection
