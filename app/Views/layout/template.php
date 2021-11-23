<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $title; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- bootstrap css v5.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=B612+Mono|Cabin:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/assets/meranda-master/fonts/icomoon/style.css">

    <link rel="stylesheet" href="/assets/meranda-master/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/meranda-master/css/jquery-ui.css">
    <link rel="stylesheet" href="/assets/meranda-master/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/meranda-master/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/assets/meranda-master/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="/assets/meranda-master/css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="/assets/meranda-master/css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="/assets/meranda-master/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="/assets/meranda-master/css/aos.css">
    <link href="/assets/meranda-master/css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="/assets/meranda-master/css/style.css">


</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <?= $this->include('layout/navbar'); ?>
    <?= $this->renderSection('content'); ?>



    <div class="footer">
        <div class="container">


            <div class="row">
                <div class="col-12">
                    <div class="copyright">
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>
    <!-- .site-wrap -->


    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#ff5e15" />
        </svg></div>

    <script src="/assets/meranda-master/js/jquery-3.3.1.min.js"></script>
    <script src="/assets/meranda-master/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="/assets/meranda-master/js/jquery-ui.js"></script>
    <script src="/assets/meranda-master/js/popper.min.js"></script>
    <script src="/assets/meranda-master/js/bootstrap.min.js"></script>
    <script src="/assets/meranda-master/js/owl.carousel.min.js"></script>
    <script src="/assets/meranda-master/js/jquery.stellar.min.js"></script>
    <script src="/assets/meranda-master/js/jquery.countdown.min.js"></script>
    <script src="/assets/meranda-master/js/bootstrap-datepicker.min.js"></script>
    <script src="/assets/meranda-master/js/jquery.easing.1.3.js"></script>
    <script src="/assets/meranda-master/js/aos.js"></script>
    <script src="/assets/meranda-master/js/jquery.fancybox.min.js"></script>
    <script src="/assets/meranda-master/js/jquery.sticky.js"></script>
    <script src="/assets/meranda-master/js/jquery.mb.YTPlayer.min.js"></script>




    <script src="/assets/meranda-master/js/main.js"></script>

    <!-- JS for Textarea -->
    <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">
        bkLib.onDomLoaded(nicEditors.allTextAreas);
    </script>


</body>

</html>