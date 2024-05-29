@extends('layouts.header')
@section('content1')



    <!-- Carousel Start -->
    <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{asset('assets/img/banner1.jpg')}}" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7">
                                    <h1 class="display-2 text-light mb-5 animated slideInDown"> Expert Auto Body
                                        Building & Repair</h1>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{asset('assets/img/banner2.jpg')}}" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7">
                                    <h1 class="display-2 text-light mb-5 animated slideInDown"> We Restore and Reinforce
                                        Your Vehicle</h1>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{asset('assets/img/banner3.jpg')}}" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7">
                                    <h1 class="display-2 text-light mb-5 animated slideInDown">We Breathe New Life into
                                        Your Vehicle</h1>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Facts Start -->
    <div class="container-fluid facts py-5 pt-lg-0">
        <div class="container py-5 pt-lg-0">
            <div class="row gx-0">
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <div class="bg-white shadow d-flex align-items-center h-100 p-4" style="min-height: 150px;">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square bg-primary">
                                <i class="fa fa-car text-white"></i>
                            </div>
                            <div class="ps-4">
                                <h5>Year of Establishment</h5>
                                <span>1998</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                    <div class="bg-white shadow d-flex align-items-center h-100 p-4" style="min-height: 150px;">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square bg-primary">
                                <i class="fa fa-users text-white"></i>
                            </div>
                            <div class="ps-4">
                                <h5>Total Number of Employees</h5>
                                <span>26 to 50 People</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="bg-white shadow d-flex align-items-center h-100 p-4" style="min-height: 150px;">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square bg-primary">
                                <i class="fa fa-file-alt text-white"></i>
                            </div>
                            <div class="ps-4">
                                <h5>Legal Status of Firm</h5>
                                <span>Individual - Proprietor</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts End -->


    <!-- About Start -->
    <div class="container-xxl py-6">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative overflow-hidden ps-5 pt-5 h-100" style="min-height: 400px;">
                        <img class="position-absolute w-100 h-100" src="{{asset('assets/img/aboutus.jpeg')}}" alt=""
                            style="object-fit: cover;">
                        <img class="position-absolute top-0 start-0 bg-white pe-3 pb-3" src="{{asset('assets/img/aboutus2.jpeg')}}" alt=""
                            style="width: 200px; height: 200px;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">

                        <h1 class="display-6 mb-4">About Us</h1>
                        <p style="text-align:justify">At Sakthi Body Works, we boast a spacious facility equipped with cutting-edge machinery and specialized tools dedicated to delivering top-notch vehicle body building services. Our commitment to excellence is evident at every stage, with CCTV monitoring and professional inspections ensuring the highest quality standards are met. Catering to a diverse range of automobiles, including Ashok Leyland, TATA, Swaraj Mazda, Eicher, Mahindra, Force Mini Dor, and mini auto rickshaws, we take pride in our ability to meet deadlines while maintaining exceptional workmanship.</p>

                        <div class="row g-4">
                            <div class="col-sm-6">
                                <a class="btn btn-primary py-3 px-5" href="{{ route('user.about') }}">Read More</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Gallery starts -->
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h6 class="text-primary text-uppercase mb-2">Gallery</h6>
            <h1 class="display-6 mb-4">Explore Our Work!</h1>
        </div>
        <div class="container">
            <div class="row">
              <div class="col">
                <a href="{{ route('user.gallery') }}"><div class="image-container">
                    <img src="{{asset('assets/img/g8.jpeg')}}" alt="Image 1">
                    <img src="{{asset('assets/img/g2.jpeg')}}" alt="Image 2">
                    <img src="{{asset('assets/img/g3.jpeg')}}" alt="Image 3">
                    <img src="{{asset('assets/img/g4.jpeg')}}" alt="Image 4">
                    <img src="{{asset('assets/img/g5.jpeg')}}" alt="Image 5">
                    <img src="{{asset('assets/img/g6.jpeg')}}" alt="Image 6">
                    <img src="{{asset('assets/img/g7.jpeg')}}" alt="Image 6">
                    <img src="{{asset('assets/img/g8.jpeg')}}" alt="Image 6">
                  </div></a>
              </div>
            </div>
          </div>
          
         
       
    </div>
       



        <!-- Gallery end -->









        <!-- Testimonial Start -->
        <div class="container-xxl py-6">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <h6 class="text-primary text-uppercase mb-2">Testimonial</h6>
                    <h1 class="display-6 mb-4">What Our Clients Say!</h1>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="owl-carousel testimonial-carousel">
                            <div class="testimonial-item text-center">
                                <div class="position-relative mb-5">
                                    <img class="img-fluid rounded-circle mx-auto" src="{{ asset('assets/img/testimonial-1.jpg')}}" alt="">
                                    <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white rounded-circle"
                                        style="width: 60px; height: 60px;">
                                        <i class="fa fa-quote-left fa-2x text-primary"></i>
                                    </div>
                                </div>
                                <p class="fs-4">Dolores sed duo clita tempor justo dolor et stet lorem kasd labore
                                    dolore lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam
                                    tempor erat.</p>
                                <hr class="w-25 mx-auto">
                                <h5>Client Name</h5>
                                <span>Profession</span>
                            </div>
                            <div class="testimonial-item text-center">
                                <div class="position-relative mb-5">
                                    <img class="img-fluid rounded-circle mx-auto" src="{{ asset('assets/img/testimonial-2.jpg') }}" alt="">
                                    <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white rounded-circle"
                                        style="width: 60px; height: 60px;">
                                        <i class="fa fa-quote-left fa-2x text-primary"></i>
                                    </div>
                                </div>
                                <p class="fs-4">Dolores sed duo clita tempor justo dolor et stet lorem kasd labore
                                    dolore lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam
                                    tempor erat.</p>
                                <hr class="w-25 mx-auto">
                                <h5>Client Name</h5>
                                <span>Profession</span>
                            </div>
                            <div class="testimonial-item text-center">
                                <div class="position-relative mb-5">
                                    <img class="img-fluid rounded-circle mx-auto" src="{{ asset('assets/img/testimonial-3.jpg') }}" alt="">
                                    <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white rounded-circle"
                                        style="width: 60px; height: 60px;">
                                        <i class="fa fa-quote-left fa-2x text-primary"></i>
                                    </div>
                                </div>
                                <p class="fs-4">Dolores sed duo clita tempor justo dolor et stet lorem kasd labore
                                    dolore lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam
                                    tempor erat.</p>
                                <hr class="w-25 mx-auto">
                                <h5>Client Name</h5>
                                <span>Profession</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->






        <!-- Copyright Start -->
       
        <!-- Copyright End -->


        <!-- Back to Top -->
    


@endsection