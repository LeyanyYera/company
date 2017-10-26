<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="default.css">
    <title>Title</title>
</head>
<body>

    <div class="container border">
        <h3 class="center">El valor de las empresas</h3>

        <div class="graphics"></div>

        <h4 class="right"></h4>

        <div id="table"></div>
    </div>

    <div class="container form">
        <h4>Alta </h4>
        <form action="" method="post" id="company" >
            <div >
                <label for="name">Nombre:</label>
                <input type="text" name="name" id="name" required />
            </div>
            <div >
                <label for="name">Valor:</label>
                <input type="number" name="value" id="value" required />
            </div>
            <div>
                <label for="name">Color:</label>
                <input type="color" name="color" id="color" required />
            </div>
            <div class="add_button">
                <input type="submit" value="Agregar" />
            </div>
            <input type="hidden" value="new" name="action">
        </form>
    </div>

    <script type="text/javascript" src="company.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

    <script>
        $(document).ready(function () {
            base.init();
            base.new();
        })
    </script>
</body>
</html>