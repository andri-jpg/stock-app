<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion" style="background-color: #32CD32;">
        <div class="sb-sidenav-menu">
            <div class="nav mt-3">
                <a class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'verifikasi_op') ? 'active' : ''; ?>" href="verifikasi_op.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-layer-group" style="color: black;"></i></div>
                    Verifikasi Spanduk
                </a>
                <a class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'cetak_spanduk') ? 'active' : ''; ?>" href="cetak_spanduk.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-minus-circle" style="color: black;"></i></div>
                    Cetak Spanduk
                </a>
                <a class="nav-link <?php echo strpos($_SERVER['REQUEST_URI'], 'logout') ? 'active' : ''; ?>" href="logout.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt" style="color: black;"></i></div>
                    Logout
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer" style="background-color: #228B22;">
            <div class="small">Logged in as:</div>
            <?php echo $_SESSION['email']; ?>
        </div>
    </nav>
</div>
