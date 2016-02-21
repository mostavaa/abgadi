<script src="<?php echo base_url()?>/js/jquery.js"></script>
<script src="<?php echo base_url()?>/js/bootstrap.js"></script>
<script>
    $(document).ready(function () {
        $("#mobilesidebarright").click(function () {
            $("#mobilesidebarContainer").hide();
        });
        $("#mobileNavigationMenuBtn").click(function () {
            $("#mobilesidebarContainer").show();
        });

       
    });
</script>
