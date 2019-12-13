<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/pages/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 27 Jul 2019 23:21:21 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="apple-icon.png">
    <link rel="icon" type="image/png" href="favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        {{ config('app.name', 'SenEdu') }}
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!-- Extra details for Live View on GitHub Pages -->



    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="{{ asset('css/main/font-awesome.min.css') }}">
    <!-- CSS Files -->
    <link href="{{ asset('assets/css/material-dashboard.minf066.css?v=2.1.0') }}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('assets/demo/demo.css') }}" rel="stylesheet" />

</head>

<body class="off-canvas-sidebar">



<div class="wrapper wrapper-full-page">
    <div class="page-header login-page header-filter" filter-color="black" style="background-image: url('{{ asset('/assets/img/login.jpg') }}'); background-size: cover; background-position: top center;">
        <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->

        <div class="container">
            <div class="row">
                <div class="col-md-10 ml-auto mr-auto">
                    <div class="card card-signup">
                        <form class="form" method="POST" action="{{ route('teacher.register') }}" id="RegisterValidation">
                            {{ csrf_field() }}
                            <h2 class="card-title text-center mt-5">Yeni Öğretmen Hesabı</h2>

                            @include ('layouts.partials.errors')

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-5 ml-auto border-right">
                                        <h3>Kişisel bilgiler</h3>
                                        <div class="form-group">
                                            <label for="name" class="bmd-label-floating"> İsim *</label>
                                            <input value="{{ old('name') }}" type="text" id="name" class="form-control" name="name"  required>
                                        </div>
                                        <div class="form-group">
                                            <label for="surname" class="bmd-label-floating"> Soyisim *</label>
                                            <input value="{{ old('surname') }}" type="text" id="surname" class="form-control" name="surname"  required>
                                        </div>
                                        <div class="form-group ">
                                            <label for="email" class="bmd-label-floating"> Email *</label>
                                            <input value="{{ old('email') }}" type="email" id="email" class="form-control" name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="teacherPass" class="bmd-label-floating"> Şifre *</label>
                                            <input type="password" id="teacherPass" name="password" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="teacherPassConf" class="bmd-label-floating"> Şifre tekrar *</label>
                                            <input type="password" id="teacherPassConf" name="password_confirmation" equalTo="#teacherPass"  class="form-control"  required>
                                        </div>
                                    </div>
                                    <div class="col-md-5 mr-auto">

                                        <h3>Demografik bilgiler</h3>
                                        <div class="form-group">
                                            <select  class="selectpicker" name="city"  data-style="select-with-transition" title="">
                                                <option disabled selected>--- Şehir ---</option>
                                                <option value="1">Adana</option>
                                                <option value="2">Adıyaman</option>
                                                <option value="3">Afyonkarahisar</option>
                                                <option value="4">Ağrı</option>
                                                <option value="5">Amasya</option>
                                                <option value="6">Ankara</option>
                                                <option value="7">Antalya</option>
                                                <option value="8">Artvin</option>
                                                <option value="9">Aydın</option>
                                                <option value="10">Balıkesir</option>
                                                <option value="11">Bilecik</option>
                                                <option value="12">Bingöl</option>
                                                <option value="13">Bitlis</option>
                                                <option value="14">Bolu</option>
                                                <option value="15">Burdur</option>
                                                <option value="16">Bursa</option>
                                                <option value="17">Çanakkale</option>
                                                <option value="18">Çankırı</option>
                                                <option value="19">Çorum</option>
                                                <option value="20">Denizli</option>
                                                <option value="21">Diyarbakır</option>
                                                <option value="22">Edirne</option>
                                                <option value="23">Elazığ</option>
                                                <option value="24">Erzincan</option>
                                                <option value="25">Erzurum</option>
                                                <option value="26">Eskişehir</option>
                                                <option value="27">Gaziantep</option>
                                                <option value="28">Giresun</option>
                                                <option value="29">Gümüşhane</option>
                                                <option value="30">Hakkâri</option>
                                                <option value="31">Hatay</option>
                                                <option value="32">Isparta</option>
                                                <option value="33">Mersin</option>
                                                <option value="34">İstanbul</option>
                                                <option value="35">İzmir</option>
                                                <option value="36">Kars</option>
                                                <option value="37">Kastamonu</option>
                                                <option value="38">Kayseri</option>
                                                <option value="39">Kırklareli</option>
                                                <option value="40">Kırşehir</option>
                                                <option value="41">Kocaeli</option>
                                                <option value="42">Konya</option>
                                                <option value="43">Kütahya</option>
                                                <option value="44">Malatya</option>
                                                <option value="45">Manisa</option>
                                                <option value="46">Kahramanmaraş</option>
                                                <option value="47">Mardin</option>
                                                <option value="48">Muğla</option>
                                                <option value="49">Muş</option>
                                                <option value="50">Nevşehir</option>
                                                <option value="51">Niğde</option>
                                                <option value="52">Ordu</option>
                                                <option value="53">Rize</option>
                                                <option value="54">Sakarya</option>
                                                <option value="55">Samsun</option>
                                                <option value="56">Siirt</option>
                                                <option value="57">Sinop</option>
                                                <option value="58">Sivas</option>
                                                <option value="59">Tekirdağ</option>
                                                <option value="60">Tokat</option>
                                                <option value="61">Trabzon</option>
                                                <option value="62">Tunceli</option>
                                                <option value="63">Şanlıurfa</option>
                                                <option value="64">Uşak</option>
                                                <option value="65">Van</option>
                                                <option value="66">Yozgat</option>
                                                <option value="67">Zonguldak</option>
                                                <option value="68">Aksaray</option>
                                                <option value="69">Bayburt</option>
                                                <option value="70">Karaman</option>
                                                <option value="71">Kırıkkale</option>
                                                <option value="72">Batman</option>
                                                <option value="73">Şırnak</option>
                                                <option value="74">Bartın</option>
                                                <option value="75">Ardahan</option>
                                                <option value="76">Iğdır</option>
                                                <option value="77">Yalova</option>
                                                <option value="78">Karabük</option>
                                                <option value="79">Kilis</option>
                                                <option value="80">Osmaniye</option>
                                                <option value="81">Düzce</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select  class="selectpicker" name="organization_type"  data-style="select-with-transition" title="">
                                                <option disabled selected>--- Organizasyon türü ---</option>
                                                <option value="1">Üniversite</option>
                                            </select>

                                        </div>
                                        <div class="form-group ">
                                            <select  class="selectpicker" name="education"  data-style="select-with-transition" title="">
                                                <option disabled selected>--- Üniversite ---</option>
                                                <option value="Abant İzzet Baysal Üniversitesi">Abant İzzet Baysal Üniversitesi</option>
                                                <option value="Abdullah Gül Üniversitesi">Abdullah Gül Üniversitesi</option>
                                                <option value="Acıbadem Üniversitesi">Acıbadem Üniversitesi</option>
                                                <option value="Adana Bilim ve Teknoloji Üniversitesi">Adana Bilim ve Teknoloji Üniversitesi</option>
                                                <option value="Adnan Menderes Üniversitesi">Adnan Menderes Üniversitesi</option>
                                                <option value="Adıyaman Üniversitesi">Adıyaman Üniversitesi</option>
                                                <option value="Afyon Kocatepe Üniversitesi">Afyon Kocatepe Üniversitesi</option>
                                                <option value="Ahi Evran Üniversitesi">Ahi Evran Üniversitesi</option>
                                                <option value="Akdeniz Üniversitesi">Akdeniz Üniversitesi</option>
                                                <option value="Akev Üniversitesi">Akev Üniversitesi</option>
                                                <option value="Aksaray Üniversitesi">Aksaray Üniversitesi</option>
                                                <option value="Alanya Alaaddin Keykubat Üniversitesi">Alanya Alaaddin Keykubat Üniversitesi</option>
                                                <option value="Alanya Hamdullah Emin Paşa Üniversitesi">Alanya Hamdullah Emin Paşa Üniversitesi</option>
                                                <option value="Amasya Üniversitesi">Amasya Üniversitesi</option>
                                                <option value="Anadolu Üniversitesi">Anadolu Üniversitesi</option>
                                                <option value="Anka Teknoloji Üniversitesi">Anka Teknoloji Üniversitesi</option>
                                                <option value="Ankara Sosyal Bilimler Üniversitesi">Ankara Sosyal Bilimler Üniversitesi</option>
                                                <option value="Ankara Üniversitesi">Ankara Üniversitesi</option>
                                                <option value="Ardahan Üniversitesi">Ardahan Üniversitesi</option>
                                                <option value="Artvin Çoruh Üniversitesi">Artvin Çoruh Üniversitesi</option>
                                                <option value="Atatürk Üniversitesi">Atatürk Üniversitesi</option>
                                                <option value="Atılım Üniversitesi">Atılım Üniversitesi</option>
                                                <option value="Avrasya Üniversitesi">Avrasya Üniversitesi</option>
                                                <option value="Ağrı İbrahim Çeçen Üniversitesi">Ağrı İbrahim Çeçen Üniversitesi</option>
                                                <option value="Bahçeşehir Üniversitesi">Bahçeşehir Üniversitesi</option>
                                                <option value="Balıkesir Üniversitesi">Balıkesir Üniversitesi</option>
                                                <option value="Bandırma Onyedi Eylül Üniversitesi">Bandırma Onyedi Eylül Üniversitesi</option>
                                                <option value="Bartın Üniversitesi">Bartın Üniversitesi</option>
                                                <option value="Batman Üniversitesi">Batman Üniversitesi</option>
                                                <option value="Bayburt Üniversitesi">Bayburt Üniversitesi</option>
                                                <option value="Başkent Üniversitesi">Başkent Üniversitesi</option>
                                                <option value="Beykent Üniversitesi">Beykent Üniversitesi</option>
                                                <option value="Bezmiâlem Vakıf Üniversitesi">Bezmiâlem Vakıf Üniversitesi</option>
                                                <option value="Bilecik Şeyh Edebali Üniversitesi">Bilecik Şeyh Edebali Üniversitesi</option>
                                                <option value="Bilkent Üniversitesi">Bilkent Üniversitesi</option>
                                                <option value="Bingöl Üniversitesi">Bingöl Üniversitesi</option>
                                                <option value="Biruni Üniversitesi">Biruni Üniversitesi</option>
                                                <option value="Bitlis Eren Üniversitesi">Bitlis Eren Üniversitesi</option>
                                                <option value="Bozok Üniversitesi">Bozok Üniversitesi</option>
                                                <option value="Boğaziçi Üniversitesi">Boğaziçi Üniversitesi</option>
                                                <option value="Bursa Orhangazi Üniversitesi">Bursa Orhangazi Üniversitesi</option>
                                                <option value="Bursa Teknik Üniversitesi">Bursa Teknik Üniversitesi</option>
                                                <option value="Bülent Ecevit Üniversitesi">Bülent Ecevit Üniversitesi</option>
                                                <option value="Canik Başarı Üniversitesi">Canik Başarı Üniversitesi</option>
                                                <option value="Celal Bayar Üniversitesi">Celal Bayar Üniversitesi</option>
                                                <option value="Cumhuriyet Üniversitesi">Cumhuriyet Üniversitesi</option>
                                                <option value="Çanakkale Onsekiz Mart Üniversitesi">Çanakkale Onsekiz Mart Üniversitesi</option>
                                                <option value="Çankaya Üniversitesi">Çankaya Üniversitesi</option>
                                                <option value="Çankırı Karatekin Üniversitesi">Çankırı Karatekin Üniversitesi</option>
                                                <option value="Çağ Üniversitesi">Çağ Üniversitesi</option>
                                                <option value="Çukurova Üniversitesi">Çukurova Üniversitesi</option>
                                                <option value="Deniz Harp Okulu">Deniz Harp Okulu</option>
                                                <option value="Dicle Üniversitesi">Dicle Üniversitesi</option>
                                                <option value="Dokuz Eylül Üniversitesi">Dokuz Eylül Üniversitesi</option>
                                                <option value="Doğuş Üniversitesi">Doğuş Üniversitesi</option>
                                                <option value="Dumlupınar Üniversitesi">Dumlupınar Üniversitesi</option>
                                                <option value="Düzce Üniversitesi">Düzce Üniversitesi</option>
                                                <option value="Ege Üniversitesi">Ege Üniversitesi</option>
                                                <option value="Erciyes Üniversitesi">Erciyes Üniversitesi</option>
                                                <option value="Erzincan Üniversitesi">Erzincan Üniversitesi</option>
                                                <option value="Erzurum Teknik Üniversitesi">Erzurum Teknik Üniversitesi</option>
                                                <option value="Eskişehir Osmangazi Üniversitesi">Eskişehir Osmangazi Üniversitesi</option>
                                                <option value="Fatih Sultan Mehmet Üniversitesi">Fatih Sultan Mehmet Üniversitesi</option>
                                                <option value="Fatih Üniversitesi">Fatih Üniversitesi</option>
                                                <option value="Fırat Üniversitesi">Fırat Üniversitesi</option>
                                                <option value="Galatasaray Üniversitesi">Galatasaray Üniversitesi</option>
                                                <option value="Gazi Üniversitesi">Gazi Üniversitesi</option>
                                                <option value="Gaziantep Üniversitesi">Gaziantep Üniversitesi</option>
                                                <option value="Gaziosmanpaşa Üniversitesi">Gaziosmanpaşa Üniversitesi</option>
                                                <option value="Gebze Teknik Üniversitesi">Gebze Teknik Üniversitesi</option>
                                                <option value="Gedik Üniversitesi">Gedik Üniversitesi</option>
                                                <option value="Gediz Üniversitesi">Gediz Üniversitesi</option>
                                                <option value="Giresun Üniversitesi">Giresun Üniversitesi</option>
                                                <option value="Gülhane Askeri Tıp Akademisi">Gülhane Askeri Tıp Akademisi</option>
                                                <option value="Gümüşhane Üniversitesi">Gümüşhane Üniversitesi</option>
                                                <option value="Hacettepe Üniversitesi">Hacettepe Üniversitesi</option>
                                                <option value="Hakkari Üniversitesi">Hakkari Üniversitesi</option>
                                                <option value="Haliç Üniversitesi">Haliç Üniversitesi</option>
                                                <option value="Harran Üniversitesi">Harran Üniversitesi</option>
                                                <option value="Hasan Kalyoncu Üniversitesi">Hasan Kalyoncu Üniversitesi</option>
                                                <option value="Hava Harp Okulu">Hava Harp Okulu</option>
                                                <option value="Hitit Üniversitesi">Hitit Üniversitesi</option>
                                                <option value="Iğdır Üniversitesi">Iğdır Üniversitesi</option>
                                                <option value="Işık Üniversitesi">Işık Üniversitesi</option>
                                                <option value="Kadir Has Üniversitesi">Kadir Has Üniversitesi</option>
                                                <option value="Kafkas Üniversitesi">Kafkas Üniversitesi</option>
                                                <option value="Kahramanmaraş Sütçü İmam Üniversitesi">Kahramanmaraş Sütçü İmam Üniversitesi</option>
                                                <option value="Kanuni Üniversitesi">Kanuni Üniversitesi</option>
                                                <option value="Kara Harp Okulu">Kara Harp Okulu</option>
                                                <option value="Karabük Üniversitesi">Karabük Üniversitesi</option>
                                                <option value="Karadeniz Teknik Üniversitesi">Karadeniz Teknik Üniversitesi</option>
                                                <option value="Karamanoğlu Mehmetbey Üniversitesi">Karamanoğlu Mehmetbey Üniversitesi</option>
                                                <option value="Karatay Üniversitesi">Karatay Üniversitesi</option>
                                                <option value="Kastamonu Üniversitesi">Kastamonu Üniversitesi</option>
                                                <option value="Kilis 7 Aralık Üniversitesi">Kilis 7 Aralık Üniversitesi</option>
                                                <option value="Kocaeli Üniversitesi">Kocaeli Üniversitesi</option>
                                                <option value="Konya Gıda Tarım Üniversitesi">Konya Gıda Tarım Üniversitesi</option>
                                                <option value="Koç Üniversitesi">Koç Üniversitesi</option>
                                                <option value="Kırklareli Üniversitesi">Kırklareli Üniversitesi</option>
                                                <option value="Kırıkkale Üniversitesi">Kırıkkale Üniversitesi</option>
                                                <option value="MEF Üniversitesi">MEF Üniversitesi</option>
                                                <option value="Maltepe Üniversitesi">Maltepe Üniversitesi</option>
                                                <option value="Mardin Artuklu Üniversitesi">Mardin Artuklu Üniversitesi</option>
                                                <option value="Marmara Üniversitesi">Marmara Üniversitesi</option>
                                                <option value="Mehmet Akif Ersoy Üniversitesi">Mehmet Akif Ersoy Üniversitesi</option>
                                                <option value="Melikşah Üniversitesi">Melikşah Üniversitesi</option>
                                                <option value="Mersin Üniversitesi">Mersin Üniversitesi</option>
                                                <option value="Mevlana Üniversitesi">Mevlana Üniversitesi</option>
                                                <option value="Mimar Sinan Güzel Sanatlar Üniversitesi">Mimar Sinan Güzel Sanatlar Üniversitesi</option>
                                                <option value="Murat Hüdavendigar Üniversitesi">Murat Hüdavendigar Üniversitesi</option>
                                                <option value="Mustafa Kemal Üniversitesi">Mustafa Kemal Üniversitesi</option>
                                                <option value="Muğla Sıtkı Koçman Üniversitesi">Muğla Sıtkı Koçman Üniversitesi</option>
                                                <option value="Muş Alparslan Üniversitesi">Muş Alparslan Üniversitesi</option>
                                                <option value="Namık Kemal Üniversitesi">Namık Kemal Üniversitesi</option>
                                                <option value="Necmettin Erbakan Üniversitesi**">Necmettin Erbakan Üniversitesi**</option>
                                                <option value="Nevşehir Hacı Bektaş Veli Üniversitesi">Nevşehir Hacı Bektaş Veli Üniversitesi</option>
                                                <option value="Niğde Üniversitesi">Niğde Üniversitesi</option>
                                                <option value="Nişantaşı Üniversitesi">Nişantaşı Üniversitesi</option>
                                                <option value="Nuh Naci Yazgan Üniversitesi">Nuh Naci Yazgan Üniversitesi</option>
                                                <option value="İbn-u Haldun Üniversitesi">İbn-u Haldun Üniversitesi</option>
                                                <option value="İnönü Üniversitesi">İnönü Üniversitesi</option>
                                                <option value="İpek Üniversitesi**">İpek Üniversitesi**</option>
                                                <option value="İskenderun Teknik Üniversitesi">İskenderun Teknik Üniversitesi</option>
                                                <option value="İstanbul 29 Mayıs Üniversitesi">İstanbul 29 Mayıs Üniversitesi</option>
                                                <option value="İstanbul Arel Üniversitesi">İstanbul Arel Üniversitesi</option>
                                                <option value="İstanbul Aydın Üniversitesi">İstanbul Aydın Üniversitesi</option>
                                                <option value="İstanbul Bilgi Üniversitesi">İstanbul Bilgi Üniversitesi</option>
                                                <option value="İstanbul Bilim Üniversitesi">İstanbul Bilim Üniversitesi</option>
                                                <option value="İstanbul Esenyurt Üniversitesi">İstanbul Esenyurt Üniversitesi</option>
                                                <option value="İstanbul Gelişim Üniversitesi">İstanbul Gelişim Üniversitesi</option>
                                                <option value="İstanbul Kemerburgaz Üniversitesi">İstanbul Kemerburgaz Üniversitesi</option>
                                                <option value="İstanbul Kültür Üniversitesi">İstanbul Kültür Üniversitesi</option>
                                                <option value="İstanbul Medeniyet Üniversitesi">İstanbul Medeniyet Üniversitesi</option>
                                                <option value="İstanbul Medipol Üniversitesi">İstanbul Medipol Üniversitesi</option>
                                                <option value="İstanbul Rumeli Üniversitesi">İstanbul Rumeli Üniversitesi</option>
                                                <option value="İstanbul Sabahattin Zaim Üniversitesi">İstanbul Sabahattin Zaim Üniversitesi</option>
                                                <option value="İstanbul Teknik Üniversitesi">İstanbul Teknik Üniversitesi</option>
                                                <option value="İstanbul Ticaret Üniversitesi">İstanbul Ticaret Üniversitesi</option>
                                                <option value="İstanbul Üniversitesi">İstanbul Üniversitesi</option>
                                                <option value="İstanbul Şehir Üniversitesi">İstanbul Şehir Üniversitesi</option>
                                                <option value="İstinye Üniversitesi">İstinye Üniversitesi</option>
                                                <option value="İzmir Ekonomi Üniversitesi">İzmir Ekonomi Üniversitesi</option>
                                                <option value="İzmir Kâtip Çelebi Üniversitesi">İzmir Kâtip Çelebi Üniversitesi</option>
                                                <option value="İzmir Yüksek Teknoloji Enstitüsü">İzmir Yüksek Teknoloji Enstitüsü</option>
                                                <option value="İzmir Üniversitesi">İzmir Üniversitesi</option>
                                                <option value="Okan Üniversitesi">Okan Üniversitesi</option>
                                                <option value="Ondokuz Mayıs Üniversitesi">Ondokuz Mayıs Üniversitesi</option>
                                                <option value="Ordu Üniversitesi">Ordu Üniversitesi</option>
                                                <option value="Orta Doğu Teknik Üniversitesi">Orta Doğu Teknik Üniversitesi</option>
                                                <option value="Osmaniye Korkut Ata Üniversitesi">Osmaniye Korkut Ata Üniversitesi</option>
                                                <option value="Özyeğin Üniversitesi">Özyeğin Üniversitesi</option>
                                                <option value="Pamukkale Üniversitesi">Pamukkale Üniversitesi</option>
                                                <option value="Piri Reis Üniversitesi">Piri Reis Üniversitesi</option>
                                                <option value="Polis Akademisi">Polis Akademisi</option>
                                                <option value="Recep Tayyip Erdoğan Üniversitesi">Recep Tayyip Erdoğan Üniversitesi</option>
                                                <option value="Sabancı Üniversitesi">Sabancı Üniversitesi</option>
                                                <option value="Sakarya Üniversitesi">Sakarya Üniversitesi</option>
                                                <option value="Sanko Üniversitesi">Sanko Üniversitesi</option>
                                                <option value="Sağlık Bilimleri Üniversitesi">Sağlık Bilimleri Üniversitesi</option>
                                                <option value="Selahattin Eyyubi Üniversitesi">Selahattin Eyyubi Üniversitesi</option>
                                                <option value="Selçuk Üniversitesi">Selçuk Üniversitesi</option>
                                                <option value="Siirt Üniversitesi">Siirt Üniversitesi</option>
                                                <option value="Sinop Üniversitesi">Sinop Üniversitesi</option>
                                                <option value="Süleyman Demirel Üniversitesi">Süleyman Demirel Üniversitesi</option>
                                                <option value="Süleyman Şah Üniversitesi">Süleyman Şah Üniversitesi</option>
                                                <option value="Şifa Üniversitesi">Şifa Üniversitesi</option>
                                                <option value="Şırnak Üniversitesi">Şırnak Üniversitesi</option>
                                                <option value="TED Üniversitesi">TED Üniversitesi</option>
                                                <option value="TOBB Ekonomi ve Teknoloji Üniversitesi">TOBB Ekonomi ve Teknoloji Üniversitesi</option>
                                                <option value="Toros Üniversitesi">Toros Üniversitesi</option>
                                                <option value="Trakya Üniversitesi">Trakya Üniversitesi</option>
                                                <option value="Tunceli Üniversitesi">Tunceli Üniversitesi</option>
                                                <option value="Turgut Özal Üniversitesi">Turgut Özal Üniversitesi</option>
                                                <option value="Türk Alman Üniversitesi">Türk Alman Üniversitesi</option>
                                                <option value="Türk Hava Kurumu Üniversitesi">Türk Hava Kurumu Üniversitesi</option>
                                                <option value="Türkiye Uluslararası İslam, Bilim ve Teknoloji Üniversitesi">Türkiye Uluslararası İslam, Bilim ve Teknoloji Üniversitesi</option>
                                                <option value="Ufuk Üniversitesi">Ufuk Üniversitesi</option>
                                                <option value="Uludağ Üniversitesi">Uludağ Üniversitesi</option>
                                                <option value="Uluslararası Antalya Üniversitesi">Uluslararası Antalya Üniversitesi</option>
                                                <option value="Uşak Üniversitesi">Uşak Üniversitesi</option>
                                                <option value="Üsküdar Üniversitesi">Üsküdar Üniversitesi</option>
                                                <option value="Yalova Üniversitesi">Yalova Üniversitesi</option>
                                                <option value="Yaşar Üniversitesi">Yaşar Üniversitesi</option>
                                                <option value="Yeditepe Üniversitesi">Yeditepe Üniversitesi</option>
                                                <option value="Yeni Yüzyıl Üniversitesi">Yeni Yüzyıl Üniversitesi</option>
                                                <option value="Yüksek İhtisas Üniversitesi**">Yüksek İhtisas Üniversitesi**</option>
                                                <option value="Yüzüncü Yıl Üniversitesi">Yüzüncü Yıl Üniversitesi</option>
                                                <option value="Yıldırım Beyazıt Üniversitesi">Yıldırım Beyazıt Üniversitesi</option>
                                                <option value="Yıldız Teknik Üniversitesi">Yıldız Teknik Üniversitesi</option>
                                                <option value="Zirve Üniversitesi">Zirve Üniversitesi</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select  class="selectpicker" name="mission"  data-style="select-with-transition" title="">
                                                <option disabled selected>--- Görev ---</option>
                                                <option value="1">Öğretmen</option>
                                                <option value="2">Yönetici</option>
                                                <option value="3">Diğer</option>
                                            </select>
                                        </div>

                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="" >
                                                <span class="form-check-sign">
                                                     <span class="check"></span>
                                                </span>
                                                <a href="#something">Üyelik sözleşmesi</a>ni okudum ve kabul ediyorum.
                                            </label>
                                        </div>
                                        <div class="text-center mb-5">
                                            <input type="submit" value="Kayıt ol" class="btn btn-primary btn-round mt-4">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--   Core JS Files   -->
<script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap-material-design.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
<!-- Forms Validations Plugin -->
<script src="{{ asset('assets/js/plugins/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/bootstrap-selectpicker.js') }}"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->

<!-- Chartist JS -->
<script src="{{ asset('assets/js/plugins/chartist.min.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('assets/js/material-dashboard.minf066.js?v=2.1.0') }}" type="text/javascript"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('assets/demo/demo.js') }}"></script>

<!-- Sharrre libray -->
<script src=" {{ asset('assets/demo/jquery.sharrre.js') }}"></script>
<script>
    function setFormValidation(id) {
        $(id).validate({
            highlight: function(element) {
                $(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
                $(element).closest('.form-check').removeClass('has-success').addClass('has-danger');
            },
            success: function(element) {
                $(element).closest('.form-group').removeClass('has-danger').addClass('has-success');
                $(element).closest('.form-check').removeClass('has-danger').addClass('has-success');
            },
            errorPlacement: function(error, element) {
                $(element).closest('.form-group').append(error);
            },
        });
    }

    $(document).ready(function() {
        setFormValidation('#RegisterValidation');
        setFormValidation('#TypeValidation');
        setFormValidation('#LoginValidation');
        setFormValidation('#RangeValidation');
    });
</script>
<script>
    $(document).ready(function() {
        md.checkFullPageBackgroundImage();
        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700);
    });
</script>
<script>
    $(document).ready(function() {
        // Initialise the wizard
        demo.initMaterialWizard();
        setTimeout(function() {
            $('.card.card-wizard').addClass('active');
        }, 600);
    });
</script>
</body>


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/pages/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 27 Jul 2019 23:21:21 GMT -->
</html>
