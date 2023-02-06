@extends('layouts.app')

@section('content')
    <!-- fashion section start -->
    <div class="fashion_section">
        <div class="container">
            <h1 class="fashion_taital mt-5">
                “” WE STRIVE FOR TIMELY DELIVERY WITH EXCELLENT FLORAL ARRANGEMENTS “”
            </h1>
            <div class="fashion_section_2">
                <div class="row">
                    <div class="col-12 text-center">
                        <p>                        We are a well-established Fresh flower & Florist shop in Cambodia since 1998.
                            With a retail shop in Phnom Penh.
                            We are also a member of INTERFLORA. Serving the worldwide network of
                            florists for INTERFLORA.</p>
                    </div>
                </div>
                <div class="row">
                    @for ($i = 1; $i <= 3; $i++)
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body">
                                    <img src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/gettyimages-1250978022-612x612-1612205237.jpg"
                                        width="300" height="300" alt="">
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
    <!-- fashion section end -->
@endsection
