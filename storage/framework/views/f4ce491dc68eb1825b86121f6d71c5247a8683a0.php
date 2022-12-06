<aside id="sidebar" class="sidebar">
    <section class="sidebar-container">
        <section class="sidebar-wrapper">
            <a href="<?php echo e(route('admin.home')); ?>" class="sidebar-link">
                <i class="fas fa-home"></i>
                <span>خانه</span>
            </a>
            <a href="<?php echo e(route('customer.home')); ?>" class="sidebar-link">
                <i class="fas fa-gift"></i>
                <span>فروشگاه</span>
            </a>

            
            
            
            

            
            <section class="sidebar-part-title">ربات تلگرام</section>
            <a href="<?php echo e(route('admin.bot.message')); ?>" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>ارسال پیام</span>
            </a>
            

            
            <section class="sidebar-part-title">گزارشات</section>
            <a href="<?php echo e(route('admin.reports.charts.sales')); ?>" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>نمودار فروش</span>
            </a>
            

            
            <section class="sidebar-part-title">پی سی پیک</section>

            <section class="sidebar-group-link">
                <section class="sidebar-dropdown-toggle">
                    <i class="fas fa-chart-bar icon"></i>
                    <span>سیستم اسمبل هوشمند</span>
                    <i class="fas fa-angle-left angle"></i>
                </section>
                <section class="sidebar-dropdown">
                    <a href="<?php echo e(route('admin.smart-assemble.system.index')); ?>">سیستم پیشنهادی</a>
                    <a href="<?php echo e(route('admin.smart-assemble.category.index')); ?>">دسته بندی</a>
                    <a href="<?php echo e(route('admin.smart-assemble.type.index')); ?>">کلاس سیستم</a>
                    <a href="<?php echo e(route('admin.smart-assemble.cpu.index')); ?>">نسل پردازنده</a>
                    
                    
                    
                    <a href="<?php echo e(route('admin.smart-assemble.config.index')); ?>">کانفیگ و رم</a>
                    
                    <a href="<?php echo e(route('admin.smart-assemble.brand.index')); ?>">برندها</a>
                    <a href="<?php echo e(route('admin.smart-assemble.menu.index')); ?>">منوها</a>

                </section>
            </section>
            

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-market')): ?>
                <section class="sidebar-part-title">بخش فروش</section>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-vitrine')): ?>
                    <section class="sidebar-group-link">
                        <section class="sidebar-dropdown-toggle">
                            <i class="fas fa-chart-bar icon"></i>
                            <span>ویترین</span>
                            <i class="fas fa-angle-left angle"></i>
                        </section>
                        <section class="sidebar-dropdown">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-product-categories')): ?>
                                <a href="<?php echo e(route('admin.market.category.index')); ?>">دسته بندی</a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-product-properties')): ?>
                                <a href="<?php echo e(route('admin.market.property.index')); ?>">فرم کالا</a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-product-brands')): ?>
                                <a href="<?php echo e(route('admin.market.brand.index')); ?>">برندها</a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-products')): ?>
                                <a href="<?php echo e(route('admin.market.product.index')); ?>">کالاها</a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-product-warehouse')): ?>
                                <a href="<?php echo e(route('admin.market.store.index')); ?>">انبار</a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-product-comments')): ?>
                                <a href="<?php echo e(route('admin.market.comment.index')); ?>">نظرات</a>
                            <?php endif; ?>
                        </section>
                    </section>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-product-orders')): ?>
                    <section class="sidebar-group-link">
                        <section class="sidebar-dropdown-toggle">
                            <i class="fas fa-chart-bar icon"></i>
                            <span>سفارشات</span>
                            <i class="fas fa-angle-left angle"></i>
                        </section>
                        <section class="sidebar-dropdown">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-product-new-orders')): ?>
                                <a href="<?php echo e(route('admin.market.order.newOrders')); ?>"> جدید</a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-product-sending-orders')): ?>
                                <a href="<?php echo e(route('admin.market.order.sending')); ?>">در حال ارسال</a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-product-unpaid-orders')): ?>
                                <a href="<?php echo e(route('admin.market.order.unpaid')); ?>">پرداخت نشده</a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-product-canceled-orders')): ?>
                                <a href="<?php echo e(route('admin.market.order.canceled')); ?>">باطل شده</a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-product-returned-orders')): ?>
                                <a href="<?php echo e(route('admin.market.order.returned')); ?>">مرجوعی</a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-product-all-orders')): ?>
                                <a href="<?php echo e(route('admin.market.order.all')); ?>">تمام سفارشات</a>
                            <?php endif; ?>
                        </section>
                    </section>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-product-payments')): ?>
                    <section class="sidebar-group-link">
                        <section class="sidebar-dropdown-toggle">
                            <i class="fas fa-chart-bar icon"></i>
                            <span>پرداخت ها</span>
                            <i class="fas fa-angle-left angle"></i>
                        </section>
                        <section class="sidebar-dropdown">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-product-all-payments')): ?>
                                <a href="<?php echo e(route('admin.market.payment.index')); ?>">تمام پرداخت ها</a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-product-online-payments')): ?>
                                <a href="<?php echo e(route('admin.market.payment.online')); ?>">پرداخت های آنلاین</a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-product-offline-payments')): ?>
                                <a href="<?php echo e(route('admin.market.payment.offline')); ?>">پرداخت های آفلاین</a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-product-cash-payments')): ?>
                                <a href="<?php echo e(route('admin.market.payment.cash')); ?>">پرداخت در محل</a>
                            <?php endif; ?>
                        </section>
                    </section>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-product-discounts')): ?>
                    <section class="sidebar-group-link">
                        <section class="sidebar-dropdown-toggle">
                            <i class="fas fa-chart-bar icon"></i>
                            <span>تخفیف ها</span>
                            <i class="fas fa-angle-left angle"></i>
                        </section>
                        <section class="sidebar-dropdown">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-product-coupon-discounts')): ?>
                                <a href="<?php echo e(route('admin.market.discount.copan')); ?>">کپن تخفیف</a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-product-common-discounts')): ?>
                                <a href="<?php echo e(route('admin.market.discount.commonDiscount')); ?>">تخفیف عمومی</a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-product-amazing-sales')): ?>
                                <a href="<?php echo e(route('admin.market.discount.amazingSale')); ?>">فروش شگفت انگیز</a>
                            <?php endif; ?>
                        </section>
                    </section>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-delivery-methods')): ?>
                    <a href="<?php echo e(route('admin.market.delivery.index')); ?>" class="sidebar-link">
                        <i class="fas fa-bars"></i>
                        <span>روش های ارسال</span>
                    </a>
                <?php endif; ?>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-content')): ?>
                <section class="sidebar-part-title">بخش محتوی</section>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-post-categories')): ?>
                    <a href="<?php echo e(route('admin.content.category.index')); ?>" class="sidebar-link">
                        <i class="fas fa-bars"></i>
                        <span>دسته بندی</span>
                    </a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-posts')): ?>
                    <a href="<?php echo e(route('admin.content.post.index')); ?>" class="sidebar-link">
                        <i class="fas fa-bars"></i>
                        <span>پست ها</span>
                    </a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-post-comments')): ?>
                    <a href="<?php echo e(route('admin.content.comment.index')); ?>" class="sidebar-link">
                        <i class="fas fa-bars"></i>
                        <span>نظرات</span>
                    </a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-menus')): ?>
                    <a href="<?php echo e(route('admin.content.menu.index')); ?>" class="sidebar-link">
                        <i class="fas fa-bars"></i>
                        <span>منو</span>
                    </a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-faqs')): ?>
                    <a href="<?php echo e(route('admin.content.faq.index')); ?>" class="sidebar-link">
                        <i class="fas fa-bars"></i>
                        <span>سوالات متداول</span>
                    </a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-pages')): ?>
                    <a href="<?php echo e(route('admin.content.page.index')); ?>" class="sidebar-link">
                        <i class="fas fa-bars"></i>
                        <span>پیج ساز</span>
                    </a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-banners')): ?>
                    <a href="<?php echo e(route('admin.content.banner.index')); ?>" class="sidebar-link">
                        <i class="fas fa-bars"></i>
                        <span>بنر ها</span>
                    </a>
                <?php endif; ?>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-users')): ?>
                <section class="sidebar-part-title">بخش کاربران</section>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-admin-users')): ?>
                    <a href="<?php echo e(route('admin.user.admin-user.index')); ?>" class="sidebar-link">
                        <i class="fas fa-bars"></i>
                        <span>کاربران ادمین</span>
                    </a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-customer-users')): ?>
                    <a href="<?php echo e(route('admin.user.customer.index')); ?>" class="sidebar-link">
                        <i class="fas fa-bars"></i>
                        <span>مشتریان</span>
                    </a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-user-roles')): ?>
                    <a href="<?php echo e(route('admin.user.role.index')); ?>" class="sidebar-link">
                        <i class="fas fa-bars"></i>
                        <span>سطوح دسترسی</span>
                    </a>
                <?php endif; ?>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-tickets')): ?>
                <section class="sidebar-part-title">تیکت ها</section>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-ticket-categories')): ?>
                    <a href="<?php echo e(route('admin.ticket.category.index')); ?>" class="sidebar-link">
                        <i class="fas fa-bars"></i>
                        <span> دسته بندی تیکت ها </span>
                    </a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-ticket-priorities')): ?>
                    <a href="<?php echo e(route('admin.ticket.priority.index')); ?>" class="sidebar-link">
                        <i class="fas fa-bars"></i>
                        <span> اولویت تیکت ها </span>
                    </a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-admin-tickets')): ?>
                    <a href="<?php echo e(route('admin.ticket.admin.index')); ?>" class="sidebar-link">
                        <i class="fas fa-bars"></i>
                        <span> ادمین تیکت ها </span>
                    </a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-new-tickets')): ?>
                    <a href="<?php echo e(route('admin.ticket.newTickets')); ?>" class="sidebar-link">
                        <i class="fas fa-bars"></i>
                        <span>تیکت های جدید</span>
                    </a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-open-tickets')): ?>
                    <a href="<?php echo e(route('admin.ticket.openTickets')); ?>" class="sidebar-link">
                        <i class="fas fa-bars"></i>
                        <span>تیکت های باز</span>
                    </a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-close-tickets')): ?>
                    <a href="<?php echo e(route('admin.ticket.closeTickets')); ?>" class="sidebar-link">
                        <i class="fas fa-bars"></i>
                        <span>تیکت های بسته</span>
                    </a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-all-tickets')): ?>
                    <a href="<?php echo e(route('admin.ticket.index')); ?>" class="sidebar-link">
                        <i class="fas fa-bars"></i>
                        <span>همه ی تیکت ها</span>
                    </a>
                <?php endif; ?>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-notify')): ?>
                <section class="sidebar-part-title">اطلاع رسانی</section>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-email-notify')): ?>
                    <a href="<?php echo e(route('admin.notify.email.index')); ?>" class="sidebar-link">
                        <i class="fas fa-bars"></i>
                        <span>اعلامیه ایمیلی</span>
                    </a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-sms-notify')): ?>
                    <a href="<?php echo e(route('admin.notify.sms.index')); ?>" class="sidebar-link">
                        <i class="fas fa-bars"></i>
                        <span>اعلامیه پیامکی</span>
                    </a>

                <?php endif; ?>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-setting')): ?>
                <section class="sidebar-part-title">تنظیمات</section>
                <a href="<?php echo e(route('admin.setting.index')); ?>" class="sidebar-link">
                    <i class="fas fa-bars"></i>
                    <span>تنظیمات</span>
                </a>
            <?php endif; ?>
        </section>
    </section>
</aside>
<?php /**PATH C:\CODEX\techzilla\resources\views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>