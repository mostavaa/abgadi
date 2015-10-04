<script src="<?php echo base_url()?>/js/jquery.js"></script>
<script src="<?php echo base_url()?>/js/bootstrap.js"></script>
    <script>
        $(document).ready(function () {
            $("#closeMenu").click(function () {
                $("#mobilesidebar").hide();
            });
            $("#mobileNavigationMenuBtn").click(function () {
                $("#mobilesidebar").show();
            });
        });
    </script>