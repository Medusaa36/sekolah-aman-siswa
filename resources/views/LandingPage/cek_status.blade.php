@extends('Components.Layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white text-center">
                    <h5 class="mb-0">
                        <i class="bi bi-ticket-perforated"></i> Cek Status Pengaduan
                    </h5>
                </div>

                <div class="card-body">
                    <form method="GET" action="{{ route('LandingPage.cek_status') }}">
                        <div class="mb-3 text-center">
                            <label class="form-label">Kode Tiket</label>
                            <input type="text"
                                   name="ticket_id"
                                   value="{{ $ticketId }}"
                                   class="form-control text-center"
                                   placeholder="Masukkan kode tiket"
                                   required>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('LandingPage.cek_status') }}"
                               class="btn btn-secondary">
                                Reset
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Cari Tiket
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            @if($error)
            <div class="alert alert-danger text-center">
                {!! $error !!}
            </div>
            @endif

            @if($laporan)

            @php
                $statusName = strtolower($laporan['status']['name'] ?? '');

                $statusMap = [
                    'sedang diproses'        => 50,
                    'pemanggilan orang tua'  => 75,
                    'selesai'                => 100,
                ];

                $isRejected = str_contains($statusName, 'tolak');
                $progress = $statusMap[$statusName] ?? 25;
            @endphp

            @if($isRejected)
                <div class="card shadow-sm mb-4 border-danger">
                    <div class="card-body text-center">
                        <h5 class="text-danger mb-2">❌ Laporan Ditolak</h5>
                        <p class="mb-0">
                            {{ $laporan['pesan_balasan'] ?? 'Laporan tidak dapat diproses.' }}
                        </p>
                    </div>
                </div>
            @else
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h6 class="mb-3">
                            <i class="bi bi-activity"></i> Status Pengaduan
                        </h6>

                        <div class="progress mb-3" style="height:24px">
                            <div class="progress-bar progress-bar-striped progress-bar-animated
                                {{ $progress == 100 ? 'bg-success' : 'bg-warning' }}"
                                style="width: {{ $progress }}%">
                                {{ $laporan['status']['name'] }}
                            </div>
                        </div>

                        <div class="d-flex justify-content-between small">
                            <span class="{{ $progress >= 25 ? 'fw-bold text-success' : '' }}">
                                Laporan Diterima
                            </span>
                            <span class="{{ $progress >= 50 ? 'fw-bold text-success' : '' }}">
                                Sedang diproses
                            </span>
                            <span class="{{ $progress >= 75 ? 'fw-bold text-success' : '' }}">
                                Pemanggilan orang tua
                            </span>
                            <span class="{{ $progress >= 100 ? 'fw-bold text-success' : 'text-muted' }}">
                                Selesai / Ditutup
                            </span>
                        </div>
                    </div>
                </div>
            @endif

            @if(!$isRejected)
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-light">
                    <strong>
                        <i class="bi bi-chat-left-text"></i> Pesan Balasan
                    </strong>
                </div>
                <div class="card-body">
                    <div class="alert alert-info mb-0 text-center">
                        {{ 
                            empty($laporan['pesan_balasan']) || trim($laporan['pesan_balasan']) === ''
                                ? 'Belum ada balasan dari Guru BK, Harap di tunggu.'
                                : $laporan['pesan_balasan']
                        }}
                    </div>
                </div>
            </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-header bg-light">
                    <strong>Detail Pengaduan</strong>
                </div>

                <div class="card-body">
                    <table class="table table-sm table-borderless">
                        <tr>
                            <td width="35%">Kode Tiket</td>
                            <td>: <strong id="ticketCode">{{ $laporan['ticket_id'] }}</strong></td>
                        </tr>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td>: {{ $laporan['nama_lengkap'] }}</td>
                        </tr>
                        <tr>
                            <td>Sekolah</td>
                            <td>: {{ $laporan['sekolah']['name'] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>: {{ $laporan['kelas'] }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>: {{ $laporan['email'] }}</td>
                        </tr>
                        <tr>
                            <td>Whatsapp</td>
                            <td>: {{ $laporan['whatsapp'] }}</td>
                        </tr>
                        <tr>
                            <td>Lokasi</td>
                            <td>: {{ $laporan['lokasi'] }}</td>
                        </tr>
                        <tr>
                            <td>Kategori</td>
                            <td>: {{ $laporan['kategori_bullying']['name'] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>: {{ $laporan['status']['name'] }}</td>
                        </tr>
                        <tr>
                            <td>Waktu</td>
                            <td>:
                                {{ \Carbon\Carbon::parse($laporan['create_at'])->format('d F Y H:i') }}
                            </td>
                        </tr>
                    </table>

                    <hr>

                    <strong>Deskripsi Kejadian</strong>
                    <p class="text-muted mt-2">
                        {{ $laporan['deskripsi_kejadian'] }}
                    </p>
                </div>
            </div>

            @endif

        </div>
    </div>
</div>

@if(session('success'))
<script>
document.addEventListener('DOMContentLoaded', function () {
    Swal.fire({
        icon: 'success',
        title: 'Laporan Berhasil Dikirim 🎉',
        html: `
            <p>Kode Tiket Anda:</p>
            <hr>
            <h3 style="color:#0d6efd" id="ticketNumber">{{ session('ticket_id') }} <i class="fa-solid fa-copy"></i></h3>
            <hr>
            <small>Kode Tiket Anda Sudah Di Kirim Ke <strong>{{ session ('email') }}</strong> </small>
        `,
        didOpen: () => {
            const ticketNumber = document.getElementById('ticketNumber');
            ticketNumber.addEventListener('click', () => {
                navigator.clipboard.writeText(ticketNumber.innerText).then(() => {
                    Swal.fire('Berhasil disalin!', '', 'success');
                });
            });
        }
    });
});
</script>
@endif
@endsection
