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
    <div class="container">
        <div class="table-wrap">
            <table class="table table-borderless table-responsive">
                <thead>
                    <tr>
                        <th></th>
                        <th class="text-muted fw-600">Email</th>
                        <th class="text-muted fw-600">Username</th>
                        <th class="text-muted fw-600">Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="align-middle alert" role="alert">
                        <td>
                            <input type="checkbox" id="check">
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="img-container">
                                    <img src="https://images.pexels.com/photos/2379005/pexels-photo-2379005.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                                </div>
                                <div class="ps-3">
                                    <div class="fw-600 pb-1">mark@gmail.com</div>
                                    <p class="m-0 text-grey fs-09">Added: 03/02/2012</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="fw-600">Markov98</div>
                        </td>
                        <td>
                            <div class="d-inline-flex align-items-center active">
                                <div class="circle"></div>
                                <div class="ps-2">Active</div>
                            </div>
                        </td>
                        <td>
                            <div class="btn p-0" data-bs-dismiss="alert">
                                <span class="fas fa-times"></span>
                            </div>
                        </td>
                    </tr>
                    <tr class="align-middle alert" role="alert">
                        <td>
                            <input type="checkbox" id="check" checked>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="img-container">
                                    <img src="https://images.pexels.com/photos/1222271/pexels-photo-1222271.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                                </div>
                                <div class="ps-3">
                                    <div class="fw-600 pb-1">harry@gmail.com</div>
                                    <p class="m-0 text-grey fs-09">Added: 03/02/2012</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="fw-600">Harry2020</div>
                        </td>
                        <td>
                            <div class="d-inline-flex align-items-center waiting">
                                <div class="circle"></div>
                                <div class="ps-2">Waiting for Reassignment</div>
                            </div>
                        </td>
                        <td>
                            <div class="btn p-0" data-bs-dismiss="alert">
                                <span class="fas fa-times"></span>
                            </div>
                        </td>
                    </tr>
                    <tr class="align-middle alert" role="alert">
                        <td>
                            <input type="checkbox" id="check">
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="img-container">
                                    <img src="https://images.pexels.com/photos/2379005/pexels-photo-2379005.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                                </div>
                                <div class="ps-3">
                                    <div class="fw-600 pb-1">mark@gmail.com</div>
                                    <p class="m-0 text-grey fs-09">Added: 03/02/2012</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="fw-600">Markov98</div>
                        </td>
                        <td>
                            <div class="d-inline-flex align-items-center active">
                                <div class="circle"></div>
                                <div class="ps-2">Active</div>
                            </div>
                        </td>
                        <td>
                            <div class="btn p-0" data-bs-dismiss="alert">
                                <span class="fas fa-times"></span>
                            </div>
                        </td>
                    </tr>
                    <tr class="align-middle alert" role="alert">
                        <td>
                            <input type="checkbox" id="check">
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="img-container">
                                    <img src="https://images.pexels.com/photos/1222271/pexels-photo-1222271.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                                </div>
                                <div class="ps-3">
                                    <div class="fw-600 pb-1">harry@gmail.com</div>
                                    <p class="m-0 text-grey fs-09">Added: 03/02/2012</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="fw-600">Harry2020</div>
                        </td>
                        <td>
                            <div class="d-inline-flex align-items-center waiting">
                                <div class="circle"></div>
                                <div class="ps-2">Waiting for Reassignment</div>
                            </div>
                        </td>
                        <td>
                            <div class="btn p-0" data-bs-dismiss="alert">
                                <span class="fas fa-times"></span>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Roboto', sans-serif;

    }

    body {
        background-color: #E1F5FE;
    }

    .container {
        margin-top: 50px;
    }

    .container .table-wrap {
        overflow-x: auto;
    }

    .container .table-wrap::-webkit-scrollbar {
        height: 5px;
    }

    .container .table-wrap::-webkit-scrollbar-thumb {
        border-radius: 5px;
        background-image: linear-gradient(to right, #5D7ECD, #0C91E6);
    }


    .table>:not(caption)>*>* {
        padding: 2rem 0.5rem;
    }

    .table tbody td input[type="checkbox"] {
        appearance: none;
        width: 20px;
        height: 20px;
        background-color: #eee;
        position: relative;
        border-radius: 3px;
        cursor: pointer;
    }

    .table tbody td input[type="checkbox"]:after {
        position: absolute;
        width: 100%;
        height: 100%;
        font-family: "Font Awesome 5 Free";
        font-weight: 600;
        content: "\f00c";
        color: #fff;
        font-size: 15px;
        display: none;
    }

    .table tbody td input[type="checkbox"]:checked,
    .table tbody td input[type="checkbox"]:checked:hover {
        background-color: #40bfc1;
    }

    .table tbody td input[type="checkbox"]:checked::after {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .table tbody td input[type="checkbox"]:hover {
        background-color: #ddd;
    }

    .table tbody td .img-container {
        width: 50px;
        height: 50px;
    }

    .table tbody td .img-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
    }

    .table tbody,
    .table thead {
        background-color: #fff;
    }

    .table tbody tr td:nth-of-type(1) {
        text-align: center;
        min-width: 70px;
        max-width: 70px;
    }

    .table tbody tr td:nth-of-type(2) {
        min-width: 300px;
        max-width: 300px;
    }


    .table tbody tr td:nth-of-type(3) {
        min-width: 150px;
        max-width: 150px;
    }

    .table tbody tr td:nth-of-type(4) {
        min-width: 300px;
        max-width: 300px;
    }

    .table tbody tr td:nth-of-type(5) {
        min-width: 50px;
        max-width: 50px;
    }

    .table tbody tr {
        box-shadow: 0px 2px 3px #1f1f1f1a;
    }

    .table thead tr {
        border-bottom: 4px solid #E1F5FE;
    }

    .table tbody td .active,
    .table tbody td .waiting {
        background-color: #B9F6CA;
        color: #388E3C;
        font-weight: 600;
        padding: 1px 10px;
        border-radius: 15px;
        font-size: 0.9rem;
    }

    .table tbody td .waiting {
        background-color: #FFECB3;
        color: #FFA000;
    }

    .table tbody td .active .circle,
    .table tbody td .waiting .circle {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background-color: #388E3C;
    }

    .table tbody td .waiting .circle {
        background-color: #FFA000;
    }

    .table tbody td .fa-times {
        color: #D32F2F;
        font-size: 0.9rem;
    }

    .fw-600 {
        font-weight: 600 !important;
    }

    .fs-09 {
        font-size: 0.9rem;
        font-weight: 500;
    }

    .text-grey {
        color: #a8a8a8 !important;
    }


    @media(min-width: 992px) {
        .container .table-wrap {
            overflow: hidden;
        }
    }
</style>