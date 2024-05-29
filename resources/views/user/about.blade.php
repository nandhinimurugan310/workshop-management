@extends('layouts.header')
@section('content1')
  <!-- Topbar End -->
    
    
       
    <!-- Navbar End -->

    <!-- Page Header Start -->
    <div
      class="container-fluid page-header py-6 my-1 mt-0 wow fadeIn .page-header"
      data-wow-delay="0.1s"
    >
      <div class="container text-center">
      
        <nav aria-label="breadcrumb animated slideInDown">
          
        </nav>
      </div>
    </div>
    <!-- Page Header End -->

    <!-- About Start -->
    <div class="container-xxl py-4">
      <div class="container">
        <div class="row g-5">
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
            <div
              class="position-relative overflow-hidden ps-5 pt-5 h-100"
              style="min-height: 400px"
            >
              <img
                class="position-absolute w-100 h-100"
                src="{{ asset('assets/img/aboutus.jpeg') }}"
                alt=""
                style="object-fit: cover"
              />
              <img
                class="position-absolute top-0 start-0 bg-white pe-3 pb-3"
                src="{{ asset('assets/img/aboutus2.jpeg') }}"
                alt=""
                style="width: 200px; height: 200px"
              />
            </div>
          </div>
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
            <div class="h-100">
              <h1 class="display-6 mb-4" >
                About Us
              </h1>
              <p style="text-align:justify">
                Sakthi Body Works is one of Chennai's most reputable and renowned body builders. Over the years, We have established ourselves as a reliable provider of high-quality and cost-effective solutions for the transport industry. Our primary objective is to deliver products within the specified deadlines.
              </p>
              <p class="mb-4" style="text-align:justify">
                Allow us to introduce ourselves - We are "Sakthi Body Works", a technically qualified and professionally adept automobile body builder. Proprietorship lies with <b>Mr. A.M. Elangovan</b>,B.E. Our workforce, Equipped with advanced technology and machinery, Has been the cornerstone of our company since its inception.
              </p>
              <p class="mb-4" style="text-align:justify">
                All our products are manufactured in-house to uphold the highest quality standards. We continually embrace new technological advancements in the fabrication process, Ensuring prompt delivery of vehicles without compromising on quality. Our aim is to offer our customers optimal solutions to maximize the profitability of their vehicles.
              </p>
              
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- About End -->




    <!-- Team Start -->
    <div class="container-xxl py-2">
      <div class="container">
        <div class="row g-0 team-items">
          <h1>Infrastructure Facilities</h1>
          <p style="text-align:justify">
            We have excellent infrastructure. Here are some examples of automobile body building works undertaken at our company. Our spacious working area is equipped with a wide range of the latest machinery and specialized hand tools. We ensure meticulous monitoring of work through CCTV surveillance as an added feature. Quality checks are conducted at every stage by our professional technocrats. We specialize in body building for vehicles such as Ashok Leyland, TATA, Swaraj Mazda, Eicher (Canter), Mahindra, Force Mini Dor, and mini auto ape. Our commitment to timely delivery and overall quality has consistently contributed to our growth in key services.
          </p>
          
          <div class="container">
            <header class="my-5">
              <h1>Why Choose Sakthi Body Works?</h1>
            </header>
            <section class="row">
              <div class="col-md-6 mb-4">
                <div class="card h-100 border-primary">
                  <h5 class="card-header text-primary">Perfect Experience</h5>
                  <div class="card-body">
                    <p class="card-text">Our Design & Construction can add value to make our clients a very perfect experience in building residents etc.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-4">
                <div class="card h-100 border-primary">
                  <h5 class="card-header text-primary">Very Competitive Rates</h5>
                  <div class="card-body">
                    <p class="card-text">We offer well designed Residents Apartment Individual Villas at very competitive price when compared to other similar service providers.</p>
                  </div>
                </div>
              </div>
            </section>
            <section class="row">
              <div class="col-md-6 mb-4">
                <div class="card h-100 border-primary">
                  <h5 class="card-header text-primary">Satisfaction Guarantee</h5>
                  <div class="card-body">
                    <p class="card-text">Our Customer satisfaction enables our construction companies to differentiate themselves from their competitors.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-4">
                <div class="card h-100 border-primary">
                  <h5 class="card-header text-primary">Honest and Dependable</h5>
                  <div class="card-body">
                    <p class="card-text">We honestly build houses with superior quality with any extra cost because we purely depend on our customers.</p>
                  </div>
                </div>
              </div>
            </section>
            <section class="row">
              <div class="col-md-6 mb-4">
                <div class="card h-100 border-primary">
                  <h5 class="card-header text-primary">Safety & Reliability</h5>
                  <div class="card-body">
                    <p class="card-text">Safety is our first concern in building works and we guarantee that our finished building lifetime is for many years.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mb-4">
                <div class="card h-100 border-primary">
                  <h5 class="card-header text-primary">Superior Quality</h5>
                  <div class="card-body">
                    <p class="card-text">Sakthi Body Works is an extremely quality conscious Body Works. Our benchmarks are set high and we strive to achieve the highest level of quality in all.</p>
                  </div>
                </div>
              </div>
            </section>
          
        </div>
      </div>
    </div>
    <!-- Team End -->




    <!-- Copyright Start -->
 
    <!-- Copyright End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"
      ><i class="bi bi-arrow-up"></i
    ></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
  </body>
</html>
@endsection