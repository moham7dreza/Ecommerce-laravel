<!-- widget -->
<div class="row m-1 mb-2">
    <div class="col-xl-3 col-md-6 col-sm-6 p-2">
        <div class="box-card text-right mini animate__animated animate__flipInY"><i
                class="fab far fa-chart-bar b-first" aria-hidden="true"></i>
            <span class="mb-1 c-first">پست</span>
            <span>{{ $panelRepo->postsCount() }}</span>
            <p class="mt-3 mb-1 text-right"><i class="far fas fa-wallet mr-1 c-first"></i> در حال
                پیشرفت</p>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 col-sm-6 p-2">
        <div class="box-card text-right mini animate__animated animate__flipInY"><i
                class="fab far fa-clock b-second" aria-hidden="true"></i>
            <span class="mb-1 c-second">کاربران</span>
            <span>{{ $panelRepo->usersCount() }}</span>
            <p class="mt-3 mb-1 text-right"><i class="far fas fa-wifi mr-1 c-second"></i>در حال پیشرفت
            </p>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 col-sm-6 p-2">
        <div class="box-card text-right mini animate__animated animate__flipInY"><i
                class="fab far fa-comments b-third" aria-hidden="true"></i>
            <span class="mb-1 c-third">پیام ها</span>
            <span>{{ $panelRepo->commentsCount() }}</span>
            <p class="mt-3 mb-1 text-right"><i class="fab fa-whatsapp mr-1 c-third"></i>در حال پیشرفت
            </p>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 col-sm-6 p-2">
        <div class="box-card text-right mini animate__animated animate__flipInY"><i
                class="fab far fa-gem b-forth" aria-hidden="true"></i>
            <span class="mb-1 c-forth">منابع سخت افزاری</span>
            <span>{{ $panelRepo->hardwareCount() }}</span>
            <p class="mt-3 mb-1 text-right"><i class="fab fa-bluetooth mr-1 c-forth"></i>در حال پیشرفت
            </p>
        </div>
    </div>
</div>
