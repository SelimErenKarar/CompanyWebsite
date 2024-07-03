<div id="open-alert"></div>
<!-- All JS Here -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.parallax-1.1.3.js"></script>
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/isotope.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/jquery.waypoints.min.js"></script>
<script src="assets/js/jquery.lineProgressbar.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/jquery.slicknav.min.js"></script>
<script src="assets/js/tweetie.js"></script>
<script src="assets/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/js/iziModal.min.js"></script>

<?php $this->load->view("alert"); ?>

<script>
    $(function(){

        $(".modais").iziModal({
            history: false,
            iframe : true,
            fullscreen: true,
            headerColor: '#000000',
            group: 'group1',
            loop: true
        });

    })
</script>

</body>
</html>