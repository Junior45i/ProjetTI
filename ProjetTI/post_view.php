<?php
session_start();
include('filters/auth_filter.php');
include('includes/fonctions.php');
?>

<body>
    <?php include('partials/_header.php'); ?>
    <script>
        var idPublication = <?php echo $_GET['idPubli'] . ";" ?>
        $(document).ready(function() {
            $.ajax({
                url: 'post.php',
                type: 'GET',
                data: {
                    myFunction: 'affichagePost',
                    myParams: {
                        idPubli: idPublication
                    }
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $("#containerPost").append("<section class='show-content'>\
                            <h3>" + data[0].title + "</h3>\
                            <hr>\
                            <p>" + data[0].content + "</p>\
                            <hr>\
                            <small>" + data[0].datePubli + "</small>\
                            </section>\
                            <section class='show-comment'>\
                            <div class='mb-3'>\
                            <label for='exampleInputEmail' class='form-label'>Commentaire</label>\
                            <textarea name='answer' id='answer' class='form-control'></textarea>\
                            <br>\
                            <button class='btn btn-primary' type='submit' name='comment' id='comment'>commenter</button>")
                    $.ajax({
                        url: 'post.php',
                        type: 'GET',
                        data: {
                            myFunction: 'affichageCommentaire',
                            myParams: {
                                idPubli: idPublication
                            }
                        },
                        dataType: 'json',
                        success: function(data) {
                            console.log(d);
                            for (var d of data) {
                                $("#commentaire").append("<div class='card'>\
                                                        <div class='card-header'>" + d.id_auteur + "</div>\
                                                        <div class='card-body'>" + d.contenu + "</div>\
                                                    </div><br/>")
                            }
                        },
                        error: function(data) {
                            console.log(data);
                        }
                    })
                    $("#comment").click(function() {
                        $.ajax({
                            url: 'post.php',
                            type: 'POST',
                            data: {
                                myFunction: 'ajoutCommentaire',
                                myParams: {
                                    idPubli: idPublication,
                                    answer: $("#answer").val()
                                }
                            },
                            async: false,
                            dataType: 'text',
                            success: function(result) {
                                var comment = $("#answer").val();
                                var id = "<?php echo $_SESSION['user_id'] ?>";
                                if(result == "reussi"){
                                $("#alert").html("<div class='alert alert-success alert-dismissible fade show' role='alert'>\
                                                <strong>Le commentaire a été publié</strong>\
                                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>\
                                                </div>");
                                $("#commentaire").prepend("<div class='card'>\
                                                        <div class='card-header'>" + id + "</div>\
                                                        <div class='card-body'>" + comment + "</div>\
                                                    </div><br/>")}
                                else{
                                    $("#alert").html("<div class='alert alert-warning alert-dismissible fade show' role='alert'> \
                                                                        <strong> Merci d'entrer un commentaire </strong>\
                                                                        <button type = 'button' class = 'btn-close' data-bs-dismiss = 'alert' aria-label = 'Close'></button><br/>")
                                }
                            },
                        })
                    })
                },
                error: function(data) {
                    console.log(data);
                }
            })
        })
    </script>
    <br><br>
    <div class="alert" id="alert"></div>
    <div class="container" id="containerPost">
    </div>
    <div class="container" id="commentaire">

    </div>
    </section>

    <?php
    ?>
    </div>
</body>

</html>