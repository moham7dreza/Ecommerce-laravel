<aside id="sidebar" class="sidebar">
    <section class="sidebar-container">
        <section class="sidebar-wrapper">
            <a href="{{ route('admin.home') }}" class="sidebar-link">
                <i class="fas fa-home"></i>
                <span>خانه</span>
            </a>
            <a href="{{ route('customer.home') }}" class="sidebar-link">
                <i class="fas fa-gift"></i>
                <span>فروشگاه</span>
            </a>

            {{--            <a href="{{ route('smart.assemble.index') }}" class="sidebar-link">--}}
            {{--                <i class="fas fa-gift"></i>--}}
            {{--                <span>پی سی پیک - اسمبل سیستم</span>--}}
            {{--            </a>--}}

            {{--            @can('ربات تلگرام')--}}
            <section class="sidebar-part-title">ربات تلگرام</section>
            <a href="{{ route('admin.bot.message') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>ارسال پیام</span>
            </a>
            {{--            @endcan--}}

            {{--            @can('ربات تلگرام')--}}
            <section class="sidebar-part-title">گزارشات</section>
            <a href="{{ route('admin.reports.charts.sales') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>نمودار فروش</span>
            </a>
            {{--            @endcan--}}

            {{--            @can('اسمبل هوشمند')--}}
            <section class="sidebar-part-title">پی سی پیک</section>

            <section class="sidebar-group-link">
                <section class="sidebar-dropdown-toggle">
                    <i class="fas fa-chart-bar icon"></i>
                    <span>سیستم اسمبل هوشمند</span>
                    <i class="fas fa-angle-left angle"></i>
                </section>
                <section class="sidebar-dropdown">
                    <a href="{{ route('admin.smart-assemble.system.index') }}">سیستم پیشنهادی</a>
                    <a href="{{ route('admin.smart-assemble.category.index') }}">دسته بندی</a>
                    <a href="{{ route('admin.smart-assemble.type.index') }}">کلاس سیستم</a>
                    <a href="{{ route('admin.smart-assemble.cpu.index') }}">نسل پردازنده</a>
                    {{--                    <a href="{{ route('admin.smart-assemble.ram.index') }}">نسل رم</a>--}}
                    {{--                    <a href="{{ route('admin.smart-assemble.gpu.index') }}">نسل گرافیک</a>--}}
                    {{--                    <a href="{{ route('admin.smart-assemble.mb.index') }}">مادربرد</a>--}}
                    <a href="{{ route('admin.smart-assemble.config.index') }}">کانفیگ و رم</a>
                    {{--                    <a href="{{ route('admin.smart-assemble.gallery.index') }}">گالری</a>--}}
                    <a href="{{ route('admin.smart-assemble.brand.index') }}">برندها</a>
                    <a href="{{ route('admin.smart-assemble.menu.index') }}">منوها</a>

                </section>
            </section>
            {{--            @endcan--}}

            @can('permission-market')
                <section class="sidebar-part-title">بخش فروش</section>
                @can('permission-vitrine')
                    <section class="sidebar-group-link">
                        <section class="sidebar-dropdown-toggle">
                            <i class="fas fa-chart-bar icon"></i>
                            <span>ویترین</span>
                            <i class="fas fa-angle-left angle"></i>
                        </section>
                        <section class="sidebar-dropdown">
                            @can('permission-product-categories')
                                <a href="{{ route('admin.market.category.index') }}">دسته بندی</a>
                            @endcan
                            @can('permission-product-properties')
                                <a href="{{ route('admin.market.property.index') }}">فرم کالا</a>
                            @endcan
                            @can('permission-product-brands')
                                <a href="{{ route('admin.market.brand.index') }}">برندها</a>
                            @endcan
                            @can('permission-products')
                                <a href="{{ route('admin.market.product.index') }}">کالاها</a>
                            @endcan
                            @can('permission-product-warehouse')
                                <a href="{{ route('admin.market.store.index') }}">انبار</a>
                            @endcan
                            @can('permission-product-comments')
                                <a href="{{ route('admin.market.comment.index') }}">نظرات</a>
                            @endcan
                        </section>
                    </section>
                @endcan
                @can('permission-product-orders')
                    <section class="sidebar-group-link">
                        <section class="sidebar-dropdown-toggle">
                            <i class="fas fa-chart-bar icon"></i>
                            <span>سفارشات</span>
                            <i class="fas fa-angle-left angle"></i>
                        </section>
                        <section class="sidebar-dropdown">
                            @can('permission-product-new-orders')
                                <a href="{{ route('admin.market.order.newOrders') }}"> جدید</a>
                            @endcan
                            @can('permission-product-sending-orders')
                                <a href="{{ route('admin.market.order.sending') }}">در حال ارسال</a>
                            @endcan
                            @can('permission-product-unpaid-orders')
                                <a href="{{ route('admin.market.order.unpaid') }}">پرداخت نشده</a>
                            @endcan
                            @can('permission-product-canceled-orders')
                                <a href="{{ route('admin.market.order.canceled') }}">باطل شده</a>
                            @endcan
                            @can('permission-product-returned-orders')
                                <a href="{{ route('admin.market.order.returned') }}">مرجوعی</a>
                            @endcan
                            @can('permission-product-all-orders')
                                <a href="{{ route('admin.market.order.all') }}">تمام سفارشات</a>
                            @endcan
                        </section>
                    </section>
                @endcan
                @can('permission-product-payments')
                    <section class="sidebar-group-link">
                        <section class="sidebar-dropdown-toggle">
                            <i class="fas fa-chart-bar icon"></i>
                            <span>پرداخت ها</span>
                            <i class="fas fa-angle-left angle"></i>
                        </section>
                        <section class="sidebar-dropdown">
                            @can('permission-product-all-payments')
                                <a href="{{ route('admin.market.payment.index') }}">تمام پرداخت ها</a>
                            @endcan
                            @can('permission-product-online-payments')
                                <a href="{{ route('admin.market.payment.online') }}">پرداخت های آنلاین</a>
                            @endcan
                            @can('permission-product-offline-payments')
                                <a href="{{ route('admin.market.payment.offline') }}">پرداخت های آفلاین</a>
                            @endcan
                            @can('permission-product-cash-payments')
                                <a href="{{ route('admin.market.payment.cash') }}">پرداخت در محل</a>
                            @endcan
                        </section>
                    </section>
                @endcan
                @can('permission-product-discounts')
                    <section class="sidebar-group-link">
                        <section class="sidebar-dropdown-toggle">
                            <i class="fas fa-chart-bar icon"></i>
                            <span>تخفیف ها</span>
                            <i class="fas fa-angle-left angle"></i>
                        </section>
                        <section class="sidebar-dropdown">
                            @can('permission-product-coupon-discounts')
                                <a href="{{ route('admin.market.discount.copan') }}">کپن تخفیف</a>
                            @endcan
                            @can('permission-product-common-discounts')
                                <a href="{{ route('admin.market.discount.commonDiscount') }}">تخفیف عمومی</a>
                            @endcan
                            @can('permission-product-amazing-sales')
                                <a href="{{ route('admin.market.discount.amazingSale') }}">فروش شگفت انگیز</a>
                            @endcan
                        </section>
                    </section>
                @endcan
                @can('permission-delivery-methods')
                    <a href="{{ route('admin.market.delivery.index') }}" class="sidebar-link">
                        <i class="fas fa-bars"></i>
                        <span>روش های ارسال</span>
                    </a>
                @endcan
            @endcan
            @can('permission-content')
                <section class="sidebar-part-title">بخش محتوی</section>
                @can('permission-post-categories')
                    <a href="{{ route('admin.content.category.index') }}" class="sidebar-link">
                        <i class="fas fa-bars"></i>
                        <span>دسته بندی</span>
                    </a>
                @endcan
                @can('permission-posts')
                    <a href="{{ route('admin.content.post.index') }}" class="sidebar-link">
                        <i class="fas fa-bars"></i>
                        <span>پست ها</span>
                    </a>
                @endcan
                @can('permission-post-comments')
                    <a href="{{ route('admin.content.comment.index') }}" class="sidebar-link">
                        <i class="fas fa-bars"></i>
                        <span>نظرات</span>
                    </a>
                @endcan
                @can('permission-menus')
                    <a href="{{ route('admin.content.menu.index') }}" class="sidebar-link">
                        <i class="fas fa-bars"></i>
                        <span>منو</span>
                    </a>
                @endcan
                @can('permission-faqs')
                    <a href="{{ route('admin.content.faq.index') }}" class="sidebar-link">
                        <i class="fas fa-bars"></i>
                        <span>سوالات متداول</span>
                    </a>
                @endcan
                @can('permission-pages')
                    <a href="{{ route('admin.content.page.index') }}" class="sidebar-link">
                        <i class="fas fa-bars"></i>
                        <span>پیج ساز</span>
                    </a>
                @endcan
                @can('permission-banners')
                    <a href="{{ route('admin.content.banner.index') }}" class="sidebar-link">
                        <i class="fas fa-bars"></i>
                        <span>بنر ها</span>
                    </a>
                @endcan
            @endcan
            @can('permission-users')
                <section class="sidebar-part-title">بخش کاربران</section>
                @can('permission-admin-users')
                    <a href="{{ route('admin.user.admin-user.index') }}" class="sidebar-link">
                        <i class="fas fa-bars"></i>
                        <span>کاربران ادمین</span>
                    </a>
                @endcan
                @can('permission-customer-users')
                    <a href="{{ route('admin.user.customer.index') }}" class="sidebar-link">
                        <i class="fas fa-bars"></i>
                        <span>مشتریان</span>
                    </a>
                @endcan
                @can('permission-user-roles')
                    <a href="{{ route('admin.user.role.index') }}" class="sidebar-link">
                        <i class="fas fa-bars"></i>
                        <span>سطوح دسترسی</span>
                    </a>
                @endcan
            @endcan
            @can('permission-tickets')
                <section class="sidebar-part-title">تیکت ها</section>
                @can('permission-ticket-categories')
                    <a href="{{ route('admin.ticket.category.index') }}" class="sidebar-link">
                        <i class="fas fa-bars"></i>
                        <span> دسته بندی تیکت ها </span>
                    </a>
                @endcan
                @can('permission-ticket-priorities')
                    <a href="{{ route('admin.ticket.priority.index') }}" class="sidebar-link">
                        <i class="fas fa-bars"></i>
                        <span> اولویت تیکت ها </span>
                    </a>
                @endcan
                @can('permission-admin-tickets')
                    <a href="{{ route('admin.ticket.admin.index') }}" class="sidebar-link">
                        <i class="fas fa-bars"></i>
                        <span> ادمین تیکت ها </span>
                    </a>
                @endcan
                @can('permission-new-tickets')
                    <a href="{{ route('admin.ticket.newTickets') }}" class="sidebar-link">
                        <i class="fas fa-bars"></i>
                        <span>تیکت های جدید</span>
                    </a>
                @endcan
                @can('permission-open-tickets')
                    <a href="{{ route('admin.ticket.openTickets') }}" class="sidebar-link">
                        <i class="fas fa-bars"></i>
                        <span>تیکت های باز</span>
                    </a>
                @endcan
                @can('permission-close-tickets')
                    <a href="{{ route('admin.ticket.closeTickets') }}" class="sidebar-link">
                        <i class="fas fa-bars"></i>
                        <span>تیکت های بسته</span>
                    </a>
                @endcan
                @can('permission-all-tickets')
                    <a href="{{ route('admin.ticket.index') }}" class="sidebar-link">
                        <i class="fas fa-bars"></i>
                        <span>همه ی تیکت ها</span>
                    </a>
                @endcan
            @endcan
            @can('permission-notify')
                <section class="sidebar-part-title">اطلاع رسانی</section>
                @can('permission-email-notify')
                    <a href="{{ route('admin.notify.email.index') }}" class="sidebar-link">
                        <i class="fas fa-bars"></i>
                        <span>اعلامیه ایمیلی</span>
                    </a>
                @endcan
                @can('permission-sms-notify')
                    <a href="{{ route('admin.notify.sms.index') }}" class="sidebar-link">
                        <i class="fas fa-bars"></i>
                        <span>اعلامیه پیامکی</span>
                    </a>

                @endcan
            @endcan
            @can('permission-setting')
                <section class="sidebar-part-title">تنظیمات</section>
                <a href="{{ route('admin.setting.index') }}" class="sidebar-link">
                    <i class="fas fa-bars"></i>
                    <span>تنظیمات</span>
                </a>
            @endcan
        </section>
    </section>
</aside>
