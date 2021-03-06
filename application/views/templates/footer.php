<footer class="short" id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4>About Us</h4>
                <p><?php echo $about_us.'... '; ?><a href="<?php echo $this->config->item('link_team'); ?>" class="btn-flat btn-xs">View More <i class="fa fa-arrow-right"></i></a></p>
            </div>
            <div class="col-md-4">
                <div class="contact-details">
                    <h4>Contact Us</h4>
                    <ul class="contact">
                        <li><p><i class="fa fa-at"></i> <strong>Line@: </strong><span class="fontwhite"><?php echo $this->config->item('line_at'); ?></span></p></li>
                        <li><p><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href="<?php echo 'mailto:'.$this->config->item('email_gmail'); ?>"><?php echo $this->config->item('email_gmail'); ?></a></p></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <h4>Follow Us</h4>
                <ul class="social-icons">
                    <li class="social-icons-facebook"><a href="<?php echo $this->config->item('facebook'); ?>" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                    <li class="social-icons-twitter"><a href="<?php echo $this->config->item('twitter'); ?>" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                    <li class="social-icons-instagram"><a href="<?php echo $this->config->item('instagram'); ?>" target="_blank" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                    <li class="social-icons-youtube"><a href="<?php echo $this->config->item('youtube'); ?>" target="_blank" title="Youtube"><i class="fa fa-youtube"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-1">
                    <a href="<?php echo $this->config->item('link_index'); ?>" class="logo">
                        <img alt="<?php echo $this->config->item('title'); ?>" class="img-responsive" src="<?php echo base_url('assets/images').'/logo_white_small.png'; ?>">
                    </a>
                </div>
                <div class="col-md-11">
                    <p><i class="fa fa-copyright"></i><?php echo ' Copyright '.date('Y').'. All Rights Reserved.' ?></p>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></span></button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body"></div>
        </div>
    </div>
</div>

<!-- Bootstrap -->
<script src="<?php echo base_url('assets/js').'/bootstrap.min.js'; ?>"></script>
<!-- Validate -->
<script src="<?php echo base_url('assets/js').'/jquery.validate.js'; ?>"></script>
<!-- Datepicker -->
<script src="<?php echo base_url('assets/js').'/bootstrap-datepicker.js'; ?>" type="text/javascript"></script>
<!-- Custom styles for this template -->
<script src="<?php echo base_url('assets/js/theme').'/bootstrap-fileupload.min.js'; ?>"></script>
<script src="<?php echo base_url('assets/js/theme').'/jquery.isotope.min.js'; ?>"></script>
<script src="<?php echo base_url('assets/js/theme').'/owl.carousel.min.js'; ?>"></script>
<script src="<?php echo base_url('assets/js/theme').'/pnotify.custom.js'; ?>"></script>
<script src="<?php echo base_url('assets/js/theme').'/spinner.js'; ?>"></script>
<script src="<?php echo base_url('assets/js/theme').'/theme.js'; ?>"></script>
<script src="<?php echo base_url('assets/js/theme').'/jquery.themepunch.tools.min.js'; ?>"></script>
<script src="<?php echo base_url('assets/js/theme').'/jquery.themepunch.revolution.min.js'; ?>"></script>
<script src="<?php echo base_url('assets/js/theme').'/theme.init.js'; ?>"></script>
<script src="<?php echo base_url('assets/js/theme').'/gallery.js'; ?>"></script>
<script src="<?php echo base_url('assets/js/upload').'/fileinput.min.js'; ?>"></script>
<script src="<?php echo base_url('assets/js').'/app.js'; ?>"></script>
<script src="<?php echo base_url('assets/js').'/style.js'; ?>"></script>
</body>
</html>