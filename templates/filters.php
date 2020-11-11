<div class="wrapper bg-white p-2 mb-4">
    <!-- Sidebar  -->
    <nav id="filter">
        <div class="sidebar-header">
            <h3>Filters</h3>
            <p class="border-bottom text-center">Launch Year</p>
        </div>

        <ul class="list-unstyled components launch-year">

        <?php
            for( $i = 0; $i <= 14; $i++){
                ?>
                <li class="d-inline-block btn btn-success ml-2 mr-2 mb-4">
                    <input type = "radio" value = "<?php echo 2006 + $i;?>" name="launch_year" />
                    <a href="javascript:void(0);" class="text-white text-decoration-none"><?php echo 2006 + $i;?></a>
                </li>
                <?php
            }
        ?>
           
        </ul>
        <div class="sidebar-header">
            <p class="border-bottom text-center"> Successful Launch</p>
        </div>
        <ul class="list-unstyled components">
            <li class="d-inline-block btn btn-success ml-2 mr-2 mb-4">
                <input type = "radio" value = "true" name="launch_status" />
                <a href="javascript:void(0);" class="text-white text-decoration-none">True</a>
            </li>
            <li class="d-inline-block btn btn-success ml-2 mr-2 mb-4">
                <input type = "radio" value = "false" name="launch_status" />
                <a href="javascript:void(0);" class="text-white text-decoration-none">False</a>
            </li>
        </ul>

        <div class="sidebar-header">
            <p class="border-bottom text-center"> Successful Landing</p>
        </div>
        <ul class="list-unstyled components">
            <li class="d-inline-block btn btn-success ml-2 mr-2 mb-4">
                <input type = "radio" value = "true" name="landing_status" />
                <a href="javascript:void(0);" class="text-white text-decoration-none">True</a>
            </li>
            <li class="d-inline-block btn btn-success ml-2 mr-2 mb-4">
                <input type = "radio" value = "false" name="landing_status" />
                <a href="javascript:void(0);" class="text-white text-decoration-none">False</a>
            </li>
        </ul>

    </nav>
</div>