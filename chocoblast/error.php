<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'erreur</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-2H71yMBK5e5c5W0A8wHLMtZmTUaZfgm42n+mX9+rDIoHk/JJyB1nCK1EMnFcI2OKl/tJiiZnWyGJM+uyzY6VQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f6f6;
        }
        .container {
            width: 80%;
            max-width: 600px;
            margin: 0 auto;
            text-align: center;
            padding: 50px;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0px 5px 10px rgba(0,0,0,0.1);
        }
        h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }
        p {
            font-size: 18px;
            margin-bottom: 20px;
        }
        a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4caf50;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        a:hover {
            background-color: #3e8e41;
        }

          /* Définit l'animation "spin" */
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* Applique l'animation "spin" à l'élément img lorsqu'il est survolé */
    #icon {
        animation: spin 2s linear infinite;
    }
    </style>
</head>
<body>
    <div class="container">
        <h1>Oops, une erreur est survenue !</h1>
        <p>Nous sommes désolés, mais la page que vous cherchez n'a pas pu être trouvée </p>
        <img src="https://img.icons8.com/external-others-iconmarket/64/null/external-cogwheels-user-experience-others-iconmarket-3.png" id="icon">

