<ul class="navbar-nav header-right">
    <li class="nav-item dropdown header-profile">
        <a class="nav-link" href="javascript:void(0);" role="button" data-toggle="dropdown">
            <img src="<?php echo $_SESSION["image"]; ?>" width="20" alt=""/>
            <div class="header-info">
                <span><?php echo $_SESSION["name"]; ?><i class="fa fa-caret-down ml-3" aria-hidden="true"></i></span>
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            <a href="Logout" class="dropdown-item ai-icon">
                <i class="fa fa-sign-out text-danger"></i>
                <span class="ml-2">Logout </span>
            </a>
        </div>
    </li>
</ul>