<?php
session_start(); ?>
<body>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="lib/jquery-ui.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $(function() {
                $.ajax({
                    url: '../myPost.php',
                    type: 'POST',
                    // data: {
                    //     myParams: {
                    //         user_id: $_SESSION['user_id']
                    //     }
                    // },
                    dataType: 'json',
                    success: function(data) {
                        console.log(data.length);
                        for (var d of data) {
                            $("#mesPosts").append("<div class='card'> \
                                        <h5 class = 'card-header' > " + d.title + " </h5> \
                                            <div class = 'card-body' >\
                                            <p class = 'card-text' > " + d.content + " </p> \
                                            <a href = '../post.php?idPubli=" + d.idPubli + "'\
                                            class = 'btn btn-primary' > Accéder au post </a> \
                                            <a href = '#'class = 'btn btn-warning' > Modifier le post </a> \
                                            <a href = '../delPost.php?idPubli=" + d.idPubli + "'\
                                            class = 'btn btn-danger' > Supprimer </a> \
                                            </div></div></br>")
                        }
                    }
                });
            })
        })
    </script>
    <div class="container" id="mesPosts">
        </br></br>
        <?php
        //Mettre en Ajax
        /* while ($question = $getAllMyQuestions->fetch()) {
        ?>
            <div class='card'>
                <h5 class='card-header'><?= $question['title']; ?></h5>
                <div class='card-body'>

                    <p class='card-text'><?= $question['content']; ?></p>
                    <a href='post.php?idPubli=<?= $question['idPubli']; ?>' class='btn btn-primary'>Accéder au post</a>
                    <a href='#' class="btn btn-warning">Modifier le post</a>
                    <a href='delPost.php?idPubli=<?= $question['idPubli']; ?>' class='btn btn-danger'>Supprimer</a>
                </div>
            </div>
            </br>
        <?php
        }*/
        ?>
    </div>
    <div class="container" id="error">
</body>

</html>