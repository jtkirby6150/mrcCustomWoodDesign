<footer>
    <?php
    $getCompanyInfo = query("SELECT * FROM company_info WHERE id = 1");
    confirm($getCompanyInfo);
    while($row = fetch_array($getCompanyInfo)){
        $name = $row['name'];
        $facebook = $row['facebook'];
    }
    ?>



    <div class="row">
        <div class="col">
            <div>
                <p>All rights reserved &copy; <?php echo $name ?>
                    <script type="text/javascript">
                        var cur = 2020;
                        var year = new Date();
                        if (cur == year.getFullYear()) year = year.getFullYear();
                        else year = cur + ' - ' + year.getFullYear();
                        document.write(year);
                    </script>
                </p>
            </div>
        </div>
        <div class="col">
            <div>
                <p style="text-align: center;">Visit us on&nbsp;<a href="<?php echo $facebook; ?>" target="_blank"><i class="fa fa-facebook" style="font-size: 30px;color: rgb(0,0,0);"></i></a>&nbsp;</p>
            </div>
        </div>
    </div>
</footer>
</div>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/js/bs-init.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
</body>

</html>