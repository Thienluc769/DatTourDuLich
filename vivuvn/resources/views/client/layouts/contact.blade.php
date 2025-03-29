@extends('client.parentLayouts.main')
@section('title', 'vivuvn | Liên hệ')
@section('main_content')
@section('content_name', 'Liên Hệ')

<div class="untree_co-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <form class="contact-form" data-aos="fade-up" data-aos-delay="200">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-black" for="fname">Họ</label>
                                <input type="text" class="form-control" id="fname" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="text-black" for="lname">Tên</label>
                                <input type="text" class="form-control" id="lname" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-black" for="email">Email</label>
                        <input type="email" class="form-control" id="email" />
                    </div>

                    <div class="form-group">
                        <label class="text-black" for="message">Tin nhắn</label>
                        <textarea name="" class="form-control" id="message" cols="30" rows="5"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Gửi
                    </button>
                </form>
            </div>
            <div class="col-lg-5 ml-auto">
                <div class="quick-contact-item d-flex align-items-center mb-4">
                    <span class="flaticon-house"></span>
                    <address class="text">
                        475A Điện Biên Phủ, P.25, Q.Bình Thạnh, TP.HCM
                    </address>
                </div>
                <div class="quick-contact-item d-flex align-items-center mb-4">
                    <span class="flaticon-phone-call"></span>
                    <address class="text">0899900998</address>
                </div>
                <div class="quick-contact-item d-flex align-items-center mb-4">
                    <span class="flaticon-mail"></span>
                    <address class="text">vivuvn@gmail.com</address>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="untree_co-section testimonial-section mt-5 bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <h2 class="section-title text-center mb-5">Testimonials</h2>

                <div class="owl-single owl-carousel no-nav">
                    <div class="testimonial mx-auto">
                        <figure class="img-wrap">
                            <img src="assetss/images/person_2.jpg" alt="Image" class="img-fluid" />
                        </figure>
                        <h3 class="name">Adam Aderson</h3>
                        <blockquote>
                            <p>
                                &ldquo;There live the blind texts. Separated they live in
                                Bookmarksgrove right at the coast of the Semantics, a large
                                language ocean.&rdquo;
                            </p>
                        </blockquote>
                    </div>

                    <div class="testimonial mx-auto">
                        <figure class="img-wrap">
                            <img src="assetss/images/person_3.jpg" alt="Image" class="img-fluid" />
                        </figure>
                        <h3 class="name">Lukas Devlin</h3>
                        <blockquote>
                            <p>
                                &ldquo;There live the blind texts. Separated they live in
                                Bookmarksgrove right at the coast of the Semantics, a large
                                language ocean.&rdquo;
                            </p>
                        </blockquote>
                    </div>

                    <div class="testimonial mx-auto">
                        <figure class="img-wrap">
                            <img src="assetss/images/person_4.jpg" alt="Image" class="img-fluid" />
                        </figure>
                        <h3 class="name">Kayla Bryant</h3>
                        <blockquote>
                            <p>
                                &ldquo;There live the blind texts. Separated they live in
                                Bookmarksgrove right at the coast of the Semantics, a large
                                language ocean.&rdquo;
                            </p>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}


@endsection
