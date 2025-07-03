<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Valina Puspita Sari</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.0/css/all.css">

  <style>
    :root {
      --primary: #9f807d;
      --light: #fffaf2;
      --dark: #391E22;
    }

    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      background-color: var(--light);
      color: var(--dark);
    }

    .navbar {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      align-items: center;
      padding: 20px 60px;
      background-color: #f1f0ec;
    }

    .navbar-icon i {
      font-size: 30px;
      color: var(--dark);
    }

    .navbar-page ul {
      display: flex;
      list-style: none;
      gap: 20px;
      padding: 0;
      margin: 0;
    }

    .navbar-page a {
      text-decoration: none;
      color: var(--dark);
      font-weight: 600;
      transition: color 0.3s;
    }

    .navbar-page a:hover {
      color: var(--primary);
    }

    .navbar-sosmed ul {
      display: flex;
      list-style: none;
      gap: 15px;
      padding: 0;
      margin: 0;
    }

    .navbar-sosmed i {
      font-size: 20px;
      color: var(--dark);
      transition: transform 0.3s, color 0.3s;
    }

    .navbar-sosmed i:hover {
      transform: scale(1.2);
      color: var(--primary);
    }

    .banner {
      width: 100%;
      height: 300px;
      background: url('assets/img/hasil.png') center/cover no-repeat;
      border-bottom: 4px solid var(--primary);
    }

    .header {
      text-align: center;
      margin-top: -60px;
    }

    .foto-profil {
      width: 130px;
      height: 130px;
      border-radius: 50%;
      object-fit: cover;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
      border: 3px solid white;
    }

    .header h2 {
      margin: 10px 0 5px;
      font-size: 28px;
    }

    .header p {
      font-size: 14px;
      color: #666;
      margin-bottom: 20px;
    }

    .content {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 40px;
      padding: 40px 60px;
    }

    .left, .right {
      flex: 1;
      min-width: 280px;
      max-width: 600px;
    }

    h3 {
      font-size: 22px;
      margin-bottom: 12px;
      color: var(--primary);
      text-transform: capitalize;
    }

    .left p {
      text-align: justify;
    }

    .right table {
      width: 100%;
      border-collapse: collapse;
      font-size: 14px;
    }

    .right th, .right td {
      border: 1px solid #ccc;
      padding: 10px;
      text-align: center;
    }

    .right th {
      background-color: #f9f3ef;
    }

    @media (max-width: 768px) {
      .navbar {
        flex-direction: column;
        align-items: center;
        gap: 15px;
        padding: 20px;
      }

      .content {
        padding: 30px 20px;
        flex-direction: column;
        align-items: center;
      }

      .foto-profil {
        width: 100px;
        height: 100px;
      }

      .header h2 {
        font-size: 22px;
      }
    }

    @media (max-width: 480px) {
      .right th, .right td {
        font-size: 12px;
        padding: 6px;
      }

      h3 {
        font-size: 18px;
      }
    }
  </style>
</head>
<body>

  <div class="navbar">
    <div class="navbar-icon">
      <i class="fa-solid fa-circle-user"></i>
    </div>
    <div class="navbar-page">
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Portofolio</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </div>
    <div class="navbar-sosmed">
      <ul>
        <li><i class="fa-brands fa-linkedin"></i></li>
        <li><i class="fa-brands fa-instagram"></i></li>
        <li><i class="fa-brands fa-facebook"></i></li>
        <li><i class="fa-brands fa-square-whatsapp"></i></li>
      </ul>
    </div>
  </div>

  <div class="banner"></div>

  <div class="header">
    <img src="assets/img/valina.jpg" alt="Valina" class="foto-profil">
    <h2>VALINA PUSPITA SARI</h2>
    <p>Mahasiswi Fakultas Teknologi Industri, Jurusan Teknik Informatika</p>
  </div>

  <div class="content">
    <div class="left">
      <h3>About Us</h3>
      <p>
        An undergraduate student at the Faculty of Industrial Technology, majoring in Informatics 
        Engineering from the Islamic University of Sultan Agung Semarang. Passionate about technology,
        design, and building meaningful digital experiences.
      </p>
    </div>
    <div class="right">
      <h3>Experience</h3>
      <table>
        <tr>
          <th colspan="2">UI/UX Designer</th>
          <th colspan="2">Web Developer</th>
        </tr>
        <tr>
          <td>Semarang</td>
          <td>Indonesia</td>
          <td>Semarang</td>
          <td>Indonesia</td>
        </tr>
        <tr>
          <td>2025</td>
          <td>Designed user interface & user experience for a mobile app in a team setting</td>
          <td>2024</td>
          <td>Developed a responsive website for a coffee shop named "Seteguk Senja"</td>
        </tr>
      </table>
    </div>
  </div>

</body>
</html>
