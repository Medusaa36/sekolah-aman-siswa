@extends ('Components.Layouts.app')

@section('content')

    <!-- Carousel Start -->
    <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="owl-carousel header-carousel py-5">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="carousel-text">
                            <h1 class="display-3 text-uppercase mb-3">Sekolah Aman dari Bullying</h1>
                            <p class="fs-5 mb-5">Speak up, stand strong, stop bullying!  
                                Mari bersama menciptakan lingkungan sekolah yang aman, nyaman,
                                dan bebas dari segala bentuk perundungan.  
                                Jangan takut untuk melapor dan saling melindungi.</p>
                        </div>
                        <div class="d-flex">
                            <a class="btn btn-danger py-3 px-4 me-3" href="{{ route ('LandingPage.form_pengaduan') }}">Ajukan Pengaduan</a>
                            <a class="btn btn-secondary py-3 px-4" href="{{ route ('LandingPage.cek_status') }}">Cek Status Pengaduan</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="carousel-img">
                            <img class="w-100" src="{{ asset('Charitize/img/bullying1.png')}}" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="carousel-text">
                            <h1 class="display-4 text-uppercase mb-3">Sekolah Damai, Stop Perundungan</h1>
                            <p class="fs-5 mb-5">Belajar saling menghargai dimulai dari kepedulian dan empati.
                                Bersama kita wujudkan lingkungan sekolah yang aman, ramah,
                                dan bebas dari segala bentuk perundungan.</p>
                        </div>
                        <div class="d-flex">
                            <a class="btn btn-danger py-3 px-4 me-3" href="{{ route ('LandingPage.form_pengaduan') }}">Ajukan Pengaduan</a>
                            <a class="btn btn-secondary py-3 px-4" href="{{ route ('LandingPage.cek_status') }}">Cek Status Pengaduan</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="carousel-img">
                            <img class="w-100" src="{{ asset('Charitize/img/bullying3.png')}}" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="carousel-text">
                            <h1 class="display-4 text-uppercase mb-3">Bersama Ciptakan Sekolah Tanpa Bullying</h1>
                            <p class="fs-5 mb-5">Lingkungan belajar yang sehat tumbuh dari sikap saling menghormati
                                dan kepedulian antar sesama.
                                Mari wujudkan sekolah yang nyaman, inklusif,
                                dan bebas dari tindakan perundungan.</p>
                        </div>
                        <div class="d-flex">
                            <a class="btn btn-danger py-3 px-4 me-3" href="{{ route ('LandingPage.form_pengaduan') }}">Ajukan Pengaduan</a>
                            <a class="btn btn-secondary py-3 px-4" href="{{ route ('LandingPage.cek_status') }}">Cek Status Pengaduan</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="carousel-img">
                            <img class="w-100" src="{{ asset('Charitize/img/bullying4.png')}}" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->

        <!-- Video Start -->
    <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-11">
                    <div class="h-100 py-5 d-flex align-items-center">
                        <button
                            type="button"
                            class="btn-play"
                            data-bs-toggle="modal"
                            data-bs-target="#videoModal"
                            data-src="https://www.youtube.com/embed/am3sGO12f6Q?autoplay=1&rel=0">
                            <span></span>
                        </button>
                        <h3 class="ms-5 mb-0">Apa itu Bullying (Perundungan)? Apa saja bentuk bullying?
                        </h3>
                    </div>
                </div>
                <div class="d-none d-lg-block col-lg-1">
                    <div class="h-100 w-100 bg-secondary d-flex align-items-center justify-content-center">
                        <span class="text-white" style="transform: rotate(-90deg);">Stop Bullying</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video End -->
    
    <!-- Video Modal Start -->
    <div class="modal fade" id="videoModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-body p-0">
                    <div class="ratio ratio-16x9">
                        <iframe
                            id="video"
                            class="w-100 h-100"
                            src=""
                            frameborder="0"
                            allow="autoplay; encrypted-media"
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Video Modal End -->
    @endsection
    
