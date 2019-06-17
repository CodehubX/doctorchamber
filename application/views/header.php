<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header">
        <!-- Toggle icon for mobile view -->
        <a class="navbar-toggle hidden-sm hidden-md hidden-lg "
           href="javascript:void(0)" data-toggle="collapse"
           data-target=".navbar-collapse"><i class="ti-menu"></i></a>
        <!-- Logo -->
        <div class="top-left-part" style="width: 50%;">
            <a class="logo" href="<?php echo site_url('doctor');?>">
                <!-- Logo icon image, you can use font-icon also -->
                <b><img width="40" src="<?php echo base_url('uploads/'.get_settings('logo'));?>"></b>
                <span class="hidden-xs" style="font-size: 14px;">
                    Doctor Chamber Management System
                </span>
            </a>
        </div>
        <!-- /Logo -->
        <!-- Search input and Toggle icon -->
        <ul class="nav navbar-top-links navbar-left hidden-xs">
            <li><a href="javascript:void(0)"
                   class="open-close hidden-xs waves-effect waves-light">
                    <i class="icon-arrow-left-circle ti-menu"></i></a></li>
        </ul>
        <!-- This is the message dropdown -->
        <ul class="nav navbar-top-links navbar-right pull-right">
            <!-- .user dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown"
                   href="#">
                    <img src="<?php echo base_url('uploads/'.$this->session->userdata('login_type').'_image/1.png');?>"
                         width="36" class="img-circle">
                            <b class="hidden-xs">
                               <?php echo $this->db->get_where('users', array(
                                       'user_id' => $this->session->userdata('login_user_id')
                               ))->row()->name; ?>
                            </b> </a>
                <ul class="dropdown-menu dropdown-user animated fadeInRight">
                    <li>
                        <a href="<?php echo site_url($this->session->userdata('login_type').'/profile');?>">
                            <i class="ti-user"></i>
                            <?php echo get_phrase('profile');?>
                        </a>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <a href="<?php echo site_url('login/logout');?>">
                            <i class="fa fa-power-off"></i>
                            <?php echo get_phrase('logout');?>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>