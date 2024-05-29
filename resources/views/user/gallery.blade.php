@extends('layouts.header')
@section('content1')
<style>
    .courses-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Adjust the background color and opacity as needed */
    opacity: 0; /* Initially hidden */
    transition: opacity 0.3s ease;
}

.courses-overlay:hover {
    opacity: 1; /* Show on hover */
}

.card-name {
    position: absolute;
    bottom: 10px;
    left: 10px;
    color: white;
    font-size: 18px;
    font-weight: bold;
}

</style>

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-6 my-1 mt-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center">           
            <nav aria-label="breadcrumb animated slideInDown">
                   <!-- Bread crum-->
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <h1 class="display-6 mb-3 mt-3 text-center" >
        Explore Our Gallery
      </h1>


    <!-- Courses Start -->
    <div class="container-xxl py-4">
        <div class="container">
           
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative mt-auto">
                        <img class="img-fluid" src="{{ asset('assets/img/g8.jpeg') }}" alt="">
                        <div class="courses-overlay">
                            <div class="card-name">Card Name</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative mt-auto">
                        <img class="img-fluid" src="{{ asset('assets/img/g2.jpeg') }}" alt="">
                        <div class="courses-overlay">    
                            <div class="card-name">Card Name</div>                       
                        </div>
                    </div>                  
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative mt-auto">
                        <img class="img-fluid" src="{{ asset('assets/img/g3.jpeg') }}" alt="">
                        <div class="courses-overlay">   
                            <div class="card-name">Card Name</div>                        
                        </div>
                    </div>                  
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative mt-auto">
                        <img class="img-fluid" src="{{ asset('assets/img/g4.jpeg') }}" alt="">
                        <div class="courses-overlay">    
                            <div class="card-name">Card Name</div>                       
                        </div>
                    </div>                  
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative mt-auto">
                        <img class="img-fluid" src="{{ asset('assets/img/g5.jpeg') }}" alt="">
                        <div class="courses-overlay">      
                            <div class="card-name">Card Name</div>                     
                        </div>
                    </div>                  
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative mt-auto">
                        <img class="img-fluid" src="{{ asset('assets/img/g6.jpeg') }}" alt="">
                        <div class="courses-overlay">   
                            <div class="card-name">Card Name</div>                        
                        </div>
                    </div>                  
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative mt-auto">
                        <img class="img-fluid" src="{{ asset('assets/img/g7.jpeg') }}" alt="">
                        <div class="courses-overlay">     
                            <div class="card-name">Card Name</div>                      
                        </div>
                    </div>                  
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative mt-auto">
                        <img class="img-fluid" src="{{ asset('assets/img/g8.jpeg') }}" alt="">
                        <div class="courses-overlay">         
                            <div class="card-name">Card Name</div>                  
                        </div>
                    </div>                  
                </div>
                
            </div>
        </div>
    </div>
    <!-- Courses End -->


   

    


    @endsection