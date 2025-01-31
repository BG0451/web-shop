<style>
.container {
  width: 90%;
  max-width: 1200px;
  margin: 0 auto;
}

header .container {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding-top: 10px;
}

header h1 {
  margin: 0;
  text-align: center;
  margin-bottom: 20px;
}

header nav a {
  color: white;
  text-decoration: none;
  margin: 0 15px;
}

header nav a:hover {
  text-decoration: underline;
}

footer {
  background-color: #2a475e;
  padding: 10px 0;
  color: white;
  text-align: center;
}

footer a {
  color: white;
  text-decoration: none;
}

footer a:hover {
  text-decoration: underline;
}
</style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Webshop</h1>
            <nav>
              <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) { ?>
                <a href="/webshop/add_game/">AddGame</a>
                <a href="/webshop/set_config/">Config</a>
                <a href="/webshop/backup_db/">Backup</a>
                <a href="/webshop/apply_discount/">ApplyDiscount</a>

              <?php } ?>
              <a href="/webshop/">Home</a>
              <a href="/webshop/contact/">Contact</a>
              <?php if(!isset($_SESSION['user_id'])) { ?>
                <a href="/webshop/login/">Login</a>
              <?php } else { if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 0) { ?>
                <a href="/webshop/userLibrary/">MyLibrary</a>
                <?php } ?>
                <a href="/webshop/logout/">Logout</a>
              <?php } ?>
            </nav>
        </div>
    </header>