<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><span class="text text-success text-center"></span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="Dashboard.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">Profile</a>
        </li>
        </li>
        <li class="nav-item">
          <a class="btn btn-danger nav-link" onclick="loggingOut()">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<script>
  function loggingOut() {
    if (confirm("Do you want to Logout?")) {
      window.location.href = "login.php";
    }
  }
</script>