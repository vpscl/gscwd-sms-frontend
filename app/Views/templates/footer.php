    <!-- jquery -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <!-- <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js" defer></script> -->
    <script src="assets/js/jquery.dataTables.min.js" defer></script>

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <!-- custom script -->
    <script src="assets/js/main.js"></script>
    <?php  if (current_url() !== base_url() . "/printreport" && current_url() !== base_url() . "/printreport-staff" && current_url() !== base_url() . "/printslip" ) {?>
        <script src="assets/js/navbar.js"></script>
    <?php }
?>
    <!-- <script src="assets/js/login.js"></script> -->

    <!-- md5 hash -->
    <script src="https://cdn.jsdelivr.net/npm/md5-js-tools@1.0.2/lib/md5.min.js"></script>

    <!-- jquery easing -->
    <?php if (current_url() !== base_url() . "/login") {
        echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js' integrity='sha512-0QbL0ph8Tc8g5bLhfVzSqxe9GERORsKhIn1IrpxDAgUsbBGz/V7iSav2zzW325XGd1OMLdL4UiqRJj702IeqnQ==' crossorigin='anonymous' referrerpolicy='no-referrer'></script>";
    } ?>
    