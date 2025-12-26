# 📘 Sistem Pengaduan Bullying Siswa (Frontend Web)

Aplikasi **Frontend Web Siswa** berbasis **Laravel** yang dirancang sebagai media pengaduan bullying secara **aman**, **mudah**, dan **opsional anonim**. Aplikasi ini ditujukan bagi siswa yang tidak berani atau tidak memungkinkan untuk melapor langsung ke **Ruang BK**.

Frontend ini **terintegrasi penuh dengan REST API Backend** dan **Dashboard Monitoring Guru BK** (aplikasi terpisah), sehingga setiap laporan yang dikirim siswa dapat **dipantau, ditindaklanjuti, dan direspons secara resmi oleh pihak sekolah**.

---

## 🎯 Latar Belakang & Tujuan

Kasus bullying di lingkungan sekolah sering kali **tidak terlaporkan** karena:

* 😟 Siswa merasa **takut**
* 😔 Siswa merasa **malu**
* 🚪 Tidak berani bertemu langsung dengan **Guru BK**
* ❓ Tidak mengetahui harus melapor ke siapa

Melalui aplikasi ini, diharapkan siswa dapat:

* 🛡️ Melakukan pengaduan secara **online dan aman**
* 🤝 Tetap terhubung dengan **Guru BK** tanpa tekanan sosial
* 📩 Mendapatkan **respons resmi dari pihak sekolah**

---

## 🚀 Fitur Utama (Frontend Siswa)

### 1️⃣ Landing Page Edukasi

Halaman informasi dan edukasi mengenai bullying, meliputi:

* Bullying fisik
* Bullying verbal
* Cyber bullying
* Jenis bullying lainnya

Tujuan utama halaman ini adalah meningkatkan **kesadaran siswa** terhadap bahaya bullying.

---

### 2️⃣ Form Pengaduan Bullying

Fitur inti aplikasi bagi siswa untuk melapor kejadian bullying.

**Fitur Form:**

* 📝 Input kronologi kejadian bullying
* 🗂️ Pilihan kategori bullying
* 📷 Upload bukti pendukung (foto)
* 📍 Informasi lokasi kejadian
* 👤 Opsi identitas siswa (opsional / anonim)
* 🔄 Data dikirim langsung ke **Backend API**

---

### 3️⃣ Chatbot Bantuan Siswa

Chatbot interaktif yang membantu:

* Siswa yang menjadi korban bullying
* Orang tua yang mengetahui anaknya mengalami bullying
* Siswa yang mengetahui temannya mengalami bullying

Chatbot akan mengarahkan pengguna untuk **melapor ke Guru BK melalui website ini**.

---

### 4️⃣ Cek Status Pengaduan

Siswa dapat memantau perkembangan laporan dengan **kode tiket** yang dikirim melalui email.

Informasi yang ditampilkan:

* ⏳ Status laporan (diproses, pemanggilan orang tua, selesai)
* 💬 Respons atau tindak lanjut dari Guru BK

---

## 🛠️ Teknologi yang Digunakan

* **Laravel** → Frontend controller & view handler (tidak menyimpan data ke database)
* **Blade Template** → UI rendering
* **Bootstrap 5** → Desain responsif
* **REST API** → Sumber data laporan, status, sekolah, dan kategori
* **WebSocket Client** → Update data secara real-time

---

## 🧩 Arsitektur Sistem

```
Siswa
  ↓
Frontend Web Siswa (Laravel)
  ↓
Backend API Server
  ↓
Dashboard Monitoring Guru BK
```

---

## 🔗 Endpoint API yang Digunakan

| Method | Endpoint                | Fungsi                          |
| ------ | ----------------------- | ------------------------------- |
| POST   | /pengaduan              | Mengirim laporan bullying siswa |
| GET    | /cek_status/{ticket_id} | Cek status laporan              |
| GET    | /api/sekolah            | Mengambil data sekolah          |
| GET    | /api/kategori           | Mengambil kategori bullying     |

---

## 🔐 Hak Akses & Batasan

* Aplikasi ini **khusus untuk siswa**
* Tidak memiliki akses monitoring global
* Siswa **tidak dapat melihat laporan siswa lain**
* Akses laporan hanya menggunakan **kode tiket**
* Semua pengelolaan laporan dilakukan oleh **Guru BK melalui Dashboard Monitoring**

---

## 👥 Kolaborasi Tim

Proyek ini dikembangkan secara **kolaboratif**, dengan pembagian peran sebagai berikut:

* **Frontend Siswa (Aplikasi Ini)**

  * Landing Page
  * Form Pengaduan
  * Chatbot
  * Cek Status Pengaduan

* **Dashboard Monitoring Guru BK**

  * Monitoring laporan per sekolah
  * Tindak lanjut laporan

* **Backend API**

  * Endpoint API
  * Autentikasi
  * Proses data
  * Model Chatbot

---

## 🎓 Catatan Akhir

Aplikasi ini dikembangkan sebagai:

* 🏫 Proyek **Bootcamp & Hackathon Universitas Hang Tuah Pekanbaru**
* 📚 Media edukasi dan solusi nyata terhadap permasalahan bullying
* 🤍 Sarana penghubung siswa dan Guru BK secara aman dan profesional

### 🌱 Harapan

Kami berharap aplikasi ini dapat menjadi **tempat pengaduan yang aman** bagi siswa korban bullying, tanpa harus datang langsung ke ruang BK dengan berbagai alasan seperti rasa takut atau tekanan sosial.

Semoga dengan adanya sistem ini:

* Setiap siswa **didengar**
* Setiap laporan **ditindaklanjuti**
* Dan **tidak ada lagi kasus bullying** di lingkungan sekolah, khususnya di Indonesia.

---

✨ *Together, we create safer schools.*
