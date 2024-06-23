<!DOCTYPE html>
<html>
<head>
  <title>Duyuru Ekleme Sayfası</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      
      margin: 0;
      padding: 0;
      
      background-image: url(images/musteriarkaplan.jpg);
      background-repeat: no-repeat;
      background-size: cover;
      background-position: flex;
    }

    .container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 4px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
      color: #333;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
      color: #333;
    }

    input[type="text"],
    textarea {
      width: 90%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    button {
      padding: 10px 20px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Duyuru Ekleme Sayfası</h1>
    <form action="duyuru_kaydet.php" method="POST">
      <div class="form-group">
        <label for="title">Başlık:</label>
        <input type="text" id="title" name="title" required>
      </div>
      <div class="form-group">
        <label for="content">İçerik:</label>
        <textarea id="content" name="content" rows="5" required></textarea>
      </div>
      <button type="submit">Duyuru Ekle</button>
    </form>
  </div>
</body>
</html>
