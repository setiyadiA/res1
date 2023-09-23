<link rel="stylesheet" href="leaflet/leaflet.css" /> <!-- memanggil css di folder leaflet -->
<link rel="stylesheet" href="css/style.css" /> <!-- memanggil css style -->
<link rel="stylesheet" href="leaflet/leaflet-search-master/src/leaflet-search.css"/>
<link rel="stylesheet" href="leaflet/leaflet.defaultextent-master/dist/leaflet.defaultextent.css" />

<script src="leaflet/leaflet.js"></script> <!-- memanggil leaflet.js di folder leaflet -->
<script src="leaflet/leaflet-ajax/dist/leaflet.ajax.js"></script>
<script src="leaflet/leaflet-providers-master/leaflet-providers.js"></script> <!-- memanggil leaflet-providers.js-->
<script src="leaflet/leaflet-search-master/src/leaflet-search.js"></script>
<script src="leaflet/leaflet.defaultextent-master/dist/leaflet.defaultextent.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        #map {
            width: 100%;
            height: 100vh;
        }
        .menu_pilih 
        {
		    position: absolute;
		    /*top: 200px;*/
		    bottom: 60px;
		    right: 50px;
		    /*left: 40px;*/
		    /*width: 200px;
		    height: 100px;*/
		    background-color: white;
		    border-radius: 5px;
		    border-color: gray;
		    border-style: solid;
		    border-width: 1px 1px 1px 1px;
		    opacity: 1;
		    z-index: 500;
		  	font-size: smaller;
		}
    </style>
</head>


<div class="menu_pilih">
  
  <label for="html">
  	<img src='img/maps/belum_ada_respon.png' width="15" height="15"><b>Belum Ada Respon</b></label>
   
  <label for="html">
  	<img src='img/maps/dilanjutkan.png' width="15" height="15"><b>Dilanjutkan</b></label>
  
  <label for="html">
  	<img src='img/maps/selesai.png' width="18" height="18"><b>Selesai</b></label>
   
  <label for="html">
  	<img src='img/maps/tidakdapatdihubungi.png' width="18" height="18"><b>Tidak Dapat Dihubungi</b></label>

   <label for="html">
   	<img src='img/maps/tidaklanjut.png' width="18" height="18"><b>Tidak Lanjut</b></label>

   	<label for="html">
   	<img src='img/maps/pemohonaktif.png' width="15" height="15"><b>Pemohon Aktif</b></label>
</div>
<div id="map"></div>
    
</body>

<?php
    $sql=mysqli_query($server1,"
               SELECT
                  *
                  FROM
                  v_penelitian");
 ?>

<script>

// MENGATUR TITIK KOORDINAT TITIK TENGAN & LEVEL ZOOM PADA BASEMAP
var map = L.map('map').setView([-7.133634, 107.579490], 11);

// PILIHAN BASEMAP YANG AKAN DITAMPILKAN
var baseLayers = {  
  'Esri.WorldTopoMap': L.tileLayer.provider('Esri.WorldTopoMap').addTo(map),
  'Esri WorldImagery': L.tileLayer.provider('Esri.WorldImagery')
};

// MENAMPILKAN TOOLS UNTUK MEMILIH BASEMAP
L.control.layers(baseLayers,{}).addTo(map);
// MENAMPILKAN SKALA
L.control.scale({imperial: false}).addTo(map);
// menambahkan tools defautl extent
L.control.defaultExtent().addTo(map);



</script>
<?php
                                        
      while($r = mysqli_fetch_array($sql))
      {   
              ?>
                <script>
                      var greenIcon = L.icon({
                      iconUrl: '<?php echo $r['keterangan'].".png";?>',

                      iconSize:     [15, 15], // size of the icon
                      iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
                      shadowAnchor: [4, 62],  // the same for the shadow
                      popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
                  });

                 var marker = L.marker([<?php echo $r['latitude'];?>, 
                 			  <?php echo $r['longitude'];?>], 
                 			  {icon: greenIcon}).addTo(map);
                </script>
          <?php
      }
 ?>



</html>