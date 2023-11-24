<?php
$wfsUrl = "https://geoportal.klaten.go.id/geoserver/ows?service=WFS&version=1.0.0&request=GetFeature&typename=geonode%3ABATAS_ADMINISTRASI_KECAMATAN_AR&outputFormat=json&srs=EPSG%3A4326&srsName=EPSG%3A4326";
           
$contents = @file_get_contents($wfsUrl);
if ($contents === false) {
    die("Gagal mengambil konten dari URL.");
}

header('Content-type: application/json');
echo $contents;
?>