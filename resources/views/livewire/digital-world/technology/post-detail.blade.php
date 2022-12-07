<section class="container">
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
            <h1 class="display-4 fst-italic">عنوان تدوينة مميزة أطول</h1>
            <p class="lead my-3">عدة أسطر نصية متعددة تعبر عن التدوية، وذلك لإعلام القراء الجدد بسرعة وكفاءة حول أكثر
                الأشياء إثارة للاهتمام في محتويات هذه التدوينة.</p>
            <p class="lead mb-0"><a href="#" class="text-white fw-bold">أكمل القراءة...</a></p>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-primary">العالم</strong>
                    <h3 class="mb-0">مشاركة مميزة</h3>
                    <div class="mb-1 text-muted">نوفمبر 12</div>
                    <p class="card-text mb-auto">هذه بطاقة أوسع مع نص داعم أدناه كمقدمة طبيعية لمحتوى إضافي.</p>
                    <a href="#" class="stretched-link">أكمل القراءة</a>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg"
                         role="img" aria-label="Placeholder: صورة مصغرة" preserveAspectRatio="xMidYMid slice"
                         focusable="false"><title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#55595c"/>
                        <text x="50%" y="50%" fill="#eceeef" dy=".3em">صورة مصغرة</text>
                    </svg>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-success">التصميم</strong>
                    <h3 class="mb-0">عنوان الوظيفة</h3>
                    <div class="mb-1 text-muted">نوفمبر 11</div>
                    <p class="mb-auto">هذه بطاقة أوسع مع نص داعم أدناه كمقدمة طبيعية لمحتوى إضافي.</p>
                    <a href="#" class="stretched-link">أكمل القراءة</a>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg"
                         role="img" aria-label="Placeholder: صورة مصغرة" preserveAspectRatio="xMidYMid slice"
                         focusable="false"><title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#55595c"/>
                        <text x="50%" y="50%" fill="#eceeef" dy=".3em">صورة مصغرة</text>
                    </svg>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <h3 class="pb-4 mb-4 fst-italic border-bottom">
                من Firehose
            </h3>

            <article class="blog-post">
                <h2 class="blog-post-title">مثال على تدوينة</h2>
                <p class="blog-post-meta">1 يناير 2021 بواسطة <a href="#"> Mark </a></p>

                <p>تعرض مشاركة المدونة هذه بضعة أنواع مختلفة من المحتوى الذي يتم دعمه وتصميمه باستخدام Bootstrap. النصوص
                    الأساسية، الصور، والأكواد مدعومة بشكل كامل.</p>
                <hr>
                <p>يشكِّل تأمين الغذاء في المستقبل قضية تؤرِّق حكومات العالَم والعلماء على حدٍّ سواء. فخلال القرن
                    العشرين ازداد عدد سكان الأرض أربعة أضعاف، وتشير التقديرات إلى أن العدد سوف يصل إلى عشرة مليارات
                    إنسان بحلول عام 2050م. وسوف تمثل هذه الزيادة الهائلة تحدياً كبيراً وضغطاً متصاعداً على قدرة الإنتاج
                    الزراعي. الأمر الذي كان ولا بد من أن يدفع إلى تطوير تقنيات مبتكرة في تصنيع الغذاء غير الزراعة، منها
                    تقنية مستقبلية تقوم على تصنيع الغذاء من الهواء.</p>
                <blockquote>
                    <p>تشغل الزراعة مساحات كبيرة من اليابسة، وتستهلك كميات هائلة من المياه، كما أن إنتاج الغذاء بواسطة
                        الزراعة يسهم بنسبة عالية من انبعاثات غازات الاحتباس الحراري العالمية</p>
                </blockquote>
                <p>تشغل الزراعة مساحات كبيرة من اليابسة، وتستهلك كميات هائلة من المياه. كما أن إنتاج الغذاء بواسطة
                    الزراعة يسهم بنسبة عالية من انبعاثات غازات الاحتباس الحراري العالمية، وللمقارنة فإن هذه النسبة من
                    الانبعاثات هي أكبر مما ينتجه قطاع النقل بكل ما فيه من سيارات وشاحنات وطائرات وقطارات.</p>
                <h2>عنوان</h2>
                <p>تحصل النباتات على غذائها بواسطة عملية تسمى البناء الضوئي، حيث تقوم النباتات بتحويل ضوء الشمس والماء
                    وثاني أكسيد الكربون الموجود في الغلاف الجوي إلى غذاء وتطلق الأكسجين كمنتج ثانوي لهذا التفاعل
                    الكيميائي. وتحدث هذه العملية في "البلاستيدات الخضراء". فالنباتات تستفيد من طاقة ضوء الشمس في تقسيم
                    الماء إلى هيدروجين وأكسجين، وتحدث تفاعلات كيميائية أخرى ينتج عنها سكر الجلكوز الذي تستخدمه كمصدر
                    للغذاء وينطلق الأكسجين من النباتات إلى الغلاف الجوي. وهذا يعني أن النباتات تحوِّل ثاني أكسيد الكربون
                    إلى غذاء من خلال تفاعلات كيميائية معقَّدة. ويُعد البناء الضوئي من أهم التفاعلات الكيميائية على كوكب
                    الأرض، فقد ساعد في الماضي على تطوُّر كوكبنا وظهور الحياة عليه. فالنباتات تستخدم ثاني أكسيد الكربون
                    لصنع غذائها، وتطلق الأكسجين لتساعد الكائنات الأخرى على التنفس!</p>
                <h3>عنوان فرعي</h3>
                <p>ألهمت هذه العملية علماء وكالة الفضاء الأمريكية (ناسا) خلال الستينيات من القرن الماضي، لبحث فكرة إطعام
                    روَّاد الفضاء في مهمات الفضاء الطويلة مثل السفر إلى المريخ. وكانت واحدة من الأفكار الواعدة تصنيع
                    الغذاء عن طريق ثاني أكسيد الكربون الذي ينتجه روَّاد الفضاء، لكن ليس بواسطة النباتات بل عن طريق
                    ميكروبات صغيرة وحيدة الخلية قادرة على حصد ثاني أكسيد الكربون لإنتاج كميات وفيرة من البروتين المغذي
                    على شكل مسحوق عديم النكهة، كما يمكن استخدام المادة في صنع الأطعمة المألوفة لدينا.</p>
                <pre><code>Example code block</code></pre>
                <p>وخلافاً لما هو الحال في عالم النبات، فإن هذه الميكروبات لا تستخدم الضوء كما يحدث في عملية البناء
                    الضوئي التي تستخدمها النباتات للحصول على الغذاء، أي لأنها قادرة على النمو في الظلام. تسمى هذه
                    البكتريا "هيدروجينوتروف" (Hydrogenotrophs)، وهي تستخدم الهيدروجين كوقود لإنتاج الغذاء من ثاني أكسيد
                    الكربون. فعندما يُنتج روَّاد الفضاء ثاني أكسيد الكربون، تلتقطه الميكروبات، ويتحوَّل مع مدخلات أخرى
                    إلى غذاء غني بالكربون. وبهذه الطريقة سوف نحصل على دورة كربون مغلقة الحلقة.</p>
                <h3>عنوان فرعي</h3>
                <p>بعد مرور أكثر من نصف قرن على أبحاث ناسا، تعمل حالياً عدة شركات في قطاع البيولوجيا التركيبية من ضمنها
                    إير بروتين (Air Protein) وسولار فودز (Solar Foods) على تطوير جيل جديد من المنتجات الغذائية
                    المستدامة، من دون وجود بصمة كربونية. ولن تقتصر هذه المنتجات الغذائية على روَّاد الفضاء فحسب، بل سوف
                    تمتد لتشمل جميع سكان الأرض، وسوف تُنتَج في فترة زمنية قصيرة، بدلاً من الشهور، ومن دون الاعتماد على
                    الأراضي الزراعية. وهذا يعني الحصول على منتجات غذائية بشكل سريع جداً. كما سيصبح من الممكن تصنيع
                    الغذاء بطريقة عمودية من خلال هذه الميكروبات، بدلاً من الطريقة الأفقية التقليدية الشبيهة بتقنية
                    الزراعة العمودية الحديثة. وهذا يعني توفير منتجات غذائية أكبر من المساحة نفسها.</p>
                <p>يتكوَّن الغذاء البشري من ثلاثة أنواع رئيسة، هي:</p>
                <ul>
                    <li>البروتينات</li>
                    <li>الكربوهيدرات</li>
                    <li>الدهون</li>
                </ul>
                <p>وتتكوَّن البروتينات من الأحماض الأمينية، وهي مجموعة من المركبات العضوية يبلغ عددها في جسم الإنسان
                    عشرين حمضاً أمينياً، من بينها تسعة أساسية يحصل عليها الجسم من الغذاء. وتتكوَّن الأحماض الأمينية بشكل
                    أساس من:</p>
                <ol>
                    <li>الكربون</li>
                    <li>الهيدروجين</li>
                    <li>الأكسجين</li>
                    <li>النيتروجين</li>
                </ol>
                <p>ومن الملاحظ أن النيتروجين يشكِّل نسبة %78 من الهواء، كما أن الهيدروجين نحصل عليه من خلال التحليل
                    الكهربائي للماء، ومن الممكن نظرياً سحب الكربون من الهواء لتشكيل هذه الأحماض، ذلك أن الكربون هو
                    العمود الفقري للأحماض الأمينية، كما أن الحياة على كوكب الأرض قائمة على الكربون لقدرته على تكوين
                    سلاسل كربونية طويلة، وهذا ما تفعله الميكروبات بتصنيع أحماض أمينية من ثاني أكسيد الكربون من خلال
                    مجموعة من التفاعلات الكيميائية المعقَّدة. وإضافة إلى صنع وجبات غنية بالبروتين، فهذه الميكروبات تنتج
                    منتجات أخرى مثل الزيوت التي لها عديد من الاستخدامات.</p>
            </article>

            <article class="blog-post">
                <h2 class="blog-post-title">تدوينة أخرى</h2>
                <p class="blog-post-meta">23 ديسمبر 2020 بواسطة <a href="#">Jacob</a></p>

                <p>في الوقت الحالي، تدرس عدَّة شركات هذه الميكروبات بشكل أعمق، وتستزرعها من أجل الحصول على الغذاء. ففي
                    عام 2019م، أعلن باحثون في شركة (Air Protein) الأمريكية نجاحهم في تحويل ثاني أكسيد الكربون الموجود في
                    الهواء إلى لحوم صناعية مصنوعة من البروتين، التي لا تتطلَّب أي أرض زراعية، بل هي معتمدة بشكل أساسي
                    على الهواء.</p>
                <blockquote>
                    <p>تم تصنيع اللحوم بأنواع عديدة</p>
                </blockquote>
                <p>إذ استخدم هؤلاء الباحثون الهواء والطاقة المتجدِّدة كمدخلات في عملية مشابهة للتخمير، لإنتاج بروتين
                    يحتوي على الأحماض الأمينية التسعة الأساسية وغني بالفيتامينات والمعادن، كما أنه خالٍ من الهرمونات
                    والمضادات الحيوية والمبيدات الحشرية ومبيدات الأعشاب.</p>
                <p> وتم تصنيع اللحوم بأنواع عديدة بما فيها الدواجن والأبقار والمأكولات البحرية، من دون حصول انبعاثات
                    كربونية، على عكس تربية الأبقار التي تسهم في انبعاث غاز الميثان أحد غازات الاحتباس الحراري.</p>
            </article>

            <article class="blog-post">
                <h2 class="blog-post-title">ميزة جديدة</h2>
                <p class="blog-post-meta">14 ديسمبر 2020 بواسطة <a href="#">Jacob</a></p>

                <p>كما أن الشركة الفنلندية (Solar Foods) طوَّرت تقنية لإنتاج البروتين من الهواء، حيث تبدأ العملية بتقسيم
                    الماء إلى مكوناته الهيدروجين والأكسجين عن طريق الكهرباء. فالهيدروجين يوفِّر الطاقة للبكتريا لتحويل
                    ثاني أكسيد الكربون والنيتروجين الموجودين في الهواء إلى مادة عضوية غنية بالبروتين بشكل أكفأ من نمو
                    النباتات باستخدام البناء الضوئي. وهذا البروتين يشبه دقيق القمح وقد أطلق عليه اسم "سولين"
                    (Solein).</p>
                <p>وتقوم الشركة حالياً بجمع البيانات حول المنتج الغذائي لتقديمه إلى الاتحاد الأوروبي بهدف الحصول على
                    ترخيص غذائي، كما أنها تخطط لبدء الإنتاج التجاري في العام المقبل 2021م. وقد أوضحت الشركة أنها مهتمة
                    بإنتاج أطعمة صديقة للبيئة من خلال استخدام المواد الأساسية: الكهرباء وثاني أكسيد الكربون، وهذه
                    الأطعمة سوف تجنبنا الأثر السلبي البيئي للزراعة التقليدية الذي يشمل كل شيء من استخدام الأرض والمياه
                    إلى الانبعاثات الناتجة من تسميد المحاصيل أو تربية الحيوانات.</p>
                <p>وعلى هذا، فإن البروتينات المشتقة من الميكروبات سوف:</p>
                <ul>
                    <li>توفر حلاً ممكناً في ظل زيادة الطلب العالمي المستقبلي على الغذاء</li>
                    <li>تتوسع مصانع الغذاء في المستقبل لتكون أكفأ وأكثر استدامة</li>
                    <li>تصبح قادرة على توفير الغذاء لروَّاد الفضاء في سفرهم إلى المريخ وجميع سكان كوكب الأرض في عام
                        2050م
                    </li>
                </ul>
                <p>فتخيّل أن الميكروبات ستكون مصانع المستقبل، وأن غذاء المستقبل سيكون مصنوعاً من الهواء! وأن عام 2050م
                    سيكون مختلفاً تماماً عن عالمنا اليوم. فهو عالم من دون زراعة ولا تربية حيوانات من أجل الغذاء! قد يبدو
                    ذلك خيالياً لكنه ليس مستحيلاً!</p>
            </article>

            <nav class="blog-pagination" aria-label="Pagination">
                <a class="btn btn-outline-primary" href="#">تدوينات أقدم</a>
                <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">تدوينات
                    أحدث</a>
            </nav>

        </div>

        <div class="col-md-4">
            <div class="position-sticky" style="top: 2rem;">
                <div class="p-4 mb-3 bg-light rounded">
                    <h4 class="fst-italic">حول</h4>
                    <p class="mb-0">أقبلت، فأقبلت معك الحياة بجميع صنوفها وألوانها: فالنبات ينبت، والأشجار تورق وتزهر،
                        والهرة تموء، والقمري يسجع، والغنم يثغو، والبقر يخور، وكل أليف يدعو أليفه. كل شيء يشعر بالحياة
                        وينسي هموم الحياة، ولا يذكر إلا سعادة الحياة، فإن كان الزمان جسدا فأنت روحه، وإن كان عمرا فأنت
                        شبابه.</p>
                </div>

                <div class="p-4">
                    <h4 class="fst-italic">الأرشيف</h4>
                    <ol class="list-unstyled mb-0">
                        <li><a href="#">مارس 2021</a></li>
                        <li><a href="#">شباط 2021</a></li>
                        <li><a href="#">يناير 2021</a></li>
                        <li><a href="#">ديسمبر 2020</a></li>
                        <li><a href="#">نوفمبر 2020</a></li>
                        <li><a href="#">أكتوبر 2020</a></li>
                        <li><a href="#">سبتمبر 2020</a></li>
                        <li><a href="#">اغسطس 2020</a></li>
                        <li><a href="#">يوليو 2020</a></li>
                        <li><a href="#">يونيو 2020</a></li>
                        <li><a href="#">مايو 2020</a></li>
                        <li><a href="#">ابريل 2020</a></li>
                    </ol>
                </div>

                <div class="p-4">
                    <h4 class="fst-italic">في مكان آخر</h4>
                    <ol class="list-unstyled">
                        <li><a href="#">GitHub</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Facebook</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- start content header -->
    <section id="comments" class="content-header mt-2 mb-4">
        <section class="d-flex justify-content-between align-items-center">
            <h2 class="content-header-title content-header-title-small">
                دیدگاه ها
            </h2>
            <section class="content-header-link">
                <!--<a href="#">مشاهده همه</a>-->
            </section>
        </section>
    </section>
    <section class="product-comments mb-4">

        <section class="comment-add-wrapper">
            <button class="comment-add-button" type="button" data-bs-toggle="modal" data-bs-target="#add-comment"><i
                    class="fa fa-plus"></i> افزودن دیدگاه
            </button>
            <!-- start add comment Modal -->
            <section class="modal fade" id="add-comment" tabindex="-1" aria-labelledby="add-comment-label"
                     aria-hidden="true">
                <section class="modal-dialog">
                    <section class="modal-content">
                        <section class="modal-header">
                            <h5 class="modal-title" id="add-comment-label"><i class="fa fa-plus"></i> افزودن دیدگاه</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </section>
                        @guest
                            <section class="modal-body">
                                <p>کاربر گرامی لطفا برای ثبت نظر ابتدا وارد حساب کاربری خود شوید </p>
                                <p>لینک ثبت نام و یا ورود
                                    <a href="{{ route('auth.customer.login-register-form') }}">کلیک کنید</a>
                                </p>
                            </section>
                        @endguest
                        @auth
                            <section class="modal-body">
                                <form class="row" wire:submit.prevent="addComment">
                                    @csrf
                                    {{-- <section class="col-6 mb-2">
                                        <label for="first_name" class="form-label mb-1">نام</label>
                                        <input type="text" class="form-control form-control-sm" id="first_name" placeholder="نام ...">
                                    </section>

                                    <section class="col-6 mb-2">
                                        <label for="last_name" class="form-label mb-1">نام خانوادگی</label>
                                        <input type="text" class="form-control form-control-sm" id="last_name" placeholder="نام خانوادگی ...">
                                    </section> --}}

                                    <section class="col-12 mb-2">
                                        <label for="comment" class="form-label mb-1">دیدگاه شما</label>
                                        <textarea wire:model.lazy="comment_body" class="form-control form-control-sm"
                                                  id="comment" placeholder="دیدگاه شما ..." rows="4"
                                                  name="comment_body"></textarea>
                                        {{--                                        @error('body')--}}
                                        {{--                                        <span class="alert_required bg-danger text-white p-1 rounded" role="alert">--}}
                                        {{--                                        <strong>{{ $message }}</strong>--}}
                                        {{--                                        </span>--}}
                                        {{--                                        @enderror--}}
                                    </section>

                                    <section class="modal-footer py-1">
                                        <button type="submit" class="btn btn-sm btn-primary">ثبت دیدگاه</button>
                                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">
                                            بستن
                                        </button>
                                    </section>
                                </form>
                            </section>
                        @endauth
                    </section>
                </section>
            </section>
        </section>
        @if(count($post->activeComments()) > 0)
            @foreach ($post->activeComments() as $activeComment)
                <section class="product-comment">
                    <section class="product-comment-header d-flex justify-content-start">
                        <section class="product-comment-date">{{ jalaliDate($activeComment->created_at) }}</section>
                        @php
                            $author = $activeComment->user()->first();
                        @endphp
                        <section class="product-comment-title">
                            @if(empty($author->first_name) && empty($author->last_name))
                                ناشناس
                            @else
                                {{ $author->first_name . ' ' . $author->last_name }}
                            @endif
                        </section>
                    </section>
                    <section
                        class="product-comment-body @if($activeComment->answers()->count() > 0) border-bottom  @endif">
                        {!! $activeComment->body !!}
                    </section>


                    @foreach ($activeComment->answers()->get() as $commentAnswer)
                        <section class="product-comment">
                            <section class="product-comment-header d-flex justify-content-start">
                                <section
                                    class="product-comment-date">{{ jalaliDate($commentAnswer->created_at) }}</section>
                                @php
                                    $author = $commentAnswer->user()->first();
                                @endphp
                                <section class="product-comment-title">
                                    @if(empty($author->first_name) && empty($author->last_name))
                                        ناشناس
                                    @else
                                        {{ $author->first_name . ' ' . $author->last_name }}
                                    @endif
                                </section>
                            </section>
                            <section
                                class="product-comment-body @if($commentAnswer->answers()->count() > 0) border-bottom @endif">
                                {!! $commentAnswer->body !!}
                            </section>
                        </section>
                    @endforeach


                </section>
            @endforeach
        @endif


    </section>
</section>
