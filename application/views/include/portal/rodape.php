<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<footer class="footer_part black">
    <div class="copygight_text">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="copyright_text">
                    <P>
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> Fanatics Game Festival</a></P>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="footer_icon social_icon">
                    <ul class="list-unstyled">
                        <li><a href="#" class="single_social_icon"><i class="fab fa-whatsapp"></i></a></li>
                        <li><a href="#" class="single_social_icon"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#" class="single_social_icon"><i class="fab fa-facebook"></i></a></li>
                        <li><a href="#" class="single_social_icon"><i class="fab fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</footer>
<?php $this->load->view('include/portal/footer.php'); ?>
<script>
    <?= isset($js) ? $js : '' ?>
</script>

</body>

</html>