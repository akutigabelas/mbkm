<style>
    body {
        font-family: "Lato", sans-serif;
    }

    .sidebar {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #FFFF;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
        font-size: 12px;
    }

    .sidebar a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
    }

    .sidebar a:hover {
        color: #f1f1f1;
    }

    .sidebar .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }

    .sidebar .tulisan {
        position: relative;
        right: 25px;
        top: 0;
        font-size: 36px;
        /* left: 50px; */
        text-align: center;

    }


    .openbtn {
        font-size: 16px;
        /* cursor: pointer; */
        /* background-color: #f1f1f1; */
        color: black;
        /* padding: 10px 15px; */
        /* border: none; */
    }

    .openbtn:hover {
        background-color: #FFFF;
    }

    #main {
        transition: margin-left .5s;
        padding: 16px;
    }

    /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
    @media screen and (max-height: 450px) {
        .sidebar {
            padding-top: 15px;
        }

        .sidebar a {
            font-size: 12px;
        }
    }
</style>


<div id="mySidebar" class="sidebar">
    <h5 class="tulisan text-center" style="font-size: 18px">Tahun Ajaran</h5>
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="/pages" style="font-size: 16px;">2022 - 2023 Ganjil</a>
    <a href="/pages/homeMhs" style="font-size: 16px;">2022 - 2023 Genap</a>
    <a href="/pages/home2024" style="font-size: 16px;">2023 - 2024 Ganjil</a>
    <a href="#" style="font-size: 16px;">2023 - 2024 Genap</a>
</div>

<div id="main">
    <!-- <button class="openbtn" onclick="openNav()">☰</button> -->
    <!-- <span class="navbar-toggler-icon"></span> -->
    <button class="openbtn" type="button" onclick="openNav()" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</div>

<script>
    function openNav() {
        document.getElementById("mySidebar").style.width = "200px";
        document.getElementById("main").style.marginLeft = "200px";
    }

    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
    }
</script>