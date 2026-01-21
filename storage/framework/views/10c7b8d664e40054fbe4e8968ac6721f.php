<?php
    use Modules\Team\App\Models\Team;

    $theme3_team = getContent('theme3_team.content', true);
    $teams = Team::with('front_translate')
        ->latest()
        ->take(8)
        ->get();
    
    $uniqueId = 'team-slider-' . uniqid();
?>


<?php if($teams->count() > 0): ?>
    <!-- td-team-area-start -->
    <div class="tg-team-area p-relative" style="background-color: #f8f5f0; border-radius: 20px; padding: 40px 20px; margin: 40px 0;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <div class="tg-team-4-wrap">
                        <div class="row justify-content-center mb-40">
                            <div class="col-lg-8 text-center">
                                <h2 class="tg-team-section-title mb-10" style="font-size: 36px; font-weight: 700; color: #2d3436; margin-bottom: 10px;">
                                    Our Team
                                </h2>
                                <div class="tg-team-section-underline" style="width: 60px; height: 3px; background-color: #e74c3c; margin: 0 auto 20px;"></div>
                                <p class="tg-team-section-subtitle" style="font-size: 16px; color: #636e72; max-width: 600px; margin: 0 auto;">
                                    We strive to do everything so that you can comfortably and productively work in our space and create amazing products and services
                                </p>
                            </div>
                        </div>
                        
                        <!-- Team Slider -->
                        <div class="team-slider-container position-relative">
                            <div class="swiper team-slider-active" id="<?php echo e($uniqueId); ?>">
                                <div class="swiper-wrapper">
                                    <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="swiper-slide">
                                            <div class="tg-team-4-card text-center position-relative team-card-clickable"
                                                 data-team-id="<?php echo e($team->id); ?>">
                                                <div class="tg-team-4-thumb mb-20">
                                                    <img src="<?php echo e(asset($team->image)); ?>"
                                                         alt="<?php echo e($team->front_translate?->name); ?>"
                                                         class="img-fluid team-avatar"
                                                         style="width: 100%; height: 250px; object-fit: contain; object-position: center; border-radius: 12px;">
                                                </div>
                                                <div class="tg-team-4-content">
                                                    <h5 class="tg-team-4-name mb-5" style="font-size: 18px; font-weight: 600; color: #2d3436; margin-bottom: 5px;">
                                                        <?php echo e($team->front_translate?->name); ?>

                                                    </h5>
                                                    <span class="tg-team-4-designation d-block mb-10" style="font-size: 14px; color: #7C37FF; font-weight: 500;">
                                                        <?php echo e($team->front_translate?->designation); ?>

                                                    </span>
                                                    <div class="tg-team-4-social-icons d-flex justify-content-center gap-3 mt-20">
                                                        <a href="<?php echo e($team->facebook); ?>" target="_blank" class="tg-team-social-link">
                                                            <i class="fab fa-facebook-f"></i>
                                                        </a>
                                                        <a href="<?php echo e($team->instagram); ?>" target="_blank" class="tg-team-social-link">
                                                            <i class="fab fa-instagram"></i>
                                                        </a>
                                                        <a href="<?php echo e($team->youtube); ?>" target="_blank" class="tg-team-social-link">
                                                            <i class="fab fa-youtube"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            
                            <!-- Navigation buttons -->
                            <div class="team-slider-navigation">
                                <button class="team-slider-prev">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                                <button class="team-slider-next">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- td-team-area-end -->

    <?php $__env->startPush('style_section'); ?>
        <style>
            .tg-team-4-card {
                background: #ffffff;
                border-radius: 16px;
                padding: 25px 15px;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
                transition: all 0.3s ease;
                height: 100%;
                cursor: pointer;
                overflow: hidden;
                max-width: 320px;
                margin: 0 auto;
            }

            .tg-team-4-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
            }

            .team-avatar {
                transition: all 0.3s ease;
                width: 100%;
                height: 250px;
                object-fit: contain;
                object-position: center;
                border-radius: 12px;
                background-color: #f8f9fa;
            }

            .tg-team-4-name {
                font-size: 18px;
                font-weight: 600;
                color: #2d3436;
                margin-bottom: 5px;
            }

            .tg-team-4-designation {
                font-size: 14px;
                color: #7C37FF;
                font-weight: 500;
            }

            .tg-team-section-title {
                font-size: 36px;
                font-weight: 700;
                color: #2d3436;
                margin-bottom: 10px;
            }

            .tg-team-section-subtitle {
                font-size: 16px;
                color: #636e72;
            }

            .tg-btn-primary {
                background: linear-gradient(135deg, #7C37FF 0%, #9b59b6 100%);
                border: none;
                color: #ffffff;
                padding: 12px 30px;
                border-radius: 30px;
                font-weight: 600;
                transition: all 0.3s ease;
            }

            .tg-btn-primary:hover {
                transform: translateY(-2px);
                box-shadow: 0 5px 20px rgba(124, 55, 255, 0.4);
                color: #ffffff;
            }

            /* Slider Navigation */
            .team-slider-container {
                position: relative;
                padding: 0 50px;
                overflow: hidden;
            }

            .swiper {
                width: 100%;
                padding: 10px 0;
            }

            .swiper-slide {
                height: auto;
                display: flex;
                align-items: stretch;
                width: auto !important;
            }

            .tg-team-4-card {
                width: 320px;
                max-width: 320px;
                height: auto;
            }

            .team-slider-navigation {
                position: absolute;
                top: 50%;
                left: 0;
                right: 0;
                transform: translateY(-50%);
                display: flex;
                justify-content: space-between;
                pointer-events: none;
                z-index: 10;
            }

            .team-slider-prev,
            .team-slider-next {
                pointer-events: all;
                width: 50px;
                height: 50px;
                border-radius: 50%;
                background: #ffffff;
                border: 1px solid #e0e0e0;
                color: #2d3436;
                font-size: 18px;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: all 0.3s ease;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            }

            .team-slider-prev:hover,
            .team-slider-next:hover {
                background: #f8f9fa;
                transform: scale(1.1);
                box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
            }

            .team-slider-prev {
                margin-left: -25px;
            }

            .team-slider-next {
                margin-right: -25px;
            }

            .tg-team-4-social-icons {
                margin-top: 20px;
            }

            .tg-team-social-link {
                width: 36px;
                height: 36px;
                background: #f8f9fa;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #e74c3c;
                transition: all 0.3s ease;
                border: 1px solid #e0e0e0;
            }

            .tg-team-social-link:hover {
                background: #e74c3c;
                color: #ffffff;
                transform: translateY(-3px);
            }

            .tg-team-section-underline {
                width: 60px;
                height: 3px;
                background-color: #e74c3c;
                margin: 0 auto 20px;
            }

            @media (max-width: 991px) {
                .team-slider-container {
                    padding: 0 40px;
                }
            }

            @media (max-width: 767px) {
                .team-slider-container {
                    padding: 0 35px;
                }

                .team-slider-prev,
                .team-slider-next {
                    width: 40px;
                    height: 40px;
                    font-size: 16px;
                }
            }
        </style>
    <?php $__env->stopPush(); ?>

    <?php $__env->startPush('js_section'); ?>
        <script>
            // Team member data
            const teamMembers = {
                <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                "<?php echo e($team->id); ?>": {
                    name: "<?php echo e($team->front_translate?->name); ?>",
                    designation: "<?php echo e($team->front_translate?->designation); ?>",
                    image: "<?php echo e(asset($team->image)); ?>",
                    phone: "<?php echo e($team->phone_number); ?>",
                    email: "<?php echo e($team->mail); ?>",
                    address: "<?php echo e($team->address); ?>",
                    website: "<?php echo e($team->website); ?>",
                    facebook: "<?php echo e($team->facebook); ?>",
                    twitter: "<?php echo e($team->twitter); ?>",
                    linkedin: "<?php echo e($team->linkedin); ?>",
                    instagram: "<?php echo e($team->instagram); ?>",
                    youtube: "<?php echo e($team->youtube); ?>"
                },
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            };

            // Initialize team slider
            document.addEventListener('DOMContentLoaded', function() {
                const swiperContainer = document.getElementById('<?php echo e($uniqueId); ?>');
                const nextBtn = document.querySelector('.team-slider-next');
                const prevBtn = document.querySelector('.team-slider-prev');
                
                if (swiperContainer && nextBtn && prevBtn) {
                    const teamSlider = new Swiper('#<?php echo e($uniqueId); ?>', {
                        slidesPerView: 3,
                        spaceBetween: 20,
                        loop: true,
                        autoplay: {
                            delay: 5000,
                            disableOnInteraction: false,
                        },
                        navigation: {
                            nextEl: nextBtn,
                            prevEl: prevBtn,
                        },
                        observer: true,
                        observeParents: true,
                        slidesOffsetBefore: 0,
                        slidesOffsetAfter: 0,
                        breakpoints: {
                            0: {
                                slidesPerView: 1,
                                spaceBetween: 15,
                            },
                            576: {
                                slidesPerView: 2,
                                spaceBetween: 15,
                            },
                            992: {
                                slidesPerView: 3,
                                spaceBetween: 20,
                            },
                        },
                    });

                    // Add click event listeners to team cards
                    const teamCards = document.querySelectorAll('.team-card-clickable');
                    teamCards.forEach(card => {
                        card.addEventListener('click', function() {
                            const teamId = this.getAttribute('data-team-id');
                            showTeamMemberDetails(teamId);
                        });
                    });
                }
            });

            function showTeamMemberDetails(teamId) {
                const member = teamMembers[teamId];
                if (!member) return;

                // This function requires a modal in the HTML to show details.
                // Assuming a modal with id 'teamMemberModal' and elements with corresponding ids exists.
                const modal = document.getElementById('teamMemberModal');
                if (!modal) return;

                // Update modal content
                document.getElementById('modalTeamImage').src = member.image;
                document.getElementById('modalTeamName').textContent = member.name;
                document.getElementById('modalTeamDesignation').textContent = member.designation;
                
                const phoneLink = document.getElementById('modalTeamPhone');
                if(phoneLink){
                    phoneLink.textContent = member.phone || 'Non disponible';
                    phoneLink.href = member.phone ? `tel:${member.phone}` : '#';
                }

                const emailLink = document.getElementById('modalTeamEmail');
                if(emailLink){
                    emailLink.textContent = member.email || 'Non disponible';
                    emailLink.href = member.email ? `mailto:${member.email}` : '#';
                }
                
                const addressText = document.getElementById('modalTeamAddress');
                if(addressText) {
                    addressText.textContent = member.address || 'Non disponible';
                }
                
                const websiteLink = document.getElementById('modalTeamWebsite');
                if(websiteLink){
                    websiteLink.textContent = member.website || 'Non disponible';
                    websiteLink.href = member.website || '#';
                }
                
                // Update social links
                const socialLinks = {
                    Facebook: member.facebook,
                    Twitter: member.twitter,
                    Linkedin: member.linkedin,
                    Instagram: member.instagram,
                    Youtube: member.youtube
                };

                for (const [social, url] of Object.entries(socialLinks)) {
                    const link = document.getElementById(`modalTeam${social}`);
                    if(link){
                        link.href = url || '#';
                        link.style.display = url ? 'flex' : 'none';
                    }
                }
                
                // Show modal
                const modalInstance = new bootstrap.Modal(modal);
                modalInstance.show();
            }
        </script>
    <?php $__env->stopPush(); ?>
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\archive\archive\Cms/themes/theme3/views/components/team.blade.php ENDPATH**/ ?>