<?php
Utils::verificarSessao();
header('Content-Type: text/html; charset=ISO-8859-1');
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Administrativo</title>
    <link rel="stylesheet" href="css/estilo1.css" />
    <link rel="stylesheet" href="css/style.css" />
    <script src="js/utils.js"></script>
    <link type="text/css" rel="stylesheet" href="js/jquery/ui.datepicker.css" />
    <link type="text/css" rel="stylesheet" href="js/jquery/ui.core.css" /> 
    <link type="text/css" rel="stylesheet" href="js/jquery/ui.theme.css" /> 
    <script type="text/javascript" src="js/jquery/jquery-1.3.2.js"></script>                
    <script type="text/javascript" src="js/jquery/ui.datepicker.js"></script>    
    <script type="text/javascript" src="js/calendario.js"></script>   
    <script type="text/javascript" src="js/mascaras.js"></script>   
    <script type="text/javascript" src="js/ajax.js"></script>   
    <script src="myscripts.js" charset="iso-8859-1"></script> 
    <script language=\'javascript\'>
        $(document).ready(function() {
            $('ul#nav-menu > li > a').click(function() {
                $(this).next().slideToggle();
            });
        });</script>
    <script language=\'javascript\'>
        $(document).ready(function() {
            $('ul#nav-menu > li > a').click(function() {
                $(this).next().slideToggle();
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#datepicker").datepicker();
        });
        $(document).ready(function() {
            $("#datepicker2").datepicker();
        });
        $(document).ready(function() {
            $("#datepicker3").datepicker();
        });
    </script>
</head>