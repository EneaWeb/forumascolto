@extends('frontend.layout.main')
@section('content')

    <div style="height:120px"></div>
    <section class="" style="min-height:90vh">
        <div class="container">
            
            <!-- SECTION HEADER -->
            <div class="section-header">
                <!-- SECTION TITLE -->
                <h2 class="dark-text">News</h2>
            </div>
            
                <!-- SHORT DESCRIPTION ABOUT THE SECTION -->
                <div class="col-md-12">
                    
                    <div class="container">
                        @foreach ($posts as $post)
                            <div style="height:20px"></div>
                            <h3 style="text-align:left">{{ $post->title }}</h3>
                            <h6 style="font-size:15px; padding: 50px 0px; margin-left:auto; margin-right:auto; text-align:left">
                                {!!$post->content!!}
                            </h6>
                        <hr>
                        @endforeach
                    </div>

                    <div style="text-align:right">
                        {{ $posts->links() }}
                    </div>
                    
                </div>
            
            <!-- / END SECTION HEADER -->

        </div> <!-- / END CONTAINER -->
    </section>
@stop