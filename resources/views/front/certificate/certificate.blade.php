@extends('theme.master')
@section('title', "Course Completion Certificate")

@section('content')
@include('admin.message')

<section id="cirtificate" class="course-cirtificate">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="cirtificate-border-one text-center">
                    <div class="cirtificate-border-two">
                       <div class="cirtificate-heading" style="">Certificate of Completion</div>
                       <p class="cirtificate-detail" style="font-size:30px">This is to certify that <b>{{ Auth::User()['fname'] }}</b> successfully completed <b>{{ $course['title'] }}</b> online course on <br><span style="font-size:25px">{{ date('jS F Y', strtotime($order['created_at'])) }}</span></p>

                       <span class="cirtificate-instructor">{{ ($course->user['fname']) }} {{ ($course->user['lname']) }}</span>
                       <br>
                       <span class="cirtificate-one">{{ ($course->user['fname']) }} {{ ($course->user['lname']) }}, Instructor</span>
                       <br>
                       <span>&</span>
                       <div class="cirtificate-logo">
                        @if($gsetting['logo_type'] == 'L')
                            <img src="{{ asset('images/logo/'.$gsetting['logo']) }}" class="img-fluid" alt="logo">
                        @else()
                            <a href="{{ url('/') }}"><b><div class="logotext">{{ $gsetting['project_title'] }}</div></b></a>
                        @endif
                      </div>
                      
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <h4>Certificate Recipient:</h4>
                <div class="recipient-block">
                    <div class="row">
                        <div class="col-md-4">

                            @if(Auth::User()->user_img != null || Auth::User()->user_img !='')
                                <img src="{{ asset('images/user_img/'.Auth::User()->user_img) }}" alt="user" class="img-fluid img-circle">
                            @else
                                <img src="{{ asset('images/default/user.jpg')}}" alt="user" class="img-fluid img-circle">
                            @endif
                        </div>
                        <div class="col-md-8">
                            {{ Auth::User()->fname }}
                        </div>
                    </div>
                </div>

                <h4>About the Course:</h4>
                <div class="view-block btm-20">
                    <div class="view-img">
                        @if($course['preview_image'] !== NULL && $course['preview_image'] !== '')
                            <a href="{{ route('user.course.show',['id' => $course->id, 'slug' => $course->slug ]) }}"><img src="{{ asset('images/course/'.$course['preview_image']) }}" alt="course" class="img-fluid"></a>
                        @else
                            <a href="{{ route('user.course.show',['id' => $course->id, 'slug' => $course->slug ]) }}"><img src="{{ Avatar::create($course->title)->toBase64() }}" alt="course" class="img-fluid"></a>
                        @endif
                    </div>
                    <div class="view-dtl">
                        <div class="view-heading btm-10"><a href="{{ route('user.course.show',['id' => $course->id, 'slug' => $course->slug ]) }}">{{ str_limit($course->title, $limit = 30, $end = '...') }}</a></div>
                        <p class="btm-10"><a herf="#">by {{ $course->user['fname'] }}</a></p>
                        <div class="rating">
                            <ul>
                                <li>
                                    <?php 
                                    $learn = 0;
                                    $price = 0;
                                    $value = 0;
                                    $sub_total = 0;
                                    $sub_total = 0;
                                    $reviews = App\ReviewRating::where('course_id',$course->id)->get();
                                    ?> 
                                    @if(!empty($reviews[0]))
                                    <?php
                                    $count =  App\ReviewRating::where('course_id',$course->id)->count();

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
                                        <div class="pull-left">{{ __('frontstaticword.NoRating') }}</div>
                                    @endif
                                </li>
                                <!-- overall rating-->
                                <?php 
                                $learn = 0;
                                $price = 0;
                                $value = 0;
                                $sub_total = 0;
                                $count =  count($reviews);
                                $onlyrev = array();

                                $reviewcount = App\ReviewRating::where('course_id', $course->id)->WhereNotNull('review')->get();

                                foreach($reviews as $review){

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
                                    $reviewsrating = App\ReviewRating::where('course_id', $course->id)->first();
                                @endphp
                                @if(!empty($reviewsrating))
                                <li>
                                    <b>{{ round($overallrating, 1) }}</b>
                                </li>
                                @endif
                              <li>({{ $course->order->count() }})</li> 
                            </ul>
                        </div>
                        @if( $course->type == 1)
                            <div class="rate text-right">
                                <ul>
                                    @php
                                        $currency = App\Currency::first();
                                    @endphp

                                    @if($course->discount_price == !NULL)

                                        <li><a><b><i class="{{ $currency->icon }}"></i>{{ $course->discount_price }}</b></a></li>&nbsp;
                                        <li><a><b><strike><i class="{{ $currency->icon }}"></i>{{ $course->price }}</strike></b></a></li>
                                        
                                    @else
                                        <li><a><b><i class="{{ $currency->icon }}"></i>{{ $course->price }}</b></a></li>
                                    @endif
                                </ul>
                            </div>
                        @else
                            <div class="rate text-right">
                                <ul>
                                    <li><a><b>{{ __('frontstaticword.Free') }}</b></a></li>
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="download-btn btm-20">
                    <a href="{{route('cirtificate.download',$course->id)}}" target="_blank"  class="btn btn-secondary">Certificate Download</a>
                </div>
                <p><a href="#" data-toggle="modal" data-target="#myModalCirtificate" title="report">Update your certificate</a> with your correct name.</p>
                <div class="modal fade" id="myModalCirtificate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Update Your Certificate</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="box box-primary">
                          <div class="panel panel-sum">
                            <div class="modal-body">
                                Confirm your name is <b>{{ Auth::User()->fname }}</b>
                                <br>

                                Incorrect? <a href="{{route('profile.show',Auth::User()->id)}}">Update your profile name</a>.
                           
                            </div>
                          </div>
                        </div>
                      </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</section>

@endsection