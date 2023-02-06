@extends('layouts.app')

@section('content')
    <!-- fashion section start -->
    <div class="fashion_section">
        <div class="container">
            <div class="fashion_section_2">
                <div class="row">
                    <div class="col-6 text-center">
                        <h3>Contact</h3>
                        <hr class="bg-dark">
                        <p>Phone in Phnom Penh:</p>
                        <p>0969153299 / 0969153288</p>
                        <hr class="my-5 bg-dark">
                    </div>
                    <div class="col-6 text-center">
                        <h3>Address</h3>
                        <hr class="bg-dark">
                        <p>Address: BP 511, Phum Tropeang</p>
                        <p>Chhuk Sangtak, Street 371, Phnom Penh</p>
                        <hr class="my-5 bg-dark">
                    </div>
                </div>
                <div class="row">
                    @for ($i = 1; $i <= 2; $i++)
                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <img src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/gettyimages-1250978022-612x612-1612205237.jpg">
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
