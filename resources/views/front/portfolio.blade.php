<section id="portfolio" class="section-bg">
    <div class="container">

        <header class="section-header">
            <h3 class="section-title">نمونه کارها</h3>
        </header>

        <div class="row">
            <div class="col-lg-12">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">همه نمونه کار ها</li>
                    @foreach ($tags as $item)
                        <li data-filter=".filter-{{$item->tag}}">{{$item->tag}}</li>
                    @endforeach

                </ul>
            </div>
        </div>




        <div class="row portfolio-container">
            @foreach ($portfolios as $portfolio)
            <div class="col-lg-4 col-md-6 portfolio-item filter-{{$portfolio->tag}}">
                <div class="portfolio-wrap">
                    <img src="{{$portfolio->image}}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4><a href="{{$portfolio->link}}">{{$portfolio->name}}</a></h4>
                        <p>{!! $portfolio->description !!}</p>
                        <div>
                            <a href="{{$portfolio->image}}" data-lightbox="portfolio" data-title="App {{$portfolio->name}}" class="link-preview"
                               title="مشاهده"><i class="ion ion-eye"></i></a>
                            <a href="{{$portfolio->link}}" target="_blank" class="link-details" title="اطلاعات بیشتر"><i class="ion ion-android-open"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>
