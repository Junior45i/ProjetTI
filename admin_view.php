<?php
session_start();
include('filters/auth_filter.php');
include('filters/admin_filter.php');
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
                            if (d.administrateur == 1) {
                                $("#tableau").append("<tr><td>\
                                            <div class='form-check form-switch'>\
                                                <input class='form-check-input' type='checkbox' id='" + d.idMem + "' Checked>\
                                                <label class='form-check-label' ></label>\
                                            </div>\
                                        </td>\
                                        <td>\
                                            <img src='https://bootdey.com/img/Content/user_1.jpg' alt=''>\
                                            <h3 class='user-link'>" + d.nomMem + " " + d.preMem + "</h3>\
                                            <span class='user-subhead'>Admin</span>\
                                        </td>\
                                        <td class='text-center'>\
                                            <span class='label label-default'>" + d.idMem + "</span>\
                                        </td>\
                                        <td>\
                                            <a>" + d.mail + "</a>\
                                        </td>\
                                        <td style='width: 20%;'>\
                                            <a class='table-link danger'>\
                                            <suppression class='table-link danger' id=" + d.idMem + ">\
                                                <span class='fa-stack'>\
                                                    <i class='fa fa-square fa-stack-2x'></i>\
                                                    <i class='fa fa-trash-o fa-stack-1x fa-inverse'></i>\
                                                </span>\
                                            </suppression>\
                                            </a>\
                                        </td></tr>")
                            } else {
                                $("#tableau").append("<tr><td>\
                                            <div class='form-check form-switch'>\
                                                <input class='form-check-input' type='checkbox' id='" + d.idMem + "'>\
                                                <label class='form-check-label' for=''></label>\
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
                                            <a>" + d.mail + "</a>\
                                        </td>\
                                        <td style='width: 20%;'>\
                                            <a class='table-link danger'>\
                                            <suppression class='table-link danger' id=" + d.idMem + ">\
                                                <span class='fa-stack'>\
                                                    <i class='fa fa-square fa-stack-2x'></i>\
                                                    <i class='fa fa-trash-o fa-stack-1x fa-inverse'></i>\
                                                </span>\
                                            </suppression>\
                                            </a>\
                                        </td></tr>")
                            }
                        }
                    },
                    error: function(data) {}
                }), $("#search").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#tableau div").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                }),
                $(document).on('click', 'input', function() {
                    var idMembre = $(this).attr('id');
                    var util = 0;
                    if (this.checked) {
                        var util = 1;
                    } else {
                        var util = 0;
                    }
                    $.ajax({
                        url: 'admin.php',
                        type: 'POST',
                        data: {
                            myFunction: 'setAdmin',
                            myParams: {
                                idMem: idMembre,
                                changeAdmin: util
                            }
                        },
                        async: false,
                        // dataType: 'text',
                        success: function(result) {},
                        error: function(result) {}
                    });
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
                            $('#' + idMem).parent().parent().parent().html("<div class='alert alert-success alert-dismissible fade show' role='alert'>\
                                                <strong>Le membre a bien été supprimé</strong>\
                                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>\
                                                </div>");
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
            <form>
                <div class="form-group row">
                    <div class="col-6">
                        <div class="input-group rounded">
                            <span class="input-group-text border-0" id="search-addon">
                                <i class="fas fa-search"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                    </svg></i>
                            </span>
                            <input type="search" name="search" id="search" class="form-control rounded" Placeholder="Recherche" aria-label="Search" aria-describedby="search-addon">
                        </div>
                    </div>
                    <!-- <div class="col-4">
                                                <button class="btn btn-success" id="search" type="submit">Rechercher</button>
                                            </div> -->
                </div>
            </form>
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