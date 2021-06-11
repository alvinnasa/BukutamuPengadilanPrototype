<?php 
  $con = mysqli_connect('localhost','root','','pengadilancilacap') or die("ERROR");
?>
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Jekyll v3.8.6">
        <title>Bootstrap 4 jQuery UI Signature - rhalp10</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/jumbotron/">

        <!-- Bootstrap core CSS -->
        <link href="https://getbootstrap.com/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <!-- jQuery UI Signature core CSS -->
        <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">
        <link href="../assets/css/jquery.signature.css" rel="stylesheet">

        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">

        <!-- Favicons -->
        <link rel="apple-touch-icon" href="https://getbootstrap.com/docs/4.4/../assets/img/favicons/apple-touch-icon.png" sizes="180x180">
        <link rel="icon" href="https://getbootstrap.com/docs/4.4/../assets/img/favicons/apple-touch-icon.png" sizes="32x32" type="image/png">
        <link rel="icon" href="https://getbootstrap.com/docs/4.4/../assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
        <link rel="mask-icon" href="https://getbootstrap.com/docs/4.4/../assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
        <link rel="icon" href="https://getbootstrap.com/docs/4.4/../assets/img/favicons/safari-pinned-tab.svg">
        <meta name="msapplication-config" content="https://getbootstrap.com/docs/4.4/../assets/img/favicons/browserconfig.xml">
        <meta name="theme-color" content="#563d7c">

        <style>
            .kbw-signature {
                width: 400px;
                height: 200px;
            }
            .row {
                 max-width: 500px;
                 margin: auto;
                 background: white;
                 padding:10px;
            
                 }
            
        </style>
        <!-- Custom styles for this template -->
        <link href="https://getbootstrap.com/docs/4.4/examples/jumbotron/jumbotron.css" rel="stylesheet">
    </head>

    <body>
      

        <main role="main">

            <div class="container">
                
                <div class="row">
                    <div class="col-md-6">
                        <h2>Tanda Tangan Disini</h2>
                        <div id="signatureContainer"></div>
                        <form id="signatureForm">
                            <div class="form-group">
                                <label for="inputSignatureName">ID Tamu Anda</label>
                                <input type="text" class="form-control" id="inputSignatureName" name="signatureName" required="">
                            </div>
                            <button class="btn btn-outline-success" id="submit">SUBMIT</button>
                          
                        </form>
                       
                    </div>
                    
                </div>

                <hr>

            </div>
            <!-- /container -->

        </main>

        <footer class="container">
      
        </footer>

        <!--[if IE]>
<script src="excanvas.js"></script>
<![endif]-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="../assets/js/jquery.signature.js"></script>

        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

        <script>
            $(function() {
                const urlParams = new URLSearchParams(window.location.search);
                const id = urlParams.get('id');
                const idtamu = urlParams.get('idttd');

                $('#inputSignatureName').val(urlParams.get('nama'));
                console.log(id);
                var signatureTable = $('#signatureTable').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "order": [],
                    "ajax": {
                        url: "fetchTable.php",
                        type: "POST",
                        data:{"id" : id }

                    },
                    "columnDefs": [{
                        "targets": [0],
                        "orderable": false,
                    }, ],

                });
                var signatureContainer = $('#signatureContainer').signature();
                $('#disable').click(function() {
                    var disable = $(this).text() === 'Disable';
                    $(this).text(disable ? 'Enable' : 'Disable');
                    signatureContainer.signature(disable ? 'disable' : 'enable');
                });
                $('#clear').click(function() {
                    signatureContainer.signature('clear');
                });
                $('#json').click(function() {
                    if (signatureContainer.signature('isEmpty')) {
                        return alert("Signature Canvas Is Empty");
                    }

                    $.ajax({
                        url: "action.php",
                        method: 'POST',
                        data: {
                            action: "saveJson",
                            signature: signatureContainer.signature('toJSON')
                        },
                        dataType: 'json',
                        success: function(data) {
                            alert(data.msg);
                            signatureTable.ajax.reload();
                        }
                    });

                });
                $('#svg').click(function() {

                    if (signatureContainer.signature('isEmpty')) {
                        return alert("Signature Canvas Is Empty");
                    }

                    $.ajax({
                        url: "action.php",
                        method: 'POST',
                        data: {
                            action: "saveSVG",
                            signature: signatureContainer.signature('toSVG')
                        },
                        dataType: 'json',
                        success: function(data) {
                            alert(data.msg);

                            signatureTable.ajax.reload();
                        }
                    });

                });
                signatureContainer.signature({
                    color: '#0080FF'
                });

                $(document).on('click', '#loadSignature', function() {
                    var person_ID = $(this).attr("data-id");
                    $.ajax({
                        url: "action.php",
                        method: 'POST',
                        data: {
                            action: "load",
                            "person_ID": person_ID
                        },
                        dataType: 'json',
                        success: function(data) {
                            signatureContainer.signature('draw', data.Signature);
                        }
                    });

                });
               $(document).on('click', '#deleteSignature', function() {
                var person_ID = $(this).attr("data-id");
                   $.ajax({
                        url: "action.php",
                        method: 'POST',
                        data: {
                            action: "delete",
                            "idtamu": idtamu
                        },
                        dataType: 'json',
                        success: function(data) {
                            alert(data.msg);
                            signatureTable.ajax.reload();
                        }
                    });
                });
                

                $(document).on('submit', '#signatureForm', function(event) {
                    event.preventDefault();
                    var formData = new FormData(this);
                    if (signatureContainer.signature('isEmpty')) {

                        return alert("Signature  Is required");

                    }
                    formData.append("action", "submit");
                    formData.append("idtamu", idtamu);
                    formData.append("signature", signatureContainer.signature('toSVG'));
                       $.ajax({
                        url: "action.php",
                        method: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        dataType: 'json',
                        success: function(data) {
                            alert(data.msg);
                            signatureTable.ajax.reload();
                        }
                    });
                });

            });
        </script>

    </body>

    </html>