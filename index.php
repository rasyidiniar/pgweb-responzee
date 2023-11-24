<!DOCTYPE html>
<html lang="en">
 
<head>
    <title>WebGIS Rasyidini</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.42.0/apexcharts.min.css"
        integrity="sha512-nnNXPeQKvNOEUd+TrFbofWwHT0ezcZiFU5E/Lv2+JlZCQwQ/ACM33FxPoQ6ZEFNnERrTho8lF0MCEH9DBZ/wWw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Leaflet CSS Library -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css">

    <!-- Tab browser icon -->
    <link rel="icon" type="image/x-icon" href=https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css>

    <!-- Search CSS Library -->
    <link rel="stylesheet" href="assets/plugins/leaflet-search/leaflet-search.css" />

    <!-- Geolocation CSS Library for Plugin -->
    <link rel="stylesheet"
        href="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-locatecontrol/v0.43.0/L.Control.Locate.css" />

    <!-- Leaflet Mouse Position CSS Library -->
    <link rel="stylesheet" href="assets/plugins/leaflet-mouseposition/L.Control.MousePosition.css" />

    <!-- Leaflet Measure CSS Library -->
    <link rel="stylesheet" href="assets/plugins/leaflet-measure/leaflet-measure.css" />

    <!-- EasyPrint CSS Library -->
    <link rel="stylesheet" href="assets/plugins/leaflet-easyprint/easyPrint.css" />

    <!-- Marker Cluster CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster/dist/MarkerCluster.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster/dist/MarkerCluster.Default.css">

    <!-- Routing CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />

    <style>
        #map {
            height: 100vh;
        }

        body {
            background-color: #155280;
        }

        *.info {
            padding: 6px 8px;
            font: 14px/16px;
            background: white;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            text-align: center;
        }

        .info h2 {
            margin: 0 0 5px;
            color: #777;
        }
    </style>

    <style>
        .media {
            position: relative;
            text-align: center;
        }

        .media-object {
            width: 60px;
            position: relative;
            top: 0;
            left: 2%;
            transform: translateX(-50%);
        }
    </style>

    <style>
        header.masthead {
            padding-top: 20%;
            padding-bottom: 20%;
            text-align: center;
            color: #fff;
            background-image: url("assets/img/gunung.jpg");
            background-repeat: no-repeat;
            background-attachment: scroll;
            background-position: center center;
            background-size: cover;
        }
    </style>

    <style>
        .navbar-black {
            background-color: #155280;
        }
    </style>

    <script>
        window.addEventListener('DOMContentLoaded', event => {

            var navbarShrink = function () {
                const navbarCollapsible = document.body.querySelector('#mainNav');
                if (!navbarCollapsible) {
                    return;
                }
                if (window.scrollY === 0) {
                    navbarCollapsible.classList.remove('navbar-shrink')
                } else {
                    navbarCollapsible.classList.add('navbar-shrink')
                }

            };

            navbarShrink();

            document.addEventListener('scroll', navbarShrink);
            const mainNav = document.body.querySelector('#mainNav');
            if (mainNav) {
                new bootstrap.ScrollSpy(document.body, {
                    target: '#mainNav',
                    rootMargin: '0px 0px -40%',
                });
            };
            const navbarToggler = document.body.querySelector('.navbar-toggler');
            const responsiveNavItems = [].slice.call(
                document.querySelectorAll('#navbarResponsive .nav-link')
            );
            responsiveNavItems.map(function (responsiveNavItem) {
                responsiveNavItem.addEventListener('click', () => {
                    if (window.getComputedStyle(navbarToggler).display !== 'none') {
                        navbarToggler.click();
                    }
                });
            });

        });

    </script>

</head>

<body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-black" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#dashboard">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="#peta">Map</a></li>
                    <li class="nav-item"><a class="nav-link" href="#list">List</a></li>
                    <li class="nav-item"><a class="nav-link" href="#news">News</a></li>
                    <li class="nav-item"><a class="nav-link" href="#anticipation">Anticipation</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="masthead text-white text-center">
        <div class="container">
            <div class="masthead-subheading" style="font-size: 30px;">Sebaran Gunung di Kabupaten Klaten</div>
            <div class="masthead-heading text-uppercase" style="font-size: 55px; margin-bottom: 30px;">Antara Nirwana dan Bencana : 
                <br>Menjelajahi Pesona dan Refleksi Pahit Pegunungan di Klaten</div>
        </div>
    </header>

    <nav class="navbar navbar-expand-lg bg-body-tertiary" id="dashboard">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"> <i class="fa-solid fa-chart-gantt"> </i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fa-solid fa-calendar-days"></i> Data
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-disabled="true" data-bs-toggle="modal" data-bs-target="#infoModal"><i
                                class="fa-solid fa-circle-info"></i> Info</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Informasi Personal</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Nama: Rasyidini Ayu Rahmawati</p>
                    <p>NIM: 22/499856/SV/21374</p>
                    <p>Kelas: B</p>
                    <p>Sumber Data: <a href="https://klatenkab.bps.go.id/"
                            target="_blank">https://klatenkab.bps.go.id/</a>

                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
    <hr>

    <div class="container text-light text-center">
        <div class="row justifty-content center">
            <h3>Kabupaten Klaten</h3>
        </div>
        <p>Klaten merupakan kabupaten yang terletak di antara Solo dan Yogyakarta. Keadaan wilayah Kabupaten Klaten
            memperlihatkan perbedaan karakteristik yang terbagi menjadi tiga dataran utama.
            Dataran Lereng Gunung Merapi membentang di sebelah utara, meliputi sebagian kecil wilayah Kecamatan
            Kemalang,
            Karangnongko, Jatinom, dan Tulung. Dataran Rendah membujur di tengah, meliputi seluruh wilayah kecamatan di
            Kabupaten Klaten, kecuali sebagian kecil yang merupakan dataran lereng Gunung Merapi dan Gunung Kapur.
            Sementara
            itu, Dataran Gunung Kapur membujur di sebelah selatan, melibatkan sebagian kecil wilayah selatan Kecamatan
            Bayat
            dan Cawas. Kondisi alam yang didominasi oleh dataran rendah dan dukungan dari beragam sumber air menjadikan
            Kabupaten Klaten sebagai daerah pertanian yang sangat potensial, selain juga sebagai penghasil kapur, batu
            kali,
            dan pasir yang berasal dari Gunung Merapi. Sebagai gambaran tambahan, sekitar 3,72% wilayah berada pada
            ketinggian 0-100 meter di atas permukaan laut, sementara mayoritas, yaitu 83,52%, terletak di rentang
            ketinggian
            100-500 meter di atas permukaan laut.</p>

        <img src="klaten.jpg" alt="" style="width: 320px; height: auto; margin-bottom: 20px; border-radius: 10px;">

        <div class="row justifty-content center">

            <h3>Gunung Merapi</h3>
        </div>
        <p>Kabupaten Klaten, yang terletak di Provinsi Jawa Tengah, Indonesia, memiliki sejumlah pegunungan dan dataran
            tinggi yang memperkaya keindahan alam wilayah tersebut. Salah satu pegunungan yang cukup mencolok adalah
            Gunung
            Merapi di bagian utara. Gunung Merapi menjadi batas alami antara Provinsi Jawa Tengah dan Daerah Istimewa
            Yogyakarta. Gunung ini terkenal sebagai salah satu gunung berapi paling aktif di Indonesia. Meskipun
            aktivitas
            vulkaniknya menimbulkan potensi bahaya, keberadaannya memberikan manfaat bagi tanah di sekitarnya karena
            material vulkaniknya yang subur. Wilayah sekitar Gunung Merapi menawarkan pemandangan alam yang luar biasa,
            dengan lereng yang hijau subur dan sungai-sungai yang melintasi daerah pegunungan. Keindahan alam ini
            menjadi
            karakteristik unik Kabupaten Klaten, menciptakan lanskap yang menawan dan sekaligus menghadirkan tantangan
            dan
            potensi bagi masyarakat setempat.</p>
    </div>
    <hr>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <div class="container mt-1">
        <div class="card" id="peta">
            <div class="card-header">
                <h5>Peta Sebaran Gunung di Kabupaten Klaten</h5>
            </div>
            <div class="card-body">
                <div id="map" style="height: 550px; width: 100%;" href="titik.php"></div>
            </div>
        </div>
    </div>

    <div id="map" style="height: 30px;"></div>

    <!--LIST-->
    <section class="page-section bg-light" id="list">
        <div class="container">
            <div class="text-center">
                <br>
                <h2 class="section-heading"> Pegunungan Paling Sering Dikunjungi di Kabupaten Klaten</h2>
                <br>
            </div>
            <div class="row" style="text-align: center;">
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- list item 1-->
                    <div class="list-item">
                        <a class="list-link" data-bs-toggle="modal" href="#listModal1">
                            <div class="list-hover">
                                <div class="list-hover-content"><i></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/1.jpg" alt="..." />
                        </a>
                        <div class="list-caption">
                            <br>
                            <div class="list-caption-heading">GUNUNG MERAPI</div>
                            <div class="list-caption-subheading text-muted">Angka kunjungan wisatawan penyewa wisata di Gunung Merapi tembus 10.000 orang. Angka ini berdasarkan pantauan. 
                            Ketua Asosiasi Wisata di sekitar Gunung Merapi mengatakan bahwa lonjakan wisatawan mulai terlihat saat liburan. Para wisatawan memilih untuk berlibur setelah merayakan beberapa hari besar</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- List item 2-->
                    <div class="list-item">
                        <a class="list-link" data-bs-toggle="modal" href="#listModal2">
                            <div class="list-hover">
                                <div class="list-hover-content"><i></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/2.jpg" alt="..." />
                        </a>
                        <div class="list-caption">
                            <br>
                            <div class="list-caption-heading">PEGUNUNGAN BELUK</div>
                            <div class="list-caption-subheading text-muted">Gunung Beluk dijadikan objek wisata, pengunjung dengan rata-rata 250 orang per hari bisa menikmati matahari terbenam. 
                            Untuk berkunjung ke sana, wisatawan bisa melalui jalan menuju Pantai Ngeden. Akses jalan yang kurang bagus wisatawan disarankan untuk memakai kendaraan roda dua.</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- list item 3-->
                    <div class="list-item">
                        <a class="list-link" data-bs-toggle="modal" href="#listModal3">
                            <div class="list-hover">
                                <div class="list-hover-content"><i></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/3.jpg" alt="..." />
                        </a>
                        <div class="list-caption">
                            <br>
                            <div class="list-caption-heading">GUNUNG LANANG</div>
                            <div class="list-caption-subheading text-muted">Gunung ini memiliki mitos dan sejarah yang menarik. Gunung Lanang sendiri mempunyai keindahan alam yang sangat menakjubkan, bentangan gunung-gunung dataran tinggi yang 
                            terlihat di seputaran kawasan Gunung Lanang. sunset dan sunrise yang terlihat jelas dari puncak Gunung Lanang. </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                    <!-- list item 4-->
                    <div class="list-item">
                        <a class="list-link" data-bs-toggle="modal" href="#listModal4">
                            <div class="list-hover">
                                <div class="list-hover-content"><i></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/4.jpg" alt="..." />
                        </a>
                        <div class="list-caption">
                            <br>
                            <div class="list-caption-heading">PEGUNUNGAN CAKARAN</div>
                            <div class="list-caption-subheading text-muted">Pegunungan Cakaran bukanlah tempat yang sengaja dijadikan lokasi wisata resmi oleh pemerintah. Lokasi pesona alam kali ini ditemukan sebab adanya asumsi bahwa tempat di sekitar 
                                perbukitannya mengandung batuan purba. Sejak digali lebih lanjut, banyak wisatawan yang berkunjung dan menambah wawasan.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4 mb-sm-0">
                    <!-- list item 5-->
                    <div class="list-item">
                        <a class="list-link" data-bs-toggle="modal" href="#listModal5">
                            <div class="list-hover">
                                <div class="list-hover-content"><i></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/5.jpg" alt="..." />
                        </a>
                        <div class="list-caption">
                            <br>
                            <div class="list-caption-heading">PEGUNUNGAN JERUKAN</div>
                            <div class="list-caption-subheading text-muted">Pesona pegunungan yang memukau di Klaten menjadi destinasi unggulan bagi pengunjung dan wisatawan. Pemandangan spektakuler dari puncak-puncak yang memancar di bawah cahaya matahari 
                            senja menciptakan suasana yang tak terlupakan. Dikelilingi oleh vegetasi yang hijau dan alami.</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <!-- list item 6-->
                    <div class="list-item">
                        <a class="list-link" data-bs-toggle="modal" href="#listModal6">
                            <div class="list-hover">
                                <div class="list-hover-content"><i></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/6.jpg" alt="..." />
                        </a>
                        <div class="list-caption">
                            <br>
                            <div class="list-caption-heading">PINDUL</div>
                            <div class="list-caption-subheading text-muted">Objek alami Pindul adalah salah satu destinasi wisata dengan tema pegunungan yang rama pengunjung dan cukup terkenal. Objek ini menyuguhkan pemandangan yang indah dan sesuai untuk 
                            pengunjung dan wisatawan yang suka dengan pengalaman ekstrim. Sebanyak 500 pengunjung datang setiap harinya.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </section>

    <div class="row bg-white text-center" id="news">

        <hr>
        <div class="container text-center">
            <h3>
            Refleksi Pahit Bencana Alam
            <hr>    
            Berita Terkait
            </h3>
        </div>
        <style>
            .video-container {
                width: 850px;
                background-color: rgb(255, 255, 255);
                margin-bottom: 20px;
            }
        </style>

        <div class="row justify-content-center" style="margin-top: 10px;">
            <iframe class="video-container" width="560" height="415"
                src="https://www.youtube.com/embed/14h25fRfUHk?si=TeOOLP7IyEvbDN1e" title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
        </div>

        <div class="center">
            <p style="margin-left: 120px; margin-right: 120px;">
                Bahaya letusan gunung merupakan ancaman serius yang dapat memberikan dampak yang luas dan merusak.
                Ketika
                gunung
                meletus, material vulkanik seperti abu, batu pijar, dan lava dapat dilemparkan ke udara, menciptakan
                potensi
                bahaya bagi lingkungan sekitarnya. Abu vulkanik yang tersebar dapat menciptakan hujan abu yang dapat
                merusak
                tanaman, mengganggu sistem pernapasan manusia dan hewan, serta merusak infrastruktur. Banjir lahar, yang
                terdiri
                dari campuran air, batu, dan material vulkanik lainnya, dapat mengalir dengan kecepatan tinggi dan
                merusak
                wilayah yang dilaluinya. Letusan gunung juga dapat menyebabkan kerusakan struktural pada bangunan dan
                infrastruktur, serta mengakibatkan perubahan iklim lokal. Selain itu, letusan gunung sering kali diikuti
                oleh
                gempa bumi, tsunami, atau fenomena alam lainnya yang dapat menambah kerumitan dan bahaya keseluruhan
                situasi.
                Oleh karena itu, pemahaman yang baik tentang bahaya letusan gunung dan penerapan tindakan kesiapsiagaan
                yang
                efektif sangat penting untuk melindungi keselamatan masyarakat dan mengurangi dampak negatif yang
                mungkin
                timbul.
            </p>
        </div>

        <div id="grafikKorban"
            style="background-color: aliceblue; max-width: 900px; margin-top: 25px; margin-left: auto; margin-right: auto;">
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        var dataKorban = [11, 6, 7, 8, 5, 6, 11, 12, 9, 9, 10, 10, 9, 3, 6];
        var kecamatan = ['Prambanan', 'Gantiwarno', 'Wedi', 'Bayat', 'Cawas', 'Trucuk', 'Kalikotes', 'Kebonarum', 'Jogonalan', 'Manisrenggo', 'Karangnongko', 'Ngawen', 'Ceper', 'Pedan', 'Karangdowo', 'Juwiring'];

        var options = {
            chart: {
                type: 'bar'
            },
            series: [{
                name: 'Jumlah Korban Jiwa per Kecamatan',
                data: dataKorban
            }],
            xaxis: {
                categories: kecamatan
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded',
                    dataLabels: {
                        position: 'center',
                    }
                },
            },
            dataLabels: {
                enabled: true,
                formatter: function (val) {
                    return val;
                },
                offsetY: -20,
                style: {
                    fontSize: '12px',
                    colors: ["#304758"]
                }
            },
            title: {
                text: 'Grafik Data Jumlah Korban Jiwa Gunung Merapi di Kabupaten Klaten',
                align: 'center',
                margin: 20,
                offsetX: 0,
                offsetY: 10,
                style: {
                    fontSize: '16px',
                    fontWeight: 'bold',
                    color: '#333'
                }
            }

        };

        var chart = new ApexCharts(document.getElementById('grafikKorban'), options);
        chart.render();
    </script>

    <!--ANTISIPASI-->
    <section class="page-section" id="anticipation">
        <div class="row bg-white p-3">
            <hr>
            <div class="container text-center">
                <h3>
                    Langkah-Langkah Penting untuk Keselamatan saat Terjadi Letusan Gunung!
                </h3>
            </div>
            <hr>
            <div class="col-md-4 icon-box aos-init aos-animate" data-aos="fade-up">
                <div style="text-align: center;">
                    <i class="fa-solid fa-person-through-window fa-2xl"
                        style="color: #155280; font-size: 7em; margin-bottom: 70px; margin-top: 60px;"></i>
                    <h4>Evakuasi Cepat dan Teratur</h4>
                    <p>Segera setelah terjadi letusan, lakukan evakuasi secepat mungkin. Ikuti jalur evakuasi yang telah
                        ditentukan dan hindari daerah berbahaya seperti daerah aliran piroklastik, lahar, atau zona
                        bahaya
                        lainnya. Jangan menunggu terlalu lama untuk mulai evakuasi. Tindakan cepat dapat menyelamatkan
                        nyawa.
                        Pastikan bahwa semua orang dapat mengakses jalur evakuasi dengan mudah.</p>
                </div>
            </div>
            <div class="col md-4 icon-box aos-init" data-aos="fade-up">
                <div style="text-align: center;">
                    <i class="fa-solid fa-person-shelter fa-2xl"
                        style="color: #155280; font-size: 7em; margin-bottom: 70px; margin-top: 60px"></i>
                    <h4>Gunakan Perlindungan Tubuh</h4>
                    <p>Saat terjadi letusan, udara dapat menjadi tercemar oleh abu vulkanik dan gas beracun. Gunakan
                        masker atau
                        penutup wajah untuk melindungi pernapasan Anda dari abu halus. Masker N95 atau masker khusus
                        untuk
                        partikel-partikel kecil dapat efektif. Gunakan pakaian pelindung untuk melindungi tubuh dari abu
                        vulkanik yang dapat merusak kulit dan mata.</p>
                </div>
            </div>
            <div class="col md-4 icon-box aos-init" data-aos="fade-up">
                <div style="text-align: center;">
                    <i class="fa-solid fa-person-booth fa-2xl"
                        style="color: #155280; font-size: 7em; margin-bottom: 70px; margin-top: 60px"></i>
                    <h4>Hindari Area yang Berpotensi Bahaya</h4>
                    <p>Jauhi area-area yang dapat menjadi berbahaya akibat letusan, seperti daerah aliran piroklastik,
                        lahar,
                        dan daerah dengan risiko lava pijar atau batuan vulkanik terlempar. Terhindar dari sungai atau
                        aliran
                        air, karena letusan dapat menyebabkan lahar yang sangat berbahaya. Hindari juga terlalu dekat
                        dengan
                        lereng gunung berapi yang mungkin mengalami longsor.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- UGM -->
    <div class="media bg-white p-3">
        <hr>
        <div class="media">
            <img src="logo.jpg" class="media-object" style="width:60px">
        </div>
        <hr>
        <div class="media-body">
            <h4 class="media-heading">Universitas Gadjah Mada</h4>
            <p>Secara Geografis, Kabupaten Klaten terletak di antara 110° 18′ 00″ dan 110° 45′ 00″ Bujur Timur, serta 7°
                36′
                00″ dan 7° 48′ 00″ Lintang Selatan. Wilayah Kabupaten Klaten memiliki batas wilayah yang berdekatan
                dengan
                beberapa kabupaten dan provinsi di sekitarnya. Sebelah utara berbatasan dengan Kabupaten Boyolali,
                Propinsi
                Jawa Tengah, sebelah timur berbatasan dengan Kabupaten Sukoharjo, Kabupaten Sragen, dan Kabupaten
                Wonogiri,
                Propinsi Jawa Tengah, sebelah barat berbatasan dengan Kabupaten Magelang dan Kota Magelang, Propinsi
                Jawa
                Tengah, dan sebelah selatan berbatasan dengan Kabupaten Yogyakarta dan Kabupaten Sleman, Provinsi D.I.
                Yogyakarta. Perbatasan ini menciptakan karakteristik geografis unik dan menggambarkan posisi strategis
                Kabupaten Klaten dalam konteks regional.</p>
        </div>
    </div>
    <hr>

    <div class="container">
        <div class="media text-light">
            <h4>Info lebih lanjut dapat diakses melalui :</h4>
            <button type="button" class="btn btn-primary">@rasyidiniar<span class="badge"></span></button>
            <button type="button" class="btn btn-success">rasyidiniayurahmawati@mail.ugm.ac.id<span class="badge"></span></button>
            <button type="button" class="btn btn-danger">089505953000<span class="badge"></span></button>
        </div>
        <hr>

        <div class="text-center mt-2">
            <small class="text-light fs-6">rasyidiniar@2023</small>
        </div>
        <hr>

        <!-- Search JavaScript Library -->
        <script src="assets/plugins/leaflet-search/leaflet-search.js"></script>

        <!-- Geolocation Javascript Library -->
        <script
            src="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-locatecontrol/v0.43.0/L.Control.Locate.min.js"></script>

        <!-- Leaflet Mouse Position JavaScript Library -->
        <script src="assets/plugins/leaflet-mouseposition/L.Control.MousePosition.js"></script>

        <!-- Leaflet Measure JavaScript Library -->
        <script src="assets/plugins/leaflet-measure/leaflet-measure.js"></script>

        <!-- EasyPrint JavaScript Library -->
        <script src="assets/plugins/leaflet-easyprint/leaflet.easyPrint.js"></script>

        <!-- Marker Cluster JS -->
        <script src="https://unpkg.com/leaflet.markercluster/dist/leaflet.markercluster.js"></script>

        <!-- Routing JS -->
        <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
        <script>

            var map = L.map('map').setView([-7.6706, 110.6167], 11); //lat, long, zoom

            var basemap1 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
                {
                    attribution: '<a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> | <a href="RASYIDINI" target="_blank">DIVSIG UGM</a>'
                });

            var basemap2 = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{ z } / { y } / { x }',
                {
                    attribution: 'Tiles &copy; Esri | <a href="Latihan WebGIS" target="_blank">DIVSIG UGM</a>'
                });
            var basemap3 = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{ z } / { y } / { x }',
                {
                    attribution: 'Tiles &copy; Esri | <a href="Latihan WebGIS" target="_blank">DIVSIG UGM</a>'
                });
            var basemap4 = L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png',
                {
                    attribution: '&copy; <a href="https://stadiamaps.com/">Stadia Maps</a>, &copy; <a href="https://openmaptile s.org/">OpenMapTiles</a> &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'
                });
            basemap1.addTo(map);

            $.getJSON("geoportal.php", function (data) {
                wfsgeoserver1.addData(data);
                wfsgeoserver1.addTo(map);
                map.fitBounds(wfsgeoserver1.getBounds());
            });

            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "responsi";
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: ".$conn -> connect_error);
            }

            $sql = "SELECT * FROM data_gunung";
            $result = $conn -> query($sql);

            if ($result -> num_rows > 0) {
                while ($row = $result -> fetch_assoc()) {
                    $lat = $row["latitude"];
                    $long = $row["longitude"];
                    $nama = $row["pegunungan"];
                    $tinggi = $row["ketinggian"];
                    $lokasi = $row["kecamatan"];
                    echo "L.marker([$lat, $long]).addTo(map).bindPopup('Gunung $nama<br>Ketinggian $tinggi m<br>Lokasi di Kecamatan $lokasi');";
                }
            }
            else {
                echo "0 results";
            }
            $conn -> close();
            ?>
            
            /* Judul dan Subjudul */
            var title = new L.Control();
            title.onAdd = function (map) {
                this._div = L.DomUtil.create('div', 'info');
                this.update();
                return this._div;
            };
            title.update = function () {
                this._div.innerHTML = '<h2>WEBGIS | DATA SEBARAN GUNUNG DI KABUPATEN KLATEN</h2>RESPONSI PEMROGRAMAN GEOSPASIAL : WEB'
            };
            title.addTo(map);

            /* Image Watermark */
            L.Control.Watermark = L.Control.extend({
                onAdd: function (map) {
                    var img = L.DomUtil.create('img');
                    img.src = 'assets/img/logo.png';
                    img.style.width = '150px';
                    return img;
                }
            });
            L.control.watermark = function (opts) {
                return new L.Control.Watermark(opts);
            }
            L.control.watermark({ position: 'topleft' }).addTo(map);

            /* Image Legend */
            L.Control.Legend = L.Control.extend({
                onAdd: function (map) {
                    var img = L.DomUtil.create('img');
                    img.src = 'assets/img/legend.jpg';
                    img.style.width = '300px';
                    return img;
                }
            });
            L.control.Legend = function (opts) {
                return new L.Control.Legend(opts);
            }
            L.control.Legend({ position: 'bottomleft' }).addTo(map);

            /* Control Layer */
            var baseMaps = {
                "OpenStreetMap": basemap1,
                "Esri World Street": basemap2,
                "Esri Imagery": basemap3,
                "Stadia Dark Mode": basemap4
            };
            L.control.layers(baseMaps).addTo(map);

            /* Scale Bar */
            L.control.scale({
                maxWidth: 150, position: 'bottomright'
            }).addTo(map);
            var wfsgeoserver1 = L.geoJson(null, {
                pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {
                        icon: L.icon({
                            iconSize: [32, 32],
                            iconAnchor: [16, 32],
                            popupAnchor: [0, -32],
                            tooltipAnchor: [16, -20]
                        })
                    });
                },
                onEachFeature: function (feature, layer) {
                    var content = "Nama Wilayah : " + feature.properties.KECAMATAN + "<br>"
                    layer.on({
                        click: function (e) {
                            wfsgeoserver1.bindPopup(content);
                        },
                        mouseover: function (e) {
                            wfsgeoserver1.bindTooltip(feature.properties.KECAMATAN);
                        },
                        mouseout: function (e) {
                            wfsgeoserver1.closePopup();
                        }
                    });
                }
            });

        </script>

        <!-- Plugin Search -->
        <script>
            var searchControl = new L.Control.Search({
                position: "topleft",
                layer: wfsgeoserver1,
                propertyName: "KECAMATAN",
                marker: false,
                moveToLocation: function (latlng, title, map) {
                    var zoom = map.getBoundsZoom(latlng.layer.getBounds());
                    map.setView(latlng, zoom);
                },
            });
            searchControl
                .on("search:locationfound", function (e) {
                    e.layer.setStyle({
                        fillColor: "#ffff00",
                        color: "#0000ff",
                    });
                })
                .on("search:collapse", function (e) {
                    featuresLayer.eachLayer(function (layer) {
                        featuresLayer.resetStyle(layer);
                    });
                });
            map.addControl(searchControl);
        </script>

        <!-- Plugin Geolocation -->
        <script
            src="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-locatecontrol/v0.43.0/L.Control.Locate.min.js"></script>
        <script>
            var locateControl = L.control.locate({
                position: "topleft",
                drawCircle: true,
                follow: true,
                setView: true,
                keepCurrentZoomLevel: false,
                markerStyle: {
                    weight: 1,
                    opacity: 0.8,
                    fillOpacity: 0.8,
                },
                circleStyle: {
                    weight: 1,
                    clickable: false,
                },
                icon: "fas fa-crosshairs",
                metric: true,
                strings: {
                    title: "Click for Your Location",
                    popup: "You're here. Accuracy {distance} {unit}",
                    outsideMapBoundsMsg: "Not available"
                },
                locateOptions: {
                    maxZoom: 16,
                    watch: true,
                    enableHighAccuracy: true,
                    maximumAge: 10000,
                    timeout: 10000
                },
            }).addTo(map);
        </script>

        <!-- Plugin Mouse Location Coordinate -->
        <script src="assets/plugins/leaflet-mouseposition/L.Control.MousePosition.js"></script>
        <script>
            L.control.mousePosition({
                position: 'bottomright',
                separator: ',',
                prefix: 'Koordinat : '
            }).addTo(map);
        </script>

        <!-- Plugin Measurement Tool -->
        <script src="assets/plugins/leaflet-measure/leaflet-measure.js"></script>
        <script>
            var measureControl = new L.Control.Measure({
                position: 'topright',
                primaryLengthUnit: 'meters',
                secondaryLengthUnit: 'kilometers',
                primaryAreaUnit: 'hectares',
                secondaryAreaUnit: 'sqmeters',
                activeColor: '#FF0000',
                completedColor: '#00FF00'
            });
            measureControl.addTo(map);
        </script>

        <!-- Plugin Easy Print -->
        <script src="assets/plugins/leaflet-easyprint/leaflet.easyPrint.js"></script>
        <script>
            L.easyPrint({
                title: 'Print'
            }).addTo(map);
        </script>

        <script>
            $.getJSON("geoportal.php", function (data) {
                wfsgeoserver1.addData(data);

                wfsgeoserver1.eachLayer(function (layer) {
                    var KECAMATAN = layer.feature.properties.KECAMATAN.toLowerCase();
                    
                    layer.setStyle({
                    fillColor: '#8B4513',
                    color: '#000000', 
                    weight: 1
                    });

                    layer.bindPopup(KECAMATAN);
                });

                map.addLayer(wfsgeoserver1);
            });
        </script>
</body>

</html>