<html>

<head>
    <link type="text/css" href="style.css" rel="stylesheet">

    <title>Meet Point</title>
</head>

<body>
    <div id="mainContainer">
        <div id="mainTitle">
            Meet Point Logo Here
        </div>

        <div id="content">
            Hai, Kami masih dalam tahap pengembangan. Untuk mendapatkan update mengenai meetpoint langsung di email inbox anda, silahkan masukan alamat email anda ke form dibawah ini
        </div>

        <div id="subscribe">
        <?php 
            if ( !empty ($_REQUEST['subscribe']) ) 
            {
            
                if ( $_REQUEST['subscribe']=="success" )
                {
        ?>
            
            <span>
            Terima kasih, email anda sudah didaftarkan ke daftar kami
            </span>
            <?php
                }
                else if ( $_REQUEST['subscribe']=="badEmail" )
                {
                    echo "<span>Maaf, email yang anda masukan tidak valid. Coba sekali lagi</span>";
                } 
                else {
            ?>
            <span>
            Uh Oh, Kami mohon maaf, nampaknya ada masalah di sistem kami. Coba lagi beberapa saat lagi ;)
            </span>
            <?php
                }
            ?>
            
        <?php
            }

            else

            {
        ?>
            <form action="subscribe.php" id="subscribe-form" method="POST">
            Subscribe : <input type="text" size ="20" name="email" value="">
            <button class="button large blue"><span>Subscribe!</span></button> 
            </form>
            
        <?php
            }
        ?>
        </div> 

        <div id="footer">
            meetpoint &#169; dan seluruh trademark
        </div>
    <div>

    


</body>

</html>
