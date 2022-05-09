<?php
session_start();
include('filters/auth_filter.php');
include('includes/fonctions.php');
?>
<!-- Affichage du feed -->

<head>
    <link rel="icon" type="image/png" sizes="16x16" href="image/logoDetour.png">
</head>

<body>
    <?php include('partials/_header.php'); ?>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <script>
        // Récupère le post
        $(document).ready(function() {
            $.ajax({
                    url: 'admin.php',
                    type: 'POST',
                    data: {
                        myFunction: 'tableauMem'
                    },
                    dataType: 'json',
                    success: function(data) {
                        for (var d of data) {
                            $("#tableau").append("<tr><td>\
                                            <div class='form-check form-switch'>\
                                                <input class='form-check-input' type='checkbox' id='flexSwitchCheckChecked' checked>\
                                                <label class='form-check-label' for='flexSwitchCheckChecked'></label>\
                                            </div>\
                                        </td>\
                                        <td>\
                                            <img src='https://bootdey.com/img/Content/user_1.jpg' alt=''>\
                                            <h3 class='user-link'>" + d.nomMem + " " + d.preMem + "</h3>\
                                            <span class='user-subhead'>Member</span>\
                                        </td>\
                                        <td class='text-center'>\
                                            <span class='label label-default'>" + d.idMem + "</span>\
                                        </td>\
                                        <td>\
                                            <a href='#'>" + d.mail + "</a>\
                                        </td>\
                                        <td style='width: 20%;'>\
                                            <suppression class='table-link danger' id=" + d.idMem + ">\
                                                <span class='fa-stack'>\
                                                    <i class='fa fa-square fa-stack-2x'></i>\
                                                    <i class='fa fa-trash-o fa-stack-1x fa-inverse'></i>\
                                                </span>\
                                            </suppression>\
                                            </a>\
                                        </td></tr>")
                        }
                    },
                    error: function(data) {}
                }),
                $(document).on('click', 'suppression', function() {
                    var idMem = $(this).attr('id');
                    $.ajax({
                        url: 'delPost.php',
                        type: 'POST',
                        data: {
                            myFunction: 'deleteMem',
                            myParams: {
                                idMem: $(this).attr('id')
                            }
                        },
                        async: false,
                        dataType: 'text',
                        success: function(result) {
                            $('#' + idMem).html("<div class='alert alert-success alert-dismissible fade show' role='alert'>\
                                                <strong>Le membre a bien été supprimé</strong>\
                                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>\
                                                </div>");
                            // $('#' + idMem).parent().parent().remove();
                        },
                        error: function(result) {
                            $("#result").html("<div class='alert alert-warning alert-dismissible fade show' role='alert'> \
                                                                        <strong> Un problème est survenu </strong>\
                                                                        <button type = 'button' class = 'btn-close' data-bs-dismiss = 'alert' aria-label = 'Close'></button><br/>")
                        }
                    });
                })
        })
    </script>




    <div class="container bootstrap snippets bootdey">
        <br>
        <div class="result" id="result"></div>
        <div class="row">
            <div class="col-lg-12">
                <div class="main-box no-header clearfix">
                    <div class="main-box-body clearfix">
                        <div class="table-responsive">
                            <table class="table user-list">
                                <thead>
                                    <tr>
                                        <th><span>Admin</span></th>
                                        <th><span>Nom</span></th>
                                        <th class='text-center'><span>ID</span></th>
                                        <th><span>Email</span></th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody id="tableau">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<style>
    body {
        margin: 0;
        color: #2e323c;
        background: #f5f6fa;
        position: relative;
        height: 100%;
    }

    .main-box.no-header {
        padding-top: 20px;
    }

    .main-box {
        background: #FFFFFF;
        -webkit-box-shadow: 1px 1px 2px 0 #CCCCCC;
        -moz-box-shadow: 1px 1px 2px 0 #CCCCCC;
        -o-box-shadow: 1px 1px 2px 0 #CCCCCC;
        -ms-box-shadow: 1px 1px 2px 0 #CCCCCC;
        box-shadow: 1px 1px 2px 0 #CCCCCC;
        margin-bottom: 16px;
        -webikt-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }

    .table a.table-link.danger {
        color: #e74c3c;
    }

    .label {
        border-radius: 3px;
        font-size: 0.875em;
        font-weight: 600;
    }

    .user-list tbody td .user-subhead {
        font-size: 0.875em;
        font-style: italic;
    }

    .user-list tbody td .user-link {
        display: block;
        font-size: 1.25em;
        padding-top: 3px;
        margin-left: 60px;
    }

    a {
        color: #3498db;
        outline: none !important;
    }

    .user-list tbody td>img {
        position: relative;
        max-width: 50px;
        float: left;
        margin-right: 15px;
    }

    .table thead tr th {
        text-transform: uppercase;
        font-size: 0.875em;
    }

    .table thead tr th {
        border-bottom: 2px solid #e7ebee;
    }

    .table tbody tr td:first-child {
        font-size: 1.125em;
        font-weight: 300;
    }

    .table tbody tr td {
        font-size: 0.875em;
        vertical-align: middle;
        border-top: 1px solid #e7ebee;
        padding: 12px 8px;
    }

    a:hover {
        text-decoration: none;
    }
</style>