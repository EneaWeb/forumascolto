<!-- =========================
    BLOG SECTION
============================== -->

<section class="blog" id="news" style="margin-top:-40px; margin-bottom:10px">
<div style="height:60px"></div>
<!-- SECTION HEADER -->

    <div class="section-header">
        <h2 class="dark-text">News</h2>
        <h6>
        </h6>
    </div>

    <div class="container">
        <div class="col-md-6" style="text-align:left; border-right: 2px solid #e4e4e4">
            <br>
            <h3>{!!$posts[0]->title!!}</h3><br>
            <div style="font-family:'Dancing Script', sans-serif; font-size:24px; line-height:1.2">{!!substr(strip_tags($posts[0]->content, '<br>'), 0, 300)!!}</div>
            <div style="text-align:right"><br><i><a href="/news/{!!$posts[0]->id!!}">Leggi ancora..</a></i></div>
        </div>
        <div class="col-md-6" style="text-align:left; padding-left:25px">
            <br>
            <h3>{!!$posts[1]->title!!}</h3><br>
            <div style="font-family:'Dancing Script', sans-serif; font-size:24px; line-height:1.2">{!!substr(strip_tags($posts[1]->content, '<br>'), 0, 300)!!}</div>
            <div style="text-align:right"><br><i><a href="/news/{!!$posts[1]->id!!}">Leggi ancora..</a></i></div>
        </div>
        
    </div>
    
</section>