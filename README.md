1. Sistem Pengaduan Bullying Siswa (Frontend Web)
   
    Aplikasi Frontend Web Siswa berbasis Laravel yang dirancang sebagai media pengaduan bullying secara aman, anonim (opsional), dan mudah, ditujukan bagi siswa yang tidak berani atau tidak memungkinkan untuk melapor langsung ke ruang BK. Aplikasi ini terintegrasi penuh dengan REST API Backend dan Dashboard Monitoring Guru BK (aplikasi terpisah), sehingga setiap laporan yang dikirim siswa dapat dipantau, ditindaklanjuti, dan direspons langsung oleh pihak sekolah.

3. Latar Belakang & Tujuan
   
    Kasus bullying di lingkungan sekolah sering kali tidak terlaporkan karena:
   
    a. Siswa takut,
   
    b. Malu,
   
    c. Tidak berani bertemu langsung Guru BK,
   
    d. Atau tidak tahu harus melapor ke siapa.
   

    Aplikasi ini hadir sebagai solusi digital agar siswa dapat:
   
    a. Mengadu secara online dan aman,
   
    b. Tetap terhubung dengan Guru BK,
   
    c. Mendapatkan respons resmi dari sekolah tanpa tekanan sosial.
   

3. Fitur Utama (Frontend Siswa)
   
   a. Landing Page Informasi Edukasi tentang bullying (fisik, verbal, cyber, dll).
   
   b. Form Pengaduan Bullying
   
   Fitur utama bagi siswa untuk melapor.
   
   Fitur:
   
   - Input kronologi kejadian bullying.
   - Pilihan kategori bullying.   
   - Upload bukti (foto).
   - Informasi lokasi kejadian.
   - Opsi identitas siswa (jika diperlukan).
   - Data langsung dikirim ke API Backend.

    c. Chatbot Bantuan Siswa
   
   Membantu siswa jika siswa tersebut mendapat bullying, orang tua mengetahui bahwa anak mereka mendapat bullying, atau siswa mengetahui bahwa siswa lainhya mendapat bullying, maka melapor kepada guru bk melalui website ini
   
   d. cek status pengaduan
   
   siswa dapat mengecek laporan pengaduan sudah sampai tahap mana seperti sedang proses, pemanggilan orang tua atau kasus telah selesai/ditutup. dan siswa juga dapat membaca respons dari guru bk yang bersangkutan.

4. Teknologi yang digunakan
   
    a. Laravel

    berfungsi sebagai frontend controller dan view handler. tidak menyimpan data laporan langsung kedalam database tetapi mengirim ke ke server melalui api.

    b. Frontend / UI => Blade template , bootstrap 5

    c. Semua data laporan, status, daftar sekolah, dan respons guru bk berasal dari API Backend yang dibuat oleh rekan tim saya
   
6. Arsitektur Sistem Secara Ringkas
   
    Siswa -> Frontend Web Siswa -> Backend API Server -> Dashboard Monitoring Guru BK

8. Endponit API yang digunakan
    
    | Method | Endpoint                | Fungsi                          |
    | ------ | ----------------------- | ------------------------------- |
    | POST   | /pengaduan              | Mengirim laporan bullying siswa |
    | GET    | /cek_status/{ticket_id} | Cek status laporan              |
    | GET    | /api/sekolah            | Mengambil data sekolah          |
    | GET    | /api/kategori           | Mengambil kategori bullying     |

7. Hak akses & batasan
   a. frontend ini khusus untuk siswa
   b. tidak memiliki akses monitoring global
   c. tidak bisa melihat laporan siswa lain (harus memiliki kode tiket yang dikirimkan melalui email)
   d. semua pengelolaan laporan aduan dilakukan oleh Guru BK melalui Dashboard Monitoring

8. Kolaborasi Tim
   
    Proyek ini dikembangkan secara tim dengan pembagian peran:

    a. Frontend Siswa (Aplikasi Ini) => Landing Page, form pengaduan, chatbot, pengecekan status laporan
    
    b. Dashboard Monitoring Guru BK => Monitoring laporan aduan sesuai dengan sekolah masing masing, dan tindak lanjut dari laporan tersebut

    c. Backend API => Endpoint, auth, proses data, model chatbot
   
===================================================

================== CATATAN AKHIR ======================

===================================================

Aplikasi ini dibuat sebagai:
- Proyek Bootcamp & Hackathon Universitas Hang Tuah Pekanbaru.
- Media edukasi dan solusi nyata permasalahan bullying yang terjadi di lingkungan sekolah
- Sarana penghubung siswa ke guru bk secara aman dan profesional

Harapan saya dan tim dengan adanya proyek yang kami buat ini dapat membantu para siswa yang menjadi korban bullying bisa mendapat tempat pengaduan terhadap kejadian yang mereka alami yang aman tanpa harus langsung keruang bk dengan alasan tertentu seperti takut atau hal lainnya dan kami berharap semua siswa yang menjadi korban dapat didengar dan tidak ada lagi kasus-kasus bullying yang terjadi disekolah terkhusus di indonesia.
