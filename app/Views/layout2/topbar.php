<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>


    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <nav class="navbar navbar-white sticky-top bg-white flex-md-nowrap p-0">
            <ul class="navbar-nav px-1">
                <?php echo form_open('auth2/logout') ?>
                <form>
                
                <button type="submit" class="btn btn-sm btn-warning">keluar</button>
                </form>
                <?php echo form_close() ?>

            </ul>
        </nav>
        <!-- Dropdown - User Information -->



    </ul>

</nav>