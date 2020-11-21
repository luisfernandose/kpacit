@extends('theme.master')
@section('title', 'My Courses')
@section('content')
@include('admin.message')

<!-- about-home start -->
<section id="wishlist-home" class="wishlist-home-main-block">
    <div class="container">
        <h1 class="wishlist-home-heading text-white">{{ __('frontstaticword.MyCourses') }}</h1>
    </div>
</section> 
<!-- about-home end -->
@php
    $item = App\Order::where('user_id', Auth::User()->id)->get();
@endphp

@if(count($item) > 0)
    <section id="learning-courses" class="learning-courses-main-block">
        <div class="container">
            <div class="row">
            	@foreach($enroll as $enrol)
                    @if($enrol->status == 1)
                    	@if($enrol->user_id == Auth::User()->id)
                            <div class="col-lg-3">
                                
                                <div class="view-block">
                                    <div class="view-img">
                                        @if($enrol->courses['preview_image'] !== NULL && $enrol->courses['preview_image'] !== '')
                                            <a href="{{url('show/coursecontent',$enrol->courses->id)}}"><img src="{{ asset('images/course/'.$enrol->courses->preview_image) }}" class="img-fluid" alt="student">
                                            </a>
                                        @else
                                            <a href="{{url('show/coursecontent',$enrol->courses->id)}}"><img src="{{ Avatar::create($enrol->courses->title)->toBase64() }}" class="img-fluid" alt="student"></a>
                                        @endif
                                    </div>
                                    <div class="view-dtl">
                                        <div class="view-heading btm-10"><a href="{{url('show/coursecontent',$enrol->courses->id)}}">{{ str_limit($enrol->courses->title, $limit = 35, $end = '...') }}</a></div>
                                        <p class="btm-10"><a href="#">by {{ $enrol->courses->user->fname }}</a></p>
                                        <div class="rating">
                                            <ul>
                                                <li>
                                                    <!-- star rating -->
                                                    <?php 
                                                    $learn = 0;
                                                    $price = 0;
                                                    $value = 0;
                                                    $sub_total = 0;
                                                    $sub_total = 0;
                                                    $reviews = App\ReviewRating::where('course_id',$enrol->courses->id)->where('status','1')->get();
                                                    ?> 
                                                    @if(!empty($reviews[0]))
                                                        <?php
                                                        $count =  App\ReviewRating::where('course_id',$enrol->courses->id)->count();

                                                        foreach($reviews as $review){
                                                            $learn = $review->price*5;
                                                            $price = $review->price*5;
                                                            $value = $review->value*5;
                                                            $sub_total = $sub_total + $learn + $price + $value;
                                                        }

                                                        $count = ($count*3) * 5;
                                                        $rat = $sub_total/$count;
                                                        $ratings_var = ($rat*100)/5;
                                                        ?>
                                        
                                                        <div class="pull-left">
                                                            <div class="star-ratings-sprite"><span style="width:<?php echo $ratings_var; ?>%" class="star-ratings-sprite-rating"></span>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="pull-left">
                                                            {{ __('frontstaticword.NoRating') }}
                                                        </div>
                                                    @endif
                                                </li>
                                                <!-- overall rating -->
                                                @php
                                                $reviews = App\ReviewRating::where('course_id' ,$enrol->courses->id)->get();
                                                @endphp
                                                <?php 
                                                $learn = 0;
                                                $price = 0;
                                                $value = 0;
                                                $sub_total = 0;
                                                $count =  count($reviews);
                                                $onlyrev = array();

                                                $reviewcount = App\ReviewRating::where('course_id', $enrol->courses->id)->where('status',"1")->WhereNotNull('review')->get();

                                                foreach($reviewcount as $review){

                                                    $learn = $review->learn*5;
                                                    $price = $review->price*5;
                                                    $value = $review->value*5;
                                                    $sub_total = $sub_total + $learn + $price + $value;
                                                }

                                                $count = ($count*3) * 5;
                                                 
                                                if($count != "")
                                                {
                                                    $rat = $sub_total/$count;
                                             
                                                    $ratings_var = ($rat*100)/5;
                                           
                                                    $overallrating = ($ratings_var/2)/10;
                                                }
                                                 
                                                ?>

                                                @php
                                                    $reviewsrating = App\ReviewRating::where('course_id', $enrol->courses->id)->first();
                                                @endphp
                                                @if(!empty($reviewsrating))
                                                <li>
                                                    <b>{{ round($overallrating, 1) }}</b>
                                                </li>
                                                @endif

                                                <li>
                                                    (@php
                                                        $data = App\Order::where('course_id', $enrol->courses->id)->get();
                                                        if(count($data)>0){

                                                            echo count($data);
                                                        }
                                                        else{

                                                            echo "0";
                                                        }
                                                    @endphp)
                                                </li> 
                                            </ul>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@else
    <section id="no-result-block" class="no-result-block">
        <div class="container">
            <div class="no-result-courses">{{ __('frontstaticword.whenenroll') }}&nbsp;<a href="{{ url('/') }}"><b>{{ __('frontstaticword.Browse') }}</b></a></div>
        </div>
    </section>
@endif

@endsection
