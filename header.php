<header class="d-flex">
    <div class="px-3 py-2 text-bg-dark w-100">
        <div class="px-3">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
                <a class="text-decoration-none" href="./index1.php">
                    <span class="text-white fs-3 fw-bold ms-2">GYM DIARY</span>
                </a>
                <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small gap-5">
                    <li class="d-flex align-items-center">
                        <a href="./index1.php" class="nav-link d-flex flex-column align-items-center">
                            <i class="fa-solid fa-bullhorn mb-1"></i>
                            <span>Duyurular</span>
                        </a>
                    </li>
                    <li class="d-flex align-items-center">
                        <a href="./beslenme-programi.php" class="nav-link d-flex flex-column align-items-center">
                            <i class="fa-solid fa-apple-whole mb-1"></i>
                            <span>Beslenme Programı</span>
                        </a>
                    </li>
                    <li class="d-flex align-items-center">
                        <a href="./antrenman-programi.php"
                            class="nav-link active d-flex flex-column align-items-center">
                            <i class="fa-solid fa-dumbbell mb-1"></i>
                            <span>Antrenman Programı</span>
                        </a>
                    </li>
                    <li class="d-flex align-items-center">
                        <a href="./olcumlerim.php" class="nav-link d-flex flex-column align-items-center">
                            <i class="fa-solid fa-ruler mb-1"></i>
                            <span>Ölçümlerim</span>
                        </a>
                    </li>
                    <li class="d-flex align-items-center">
                        <a href="./bilgilerim.php" class="nav-link d-flex flex-column align-items-center">
                            <i class="fa-solid fa-user mb-1"></i>
                            <span>Bilgilerim</span>
                        </a>
                    </li>
                </ul>
                <div>
                    <span class="me-2">
                        <?= $_SESSION['giris_bilgileri']['adi']; ?>
                    </span>
                    <!--<img class="avatar" src="./assets/img/1.png" alt="">-->
                </div>
            </div>
        </div>
    </div>
</header>