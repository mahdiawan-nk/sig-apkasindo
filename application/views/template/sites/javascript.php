
<script src="<?= base_url('assets/sites/') ?>vendor/bootstrap/js/bootstrap.min.js"></script>

<script src="<?= base_url('assets/sites/') ?>assets/js/isotope.min.js"></script>
<script src="<?= base_url('assets/sites/') ?>assets/js/owl-carousel.js"></script>
<!-- <script src="<?= base_url('assets/sites/') ?>assets/js/wow.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js" integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?= base_url('assets/sites/') ?>assets/js/tabs.js"></script>
<script src="<?= base_url('assets/sites/') ?>assets/js/popup.js"></script>
<script src="<?= base_url('assets/sites/') ?>assets/js/custom.js"></script>

<script>
    function bannerSwitcher() {
        next = $('.sec-1-input').filter(':checked').next('.sec-1-input');
        if (next.length) next.prop('checked', true);
        else $('.sec-1-input').first().prop('checked', true);
    }

    var bannerTimer = setInterval(bannerSwitcher, 5000);

    $('nav .controls label').click(function() {
        clearInterval(bannerTimer);
        bannerTimer = setInterval(bannerSwitcher, 5000)
    });
</script>