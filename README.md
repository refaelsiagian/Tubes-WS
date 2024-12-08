# About Historia
Aplikasi Pencarian ***Sonic*** merupakan **Aplikasi _pencarian tempat wisata bersejarah_** yang memanfaatkan teknologi **web semantik** untuk menyediakan informasi yang lebih kaya, terstruktur, dan mudah diakses oleh pengguna. Dengan menggunakan RDF (_Resource Description Framework_) untuk mendeskripsikan data tempat wisata secara terperinci, aplikasi ini memberikan pengalaman pencarian yang lebih cerdas dan relevan.

# Historia - Aplikasi Pencarian Tempat Wisata Bersejarah

**Historia** adalah aplikasi pencarian tempat wisata bersejarah yang menggunakan **Web Semantik** dan **SPARQL** untuk menyediakan informasi yang lebih terstruktur dan relevan. Aplikasi ini memungkinkan pengguna untuk mencari tempat wisata bersejarah dengan informasi yang lengkap dan mudah diakses.

---

## **Fitur Aplikasi**

### 1. **Pencarian Tempat Wisata Bersejarah**
Pengguna dapat mencari berbagai tempat wisata bersejarah berdasarkan kriteria seperti:
- **Nama Tempat**
- **Provinsi**
- **Lokasi**
- **Kategori**

### 2. **Deskripsi Detil**
Setiap tempat wisata dilengkapi dengan deskripsi mendalam yang mencakup:
- **Deskripsi** guna mengenal sejarah tempat tersebut
- **Gambar** yang menggambarkan tempat wisata
- **Lokasi** tempat wisata yang akurat
- **Fakta menarik** terkait sejarah tempat tersebut

### 3. **Mengambil Lokasi dari DBpedia**
Aplikasi ini menggunakan **DBpedia** untuk mengambil **lokasi** tempat wisata bersejarah, termasuk koordinat **latitude** dan **longitude**. Informasi lokasi ini memudahkan pengguna untuk melihat lokasi tempat wisata secara akurat.

### 4. **Peta Lokasi**
Aplikasi menyediakan **Peta interaktif** yang menunjukkan lokasi tempat wisata yang dicari. Fitur ini memudahkan pengguna untuk menemukan lokasi yang tepat dan menjelajahi tempat wisata bersejarah secara visual.

---

## **Teknologi yang Digunakan**

### 1. **Web Semantik**
Web semantik adalah teknologi yang memungkinkan aplikasi untuk menghubungkan data yang terstruktur dan menyediakan pencarian informasi berdasarkan **konsep** dan **hubungan antar data**. Hal ini memungkinkan pengalaman pencarian yang lebih **efisien** dan **akurat**.

### 2. **SPARQL**
Aplikasi ini menggunakan **SPARQL** untuk mengambil data dari sumber-sumber RDF seperti **DBpedia**. SPARQL memungkinkan aplikasi untuk melakukan query pada data yang terstruktur, memberikan informasi yang terkini dan relevan.

### 3. **RDF (Resource Description Framework)**
RDF digunakan untuk menggambarkan **tempat wisata** secara terstruktur. Dengan RDF, data tempat wisata dapat diorganisir dengan cara yang mudah dipahami dan saling terhubung, yang memudahkan pengelolaan dan pemrosesan informasi dalam aplikasi.

---

## **Cara Kerja Aplikasi**

1. **Pengguna mencari tempat wisata bersejarah** berdasarkan kriteria yang mereka inginkan.
2. **Aplikasi melakukan query** terhadap **DBpedia** menggunakan **SPARQL** untuk mengambil data terkait tempat wisata.
3. **Data tempat wisata** yang relevan ditampilkan, termasuk deskripsi, gambar, dan lokasi tempat tersebut.
4. **Peta interaktif** ditampilkan untuk menunjukkan lokasi tempat wisata pada peta.

---

## **Instalasi dan Penggunaan**

### 1. **Clone Repository**
Sebelum meng-clone repository ini, pastikan Anda sudah berada di dalam folder **`htdocs`** (untuk XAMPP) atau folder yang sesuai di server lokal Anda.<br>
Jika Anda menggunakan XAMPP, pindah ke folder `htdocs` dengan perintah berikut:<br>
Command -> `cd /path/to/your/xampp/htdocs`<br>


Untuk memulai, clone repository ini ke dalam mesin lokal Anda:<br>
Command -> `git clone https://github.com/refaelsiagian/Tubes-WS.git`<br>



### 2. **Instal Apache Jena Fuseki**
Unduh Jena Fuseki [di sini](https://archive.apache.org/dist/jena/binaries/). Kami menggunakan *apache-jena-fuseki-2.4.1.zip*<br>
Setelah Anda mengunduh dan mengekstrak Apache Jena Fuseki, jalankan Apache Jena Fuseki di terminal.<br>
Pastikan Fuseki berjalan di **localhost:3030** atau sesuaikan dengan konfigurasi yang Anda inginkan.

### 3. **Konfigurasi Dataset dengan Nama places**
Di dalam Fuseki, buat dataset baru dengan nama **places** akan digunakan untuk query SPARQL. Dataset ini akan digunakan untuk menghubungkan aplikasi dengan DBpedia.






# Contributor Kelompok 1
| NIM | Nama Anggota | Role |
|-----|-----------|------|
|231402055|[Refael Juari Siagian](http://instagram.com/refaelsiagian)| Project Manager, Back-End |
|231402046|[Mayadi Alamsyah Putra Silalahi](http://instagram.com/mydisllhi)| Back-end |
|231402004|[Adelia Amanda](http://instagram.com/adeliaamd_)| Front-end |
|231402007|[Yuna Dhuha Shabrina](http://instagram.com/yunadhuhaa)| Data for RDF |
|231402022|[Rahmat Maulana Miftah](http://instagram.com/rahmat_visual)| Data for RDF |
|231402101|[Jessica Eldamaris Maha](http://instagram.com/jesicaa_el)| Data for RDF |