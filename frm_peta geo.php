<?php
                  include "config/koneksi.php";

      
                  
                  $geojson = array( 'type' => 'FeatureCollection', 'features' => array()); 
                             

                  $sql=mysqli_query($server1,"SELECT
                    *
                  FROM
                    v_penelitian");

                    $no=1;
                    while($r=mysqli_fetch_array($sql))
                    {
                       $marker = array(
                        'type' => 'Feature',
                        'properties' => array(
                          'title' => $r['idx'],
                          'keterangan' => $r['keterangan'],
                          'marker-color' => '#f00',
                          'marker-size' => 'small'
                        ),
                        'geometry' => array(
                          'type' => 'Point',
                          'coordinates' => array( 
                            $r['longitude'],
                            $r['latitude']
                          )
                        )
                      );
                      array_push($geojson['features'], $marker);
                    }


                header('Content-type: application/json');
                echo json_encode($geojson, JSON_NUMERIC_CHECK);
?>
