<!-- ******************************************
*  Author : Payton McCormick, Jonathan Bernal, Adam Mazur, Sajen Vasuthevan
*  Created On : Tue Aug 09 2022
*  File : map.php
******************************************* -->

<?= template_header('Map') ?>
<style>
    #map {
        height: 400px;
        width: 100%;
    }
</style>

<?= template_navbar('Map') ?>

<!--JS-->
<script>
    function myMap() {

        const uWindsor = {
            lat: 42.3043,
            lng: -83.0682,
        }

        ;

        var mapProp = {
            center: uWindsor,
            zoom: 16,
        }

        ;

        var map = new google.maps.Map(document.getElementById("map"), mapProp);
    }
</script>
<!-- Implementation -->
<div class="content-wrapper">
	<div id="map"></div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKx7SbtzHi5MTt8Vbv4_uMLPH_oPe30YY&callback=myMap">

</script>


<?= template_footer('Map') ?>