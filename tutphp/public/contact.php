<?php   require_once __DIR__. "/autoload/autoload.php";		 ?>
<?php  require_once __DIR__. "/layouts/header.php";?>

        <div class="col-md-9 bor">
             <section class="box-main1">
                            <h3 class="title-main"><a href=""> Contact</a> </h3>
                            
                        <!-- noi dung -->
                        </section>

                    <div class="col-md-12">
           <div class="google" style="height: 600px;background: white;margin-top: 10px">
                        <div id="map" style="width:100%;height:100%;">
                            <script>
                                function myMap() {
                                  var mapCanvas = document.getElementById("map");
                                  var mapOptions = {
                                    center: new google.maps.LatLng(51.5, -0.2), zoom: 10
                                  };
                                  var map = new google.maps.Map(mapCanvas, mapOptions);
                                }
                                </script>
                                <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d15343.057880791399!2d108.25043240904542!3d15.973671644282453!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1527145236802" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen=""></iframe>
                        </div>
            </div>
         </div>
           
                </div>
            </section>
        
<?php  require_once __DIR__. "/layouts/footer.php";?>
    