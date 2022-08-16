<!doctype html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
    <meta charset="utf-8"/>
</head>
<body style="">

<!-- Begin shared CSS values -->
<style class="shared-css" type="text/css">
    .t {
        font-family: Arial, Helvetica, sans-serif;

        transform-origin: bottom left;
        z-index: 2;
        position: absolute;
        white-space: pre;
        overflow: visible;
        line-height: 1.5;
    }

    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
        page-break-after: always;
    }
</style>
<!-- End shared CSS values -->

<!-- Begin inline CSS -->
<style type="text/css">

    #t1_1 {
        left: 130px;
        bottom: 1198px;
        letter-spacing: -0.1px;
    }

    #t2_1 {
        left: 348px;
        bottom: 1173px;
        letter-spacing: -0.09px;
    }

    #t3_1 {
        left: 661px;
        bottom: 1230px;
        letter-spacing: -0.09px;
    }

    #t4_1 {
        left: 761px;
        bottom: 1209px;
        letter-spacing: -0.1px;
    }

    #t5_1 {
        left: 626px;
        bottom: 1186px;
        letter-spacing: -0.09px;
        word-spacing: 0.01px;
    }

    #t6_1 {
        left: 767px;
        bottom: 1166px;
        letter-spacing: -0.1px;
    }

    #t7_1 {
        left: 134px;
        bottom: 1153px;
        letter-spacing: -0.14px;
        word-spacing: 0.02px;
    }

    #t8_1 {
        left: 115px;
        bottom: 1140px;
        letter-spacing: -0.14px;
        word-spacing: -0.02px;
    }

    #t9_1 {
        left: 638px;
        bottom: 1144px;
        letter-spacing: -0.09px;
    }

    #ta_1 {
        left: 97px;
        bottom: 1072px;
        letter-spacing: -0.1px;
    }

    #tb_1 {
        left: 169px;
        bottom: 1072px;
        letter-spacing: -0.09px;
    }

    #tc_1 {
        left: 468px;
        bottom: 1072px;
        letter-spacing: -0.11px;
    }

    #td_1 {
        left: 564px;
        bottom: 1072px;
        letter-spacing: -0.1px;
    }

    #te_1 {
        left: 647px;
        bottom: 1072px;
        letter-spacing: -0.1px;
        word-spacing: -0.12px;
    }

    #tf_1 {
        left: 82px;
        bottom: 1050px;
        letter-spacing: -0.12px;
        word-spacing: 0.02px;
    }

    #tg_1 {
        left: 169px;
        bottom: 1050px;
        letter-spacing: -0.11px;
    }

    #th_1 {
        left: 647px;
        bottom: 1050px;
        letter-spacing: -0.11px;
    }

    #ti_1 {
        left: 113px;
        bottom: 1029px;
        letter-spacing: -0.12px;
    }

    #tj_1 {
        left: 169px;
        bottom: 1029px;
        letter-spacing: -0.09px;
    }

    .visnovoc-content {
        margin-top: 280px;
        margin-left: 6%;
        letter-spacing: 0.16px;
    }

    .mt-t-4 {
        margin-top: 15px;
    }

    .mt-t-3 {
        margin-top: 5px;
    }

    .visnovoc-footer {
        margin-left: 6%;
        letter-spacing: 0.16px;
    }

    .visus-b {
        /*display: flex;*/
        /*flex-direction: column;*/
    }

    .visus-b-item {
        display: block;
        width: 100%;
        float: none !important;
    }

    .visus-b-l {
        width: 49%;
        display: block;
        padding-right: 1%;
        float: left
    }

    .visus-b-r {
        width: 50%;
        display: block;

        float: left
    }

    hr {
        display: block;
        width: 100%;
        float: none !important;
        margin-top: 0px !important;
        margin-bottom: 0px !important;
        border-bottom: none;
        border-top: none;
    }

    .visus-b-od-os .od-os {
        float: left;
    }

    /*#tk_1{left:54px;bottom:971px;letter-spacing:0.16px;}*/
    /*#tl_1{left:54px;bottom:949px;letter-spacing:-0.09px;}*/
    /*#tm_1{left:54px;bottom:927px;letter-spacing:-0.08px;word-spacing:-0.02px;}*/
    /*#tn_1{left:54px;bottom:905px;letter-spacing:-0.09px;word-spacing:0.01px;}*/
    /*#to_1{left:54px;bottom:868px;letter-spacing:0.16px;word-spacing:-0.01px;}*/
    /*#tp_1{left:54px;bottom:846px;letter-spacing:-0.09px;}*/
    /*#tq_1{left:54px;bottom:824px;letter-spacing:-0.08px;word-spacing:-0.02px;}*/
    /*#tr_1{left:54px;bottom:802px;letter-spacing:-0.09px;word-spacing:0.01px;}*/
    /*#ts_1{left:54px;bottom:743px;letter-spacing:0.15px;word-spacing:-0.01px;}*/
    /*#tt_1{left:63px;bottom:724px;letter-spacing:0.11px;word-spacing:-0.02px;}*/
    /*#tu_1{left:172px;bottom:724px;letter-spacing:0.08px;word-spacing:0.01px;}*/
    /*#tv_1{left:452px;bottom:727px;letter-spacing:0.11px;word-spacing:-0.02px;}*/
    /*#tw_1{left:561px;bottom:727px;letter-spacing:0.08px;word-spacing:0.01px;}*/
    /*#tx_1{left:63px;bottom:706px;letter-spacing:0.1px;}*/
    /*#ty_1{left:452px;bottom:706px;letter-spacing:0.1px;}*/
    /*#tz_1{left:63px;bottom:690px;letter-spacing:0.07px;}*/
    /*#t10_1{left:452px;bottom:690px;letter-spacing:0.07px;}*/
    /*#t11_1{left:63px;bottom:675px;letter-spacing:0.09px;}*/
    /*#t12_1{left:452px;bottom:675px;letter-spacing:0.09px;}*/
    /*#t13_1{left:63px;bottom:659px;letter-spacing:0.11px;word-spacing:-0.02px;}*/
    /*#t14_1{left:452px;bottom:659px;letter-spacing:0.11px;word-spacing:-0.02px;}*/
    /*#t15_1{left:63px;bottom:643px;letter-spacing:0.12px;word-spacing:-0.02px;}*/
    /*#t16_1{left:452px;bottom:643px;letter-spacing:0.12px;word-spacing:-0.02px;}*/
    /*#t17_1{left:63px;bottom:628px;letter-spacing:0.1px;}*/
    /*#t18_1{left:63px;bottom:613px;}*/
    /*#t19_1{left:452px;bottom:628px;letter-spacing:0.1px;}*/
    /*#t1a_1{left:452px;bottom:613px;}*/
    /*#t1b_1{left:63px;bottom:597px;letter-spacing:0.1px;}*/
    /*#t1c_1{left:452px;bottom:597px;letter-spacing:0.1px;}*/
    /*#t1d_1{left:54px;bottom:551px;letter-spacing:0.16px;}*/
    /*#t1e_1{left:54px;bottom:528px;letter-spacing:-0.09px;}*/
    /*#t1f_1{left:54px;bottom:506px;letter-spacing:-0.08px;word-spacing:-0.02px;}*/
    /*#t1g_1{left:54px;bottom:484px;letter-spacing:-0.09px;word-spacing:0.01px;}*/
    /*#t1h_1{left:54px;bottom:448px;letter-spacing:0.15px;word-spacing:0.13px;}*/
    /*#t1i_1{left:54px;bottom:426px;letter-spacing:-0.09px;}*/
    /*#t1j_1{left:54px;bottom:403px;letter-spacing:-0.08px;word-spacing:-0.02px;}*/
    /*#t1k_1{left:54px;bottom:381px;letter-spacing:-0.09px;word-spacing:0.01px;}*/
    /*#t1l_1{left:54px;bottom:345px;letter-spacing:0.16px;}*/
    /*#t1m_1{left:54px;bottom:323px;letter-spacing:-0.09px;}*/
    /*#t1n_1{left:54px;bottom:301px;letter-spacing:-0.08px;word-spacing:-0.02px;}*/
    /*#t1o_1{left:54px;bottom:279px;letter-spacing:-0.07px;word-spacing:-0.06px;}*/
    /*#t1p_1{left:409px;bottom:188px;letter-spacing:-0.1px;word-spacing:0.01px;}*/
    /*#t1q_1{left:63px;bottom:151px;letter-spacing:-0.11px;word-spacing:-0.02px;}*/
    /*#t1r_1{left:63px;bottom:134px;letter-spacing:-0.12px;word-spacing:-0.03px;}*/
    /*#t1s_1{left:63px;bottom:92px;letter-spacing:-0.11px;word-spacing:0.02px;}*/
    /*#t1t_1{left:409px;bottom:92px;letter-spacing:-0.11px;word-spacing:0.02px;}*/

    .font-bold {
        font-weight: bold;

    }

    .font-bold span {
        font-weight: normal;
    }

    .s1_1 {
        font-size: 17px;
        font-family: Arial, Helvetica, sans-serif;

        /*font-family: Carlito_8;*/
        color: #000;
    }

    .s2_1 {
        font-size: 17px;
        /*font-family: Arial, Helvetica, sans-serif;*/
        font-weight: bold;
        /*font-family: Carlito-Bold_d;*/
        color: #000;
    }

    .s3_1 {
        font-size: 11px;
        /*font-family: Carlito_8;*/
        /*font-family: Arial, Helvetica, sans-serif;*/

        color: #000;
    }

    .s4_1 {
        font-size: 18px;
        /*font-family: Arial, Helvetica, sans-serif;*/
        font-weight: bold;
        color: #000;
    }

    .s5_1 {
        font-size: 12px;
        /*font-family: Carlito_8;*/
        /*font-family: Arial, Helvetica, sans-serif;*/

        color: #000;
    }

    .s6_1 {
        font-size: 12px;
        /*font-family: Carlito_8;*/
        /*font-family: Arial, Helvetica, sans-serif;*/

        color: #000;
    }

    .s7_1 {
        font-size: 14px;
        /*font-family: Carlito_8;*/
        /*font-family: Arial, Helvetica, sans-serif;*/

        color: #000;
    }
</style>
<!-- End inline CSS -->

<!-- Begin embedded font definitions -->
<style id="fonts1" type="text/css">

    @font-face {
        font-family: Carlito-Bold_d;
        src: url("{{asset('platform/fonts/Carlito-Bold_d.woff')}}") format("woff");
    }

    @font-face {
        font-family: Carlito_8;
        src: url("{{asset('platform/fonts/Carlito_8.woff')}}") format("woff");
    }

</style>
<!-- End embedded font definitions -->

<div id="app" style="overflow: hidden; position: relative; background-color: white; width: 909px; height: 1286px;">


    <router-view></router-view>
</div>
<script src="{{asset('backasset')}}/plugins/jquery/jquery.min.js"></script>
<script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
