<header class="bmd-layout-header ">
    <div class="navbar navbar-light bg-faded animate__animated animate__fadeInDown">
        <button class="navbar-toggler animate__animated animate__wobble animate__delay-2s" type="button"
                data-toggle="drawer" data-target="#dw-s1">
            <span class="navbar-toggler-icon"></span>
            <!-- <i class="material-Animation">menu</i> -->
        </button>
        <ul class="nav navbar-nav p-0">
            <li class="nav-item">
                <div class="dropdown">
                    <button class="btn  dropdown-toggle  m-0" type="button" id="dropdownMenu2"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="far fa-envelope fa-lg"></i><span
                            class="badge badge-pill badge-danger animate__animated animate__flash animate__repeat-3 animate__slower animate__delay-2s"><?php echo e($unseenComments->count()); ?></span>
                    </button>
                    <div aria-labelledby="dropdownMenu2"
                         class="dropdown-menu dropdown-menu-right dropdown-menu dropdown-menu-right-lg">
                        <span class="dropdown-item dropdown-header"><?php echo e($unseenComments->count()); ?> نظر</span>
                        <?php $__currentLoopData = $unseenComments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unseenComment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <img src="<?php echo e($unseenComment->authorImage()); ?>" alt="" width="50" height="50">
                            <i class="fa fa-times"><p class="notification-time ml-2"><?php echo e($unseenComment->textAuthorName()); ?></p></i>
                            <p class="mt-2"><?php echo e($unseenComment->limitedBody()); ?></p>

                        </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">دیدن همه</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <div class="dropdown">
                    <button class="btn  dropdown-toggle m-0" type="button" id="dropdownMenu3"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="far fa-bell  fa-lg "></i><span
                            class="badge badge-pill badge-warning animate__animated animate__flash animate__repeat-3 animate__slower animate__delay-2s"><?php echo e($notifications->count()); ?></span>
                    </button>
                    <div aria-labelledby="dropdownMenu2"
                         class="dropdown-menu dropdown-menu-right dropdown-menu dropdown-menu-right-lg">
                        <span class="dropdown-item dropdown-header persianumber"><?php echo e($notifications->count()); ?> اطلاعیه</span>

                        <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fa fa-times"><p class="notification-time ml-2"><?php echo e($notification['data']['message']); ?></p></i>
                            <span class="float-right-rtl text-muted text-sm">

                            </span>
                        </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">دیدن همه</a>
                    </div>
                </div>
            </li>
            <?php
                $user = auth()->user();
            ?>
            <li class="nav-item"><img src="" alt="..."
                                      class="rounded-circle screen-user-profile"></li>
            <li class="nav-item">
                <div class="dropdown">
                    <button class="btn  dropdown-toggle m-0" type="button" id="dropdownMenu4"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo e($user->fullName); ?>

                    </button>
                    <div aria-labelledby="dropdownMenu4"
                         class="dropdown-menu  pl-3 dropdown-menu-right dropdown-menu dropdown-menu-right"
                         aria-labelledby="dropdownMenu2">
                        <button class="dropdown-item" type="button"><i
                                class="far fa-user c-main fa-sm mr-2"></i>پروفایل
                        </button>
                        <button onclick="dark()" class="dropdown-item" type="button"><i
                                class="fas fa-moon fa-sm c-main mr-2"></i>حالت شب
                        </button>
                        <button class="dropdown-item" type="button"><i
                                class="fas fa-cog c-main fa-sm mr-2"></i>تنظیمات
                        </button>
                        <button class="dropdown-item" type="button"><i
                                class="fas fa-sign-out-alt c-main fa-sm mr-2"></i>خروج
                        </button>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</header>
<?php /**PATH C:\CODEX\techzilla\resources\views/panel/layouts/header.blade.php ENDPATH**/ ?>