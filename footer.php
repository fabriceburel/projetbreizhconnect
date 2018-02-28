<!-- <footer>
    <div id="footer">
        <div class="row">
            <div class="col offset-l1 l6"><p><span class="hidden-sm hidden-xs couleurblanche">Contact</span><a href="mailto:burelfabrice35@gmail.com"><i class="fa fa-envelope" aria-hidden="true"></i></a></p></div>
        </div>
    </div>
</footer> -->
<script src="assets/lib/jquery.min/index.js"></script>
<script type="text/javascript" src="assets/lib/materialize/dist/js/materialize.min.js"></script>
<script src="assets/js/scriptDatepicker.js"></script>
<script>
    $('.modal').modal();
    $(document).ready(function () {
        $('select').material_select();
        $(".button-collapse").sideNav();
        $('.modal').modal();          
        //permet d'afficher la liste déroulante des régions lorsque le pays france est sélectionné dans la page inscription
        if ($('select.country').val() == 74) {
            $('.region').show();
        } else {
            $('.region').hide();
        }
        $('select.country').change(function () {
            if ($('select.country').val() == 74) {
                $('.region').show();
            } else {
                $('.region').hide();
            }
        });
    });
</script>
<script src="assets/js/buttonConnectOff.js"></script>
<script src="assets/js/tchatAjax.js"></script>
<script src="assets/js/profileAjax.js"></script>
</body>
</html>
