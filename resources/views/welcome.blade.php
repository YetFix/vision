@extends('layouts.app')
@push('css')
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <!-- Libraries Stylesheet -->
  <link href="{{asset('frontend/lib/animate/animate.min.css')}}" rel="stylesheet">
 <!-- Libraries Stylesheet -->

    <link href="{{asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <!-- Customized Bootstrap Stylesheet -->
  <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">
@endpush

        <br>
        <br>
        <br>
        <br>
        <div style="width: 100%;height:100%">
            <div class="portfolio-details-container">
                <div class="owl-carousel portfolio-details-carousel">
                    @if(isset($sliders))
                    @foreach ($sliders as $slider )
                    <img src="{{URL::asset('slidersimg')}}/{{$slider->image}}" class="img-fluid" style="height:600px;"  alt="">
                    @endforeach
                    @endif
                </div>
            </div>
        </div>

@section('content')



  
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-4" data-aos="zoom-out" data-aos-delay="100">
                        <img src="{{asset('assets/img/about.jpg')}}" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-8 pt-lg-0 content d-flex flex-column justify-content-center"
                        data-aos="fade-up" data-aos-delay="100">
                        <h3>History and Growth</h3>
                       <p><b>Adova Pharmaceuticals Limited</b> is the trend setter in different business sectors in Bangladesh. In future Adova will one of the leading group of companies in the country which includes business of health care, pharmaceuticals, nutrition, financial etc. However the core of Adova Company lies in health care services. 4-5 years back there was no comprehensive treatment facilities in the country. It was very difficult to have the medicine for a distressed patients from a remote area in Bangladesh.
                        The lack of quality treatment and the sufferings of the patients inspired the visionary leader Md. Labu Mia to set a new trend in treatment for animal husbandry. As a result Adova Pharmaceuticals Limited was established with the belief that a cure is the result of an accurate diagnosis. At that time there was not much option for animal husbandry. Adova Pharmaceuticals Limited unfolded a new horizon of animal treatment for veterinary sectors.
                        </p>
                    </div>
                </div>

               
            </div>
      
            <div class="container-fluid py-5">
                <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
                    <span class="bg-secondary pr-3">UPCOMING PRODUCTS</span></h2>
                <div class="row px-xl-5">
                    <div class="col">
                        <div class="owl-carousel related-carousel">
                            @foreach($uproducts as $key=>$product)
                            <div class="product-item bg-light" onclick="location.href='/f/products/{{$product->id}}';" style="cursor:pointer;">
                                <?php  $property_images = json_decode($product->images);?>
                                <div class="product-img position-relative overflow-hidden">
                                <img src="{{ asset('/product_images/'. $property_images[0]) }}" class="img-fluid" style="height:300px;" alt="">  
                                    
                                </div>
                                <div class="text-center py-4">
                                    <a class="h6 text-decoration-none text-truncate" href="">{{$product->name}}</a>
                                
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                </div>
           

        <!-- ======= Counts Section ======= -->
       
            <div class="container-fluid py-5">
            <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
                <span class="bg-secondary pr-3">RECENTLY SHIPPED ITEMS</span></h2>
            <div class="row px-xl-5">
                <div class="col">
                    <div class="owl-carousel related-carousel">
                        @foreach($products as $key=>$product)
                        <div class="product-item bg-light" onclick="location.href='/f/products/{{$product->id}}';" style="cursor:pointer;">
                            <?php  $property_images = json_decode($product->images);?>
                            <div class="product-img position-relative overflow-hidden">
                            <img src="{{ asset('/product_images/'. $property_images[0]) }}" class="img-fluid" style="height:300px;" alt="">  
                                
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href="">{{$product->name}}</a>
                            
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            </div>
       

      
            <div class="container-fluid py-5">
                <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
                <span class="bg-secondary pr-3">MANUFACTURING SECTORS</span></h2>
                <div class="row px-xl-5">
                    <div class="col">
                        <div class="owl-carousel related-carousel">
                            @foreach($categories as $key=>$category)
                            <div class="product-item bg-light" onclick="location.href='/products/category/{{$category->id}}';" style="cursor:pointer;">
                               
                                <div class="product-img position-relative overflow-hidden">
                                
                                <img src="{{URL::asset('categoriesimg')}}/{{$category->image}}"  class="img-fluid" style="height:300px;" alt=""/>
                                </div>
                                <div class="text-center py-4">
                                    <a class="h6 text-decoration-none text-truncate" href="">{{$category->name}}</a>
                                    
                                
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
      


   

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Contact</h2>
                    <h3><span>Contact Us</span></h3>

                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-6">
                        <div class="info-box mb-4">
                            <i class="bx bx-map"></i>
                            <h3>Our Address</h3>
                            <p>105, Boro Rangamatia,Durgapur,Asulia Dhaka, Banglaesh</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="info-box  mb-4">
                            <i class="bx bx-envelope"></i>
                            <h3>Email Us</h3>
                            <p> adovapharma.bd16@gmail.com</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="info-box  mb-4">
                            <i class="bx bx-phone-call"></i>
                            <h3>Call Us</h3>
                            <p>+88 01812268837</p>
                        </div>
                    </div>

                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">

                    <div class="col-lg-6 ">
                        <iframe class="mb-4 mb-lg-0"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3647.4929043772927!2d90.300804!3d23.907594!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c31b2f7c9c6d%3A0x9668b0389c17f031!2sAdova%20Pharmaceuticals%20Limited!5e0!3m2!1sen!2sbd!4v1653906436633!5m2!1sen!2sbd"
                            frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
                    </div>

                    <div class="col-lg-6">
                        <form action="{{route('contact')}}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="col form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Your Name" data-rule="minlen:4"
                                        data-msg="Please enter at least 4 chars" />
                                    <div class="validate"></div>
                                </div>
                                <div class="col form-group">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email" data-rule="email"
                                        data-msg="Please enter a valid email" />
                                    <div class="validate"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="mobile" id="subject"
                                    placeholder="Your Contact Number" required />
                                <div class="validate"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject"
                                    placeholder="Subject" required />
                                <div class="validate"></div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" data-rule="required"
                                    data-msg="Please write something for us" placeholder="Message"></textarea>
                                <div class="validate"></div>
                            </div>
                            <div class="text-center"><button type="submit" class="btn btn-primary">Send Message</button>
                            </div>
                        </form>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->
@endsection
@push('js')
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('frontend/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('frontend/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <!-- Template Javascript -->
    <script src="{{asset('frontend/js/main.js')}}"></script>
@endpush