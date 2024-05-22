<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message Sent</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #4F7942;
            text-align: center;
        }
        .container {
            max-width: 600px;
            margin: 100px auto;
            padding: 20px;
            background-color:#A4ED8E;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .image {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }
        h2 {
            color: #333;
        }

        .btns {
            display: inline-block;
            width: 277px;
            padding: 10px 20px;
            background-color: #F46A6A;
            border: none;
            border-radius: 30px;
            text-align: center;
            color: #fff;
            text-decoration: none;
            cursor: pointer;
            margin-bottom: 10px;
            margin-top: 5px ;
            transition: background-color 0.3s ease;
        }
        .btns:hover, .btn:focus {
            background-color: #FA0101;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="contact.png" alt="Message Sent" class="image">
        <h2>Message Sent</h2>
        <p>Your message has been successfully sent.</p>
      <a href="home.php" class="btns">Back to home</a>
    </div>
</body>
</html>
