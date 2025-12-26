<div>

    <!-- Navbar Start -->
    <div class="container-fluid bg-secondary px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="nav-bar">
            <nav class="navbar navbar-expand-lg bg-primary navbar-dark px-4 py-lg-0">
                <h4 class="d-lg-none m-0">Menu</h4>
                <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav me-auto">
                        <div class=" text-center text-lg-start">
                            <a href="{{ route ('LandingPage.index') }}">
                                <h2 class="text-success mt-3 me-3">Sekolah Aman</h2>
                            </a>
                        </div>
                        <a href="{{ route ('LandingPage.index') }}" class="nav-item nav-link">Beranda</a>
                        <a href="#" class="nav-item nav-link">Tentang</a>
                        <a href="#" class="nav-item nav-link">Kontak</a>
                        <a href="{{ route ('LandingPage.cek_status') }}" class="nav-item nav-link">Cek Status Pengaduan</a>
                    </div>
                    <div >
                       <a
                            href="javascript:void(0)"
                            onclick="openChat()"
                            class="btn btn-dark d-flex align-items-center gap-2 px-3"
                            title="Pengaduan">
                            <i class="fa-solid fa-comments"></i>
                            <span class="d-inline d-lg-none">
                                Mulai Pengaduan
                            </span>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

</div>
