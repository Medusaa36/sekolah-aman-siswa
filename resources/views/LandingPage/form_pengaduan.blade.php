@extends('Components.Layouts.app')

@section('content')
<div class="pengaduan-page">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Form Pengaduan Bullying</h5>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('pengaduan.store') }}"
                              method="POST"
                              enctype="multipart/form-data"
                              id="formPengaduan">
                            @csrf

                            {{-- ================= IDENTITAS ================= --}}
                            <div class="form-group mb-3">
                                <label>Nama Lengkap</label>
                                <input type="text"
                                       class="form-control"
                                       name="nama_lengkap"
                                       value="{{ old('nama_lengkap') }}"
                                       required>
                            </div>

                            <div class="form-group mb-3">
                                <label>Kelas</label>
                                <input type="text"
                                       class="form-control"
                                       name="kelas"
                                       value="{{ old('kelas') }}"
                                       required>
                            </div>

                            <div class="form-group mb-3">
                                <label>Sekolah</label>
                                <select id="sekolahSelect"
                                        class="form-control"
                                        name="sekolah"
                                        required>
                                    <option value="">Memuat data sekolah...</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label>Email</label>
                                <input type="email"
                                       class="form-control"
                                       name="email"
                                       value="{{ old('email') }}"
                                       required>
                            </div>

                            <div class="form-group mb-3">
                                <label>No. Whatsapp</label>
                                <input type="text"
                                       class="form-control"
                                       name="whatsapp"
                                       value="{{ old('whatsapp') }}"
                                       required>
                            </div>

                            {{-- ================= LAPORAN ================= --}}
                            <div class="form-group mb-3">
                                <label>Lokasi Kejadian</label>
                                <input type="text"
                                       class="form-control"
                                       name="lokasi"
                                       value="{{ old('lokasi') }}"
                                       required>
                            </div>

                            <div class="form-group mb-3">
                                <label>Kategori Bullying</label>
                                <select id="kategoriSelect"
                                        class="form-control"
                                        name="kategori"
                                        required>
                                    <option value="">Memuat data kategori...</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label>Deskripsi Kejadian</label>
                                <textarea class="form-control"
                                          rows="4"
                                          name="deskripsi_kejadian"
                                          required>{{ old('deskripsi_kejadian') }}</textarea>
                            </div>

                            {{-- ================= UPLOAD BUKTI ================= --}}
                            <div class="form-group mb-3">
                                <label>Upload Bukti (Opsional)</label>
                                <small class="text-muted d-block mb-1">
                                    Format gambar (JPG / PNG), max 10MB
                                </small>
                                <input type="file"
                                       class="form-control"
                                       name="bukti"
                                       accept="image/*">
                            </div>

                            {{-- ================= SUBMIT ================= --}}
                            <button type="submit" class="btn btn-primary w-100">
                                Kirim Laporan
                            </button>

                            <div class="text-muted text-center mt-3">
                                Laporan akan ditinjau oleh pihak berwenang.
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

{{-- ================= SWEETALERT ERROR ================= --}}
@if($errors->any())
<script>
document.addEventListener('DOMContentLoaded', function () {
    Swal.fire({
        icon: 'error',
        title: 'Gagal!',
        html: `{!! implode('<br>', $errors->all()) !!}`
    });
});
</script>
@endif

{{-- ================= API KATEGORI ================= --}}
<script>
document.addEventListener("DOMContentLoaded", async () => {
    const kategoriSelect = document.getElementById("kategoriSelect");

    try {
        const response = await fetch("/api/kategori");
        const result = await response.json();

        kategoriSelect.innerHTML = '<option value="">-- Pilih Kategori --</option>';

        const data = result?.data?.data ?? [];

        data.forEach(item => {
            const option = document.createElement("option");
            option.value = item.id;
            option.textContent = item.name;
            kategoriSelect.appendChild(option);
        });

    } catch (error) {
        kategoriSelect.innerHTML = '<option value="">Gagal memuat kategori</option>';
    }
});
</script>

{{-- ================= API SEKOLAH ================= --}}
<script>
document.addEventListener("DOMContentLoaded", async () => {
    const sekolahSelect = document.getElementById("sekolahSelect");

    try {
        const response = await fetch("/api/sekolah");
        const result = await response.json();

        sekolahSelect.innerHTML = '<option value="">-- Pilih Sekolah --</option>';

        const data = result?.data?.data ?? [];

        data.forEach(item => {
            const option = document.createElement("option");
            option.value = item.id;
            option.textContent = item.name;
            sekolahSelect.appendChild(option);
        });

    } catch (error) {
        sekolahSelect.innerHTML = '<option value="">Gagal memuat sekolah</option>';
    }
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('formPengaduan');

    if (!form) return;

    form.addEventListener('submit', function () {
        Swal.fire({
            title: 'Mengirim Laporan...',
            html: 'Mohon tunggu, laporan sedang diproses',
            allowOutsideClick: false,
            allowEscapeKey: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });
    });
});
</script>
@endsection
