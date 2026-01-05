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
    <div class="tg-team-area tg-team-su-wrap p-relative pt-50 pb-50">
        <img class="tg-team-su-shape d-none d-xxl-block" src="<?php echo e(asset('frontend/assets/img/shape/hill-2.png')); ?>" alt="">
        <img class="tg-team-su-shape-2 d-none d-lg-block" src="<?php echo e(asset('frontend/assets/img/shape/parasut-2.png')); ?>" alt="">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <div class="tg-team-4-wrap">
                        <div class="row justify-content-center mb-30">
                            <div class="col-lg-8">
                                <div class="tg-team-header-wrap text-center">
                                    <h4 class="tg-team-section-title mb-10"><?php echo e(getTranslatedValue($theme3_team, 'section_title', 'Notre Équipe')); ?></h4>
                                    <p class="tg-team-section-subtitle"><?php echo e(getTranslatedValue($theme3_team, 'section_subtitle', 'Rencontrez nos conseillers expérimentés')); ?></p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Team Slider -->
                        <div class="team-slider-container position-relative">
                            <div class="swiper-container team-slider-active" id="<?php echo e($uniqueId); ?>">
                                <div class="swiper-wrapper">
                                    <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="swiper-slide">
                                            <div class="tg-team-4-card text-center position-relative team-card-clickable"
                                                 data-team-id="<?php echo e($team->id); ?>">
                                                <div class="tg-team-4-thumb mb-20">
                                                    <img src="<?php echo e(asset($team->image)); ?>"
                                                         alt="<?php echo e($team->front_translate?->name); ?>"
                                                         class="img-fluid team-avatar"
                                                         style="width: 100%; height: 280px; object-fit: cover; border-radius: 12px;">
                                                </div>
                                                <div class="tg-team-4-content">
                                                    <h5 class="tg-team-4-name mb-5"><?php echo e($team->front_translate?->name); ?></h5>
                                                    <span class="tg-team-4-designation d-block mb-10"><?php echo e($team->front_translate?->designation); ?></span>
                                                    <div class="tg-team-4-contact-hint">
                                                        <span class="text-muted small">
                                                            <i class="fa-solid fa-hand-pointer me-1"></i>
                                                            <?php echo e(__('translate.Cliquez pour voir les détails')); ?>

                                                        </span>
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
                                    <i class="fa-solid fa-arrow-left-long"></i>
                                </button>
                                <button class="team-slider-next">
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </button>
                            </div>
                        </div>

                        <?php if(getTranslatedValue($theme3_team, 'show_view_all') == '1'): ?>
                            <div class="row justify-content-center mt-30">
                                <div class="col-auto">
                                    <a href="<?php echo e(route('teams')); ?>" class="tg-btn tg-btn-primary">
                                        <span><?php echo e(__('translate.Voir toute l\'équipe')); ?></span>
                                        <i class="fa-solid fa-arrow-right-long ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- td-team-area-end -->

    <!-- Team Member Details Modal -->
    <div class="modal fade" id="teamMemberModal" tabindex="-1" aria-labelledby="teamMemberModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content tg-team-modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body p-0">
                    <div class="row g-0">
                        <div class="col-lg-5">
                            <div class="tg-team-modal-thumb">
                                <img id="modalTeamImage" src="" alt="" class="w-100 h-100 object-fit-cover" style="min-height: 400px;">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="tg-team-modal-info p-40">
                                <h4 id="modalTeamName" class="tg-team-modal-name mb-10"></h4>
                                <span id="modalTeamDesignation" class="tg-team-modal-designation d-block mb-30"></span>
                                
                                <div class="tg-team-modal-contact-info mb-30">
                                    <h6 class="tg-team-modal-contact-title mb-20"><?php echo e(__('translate.Coordonnées')); ?></h6>
                                    
                                    <div class="tg-team-contact-item mb-15">
                                        <div class="d-flex align-items-center">
                                            <div class="tg-team-contact-icon me-3">
                                                <i class="fa-solid fa-phone"></i>
                                            </div>
                                            <div class="tg-team-contact-details">
                                                <span class="d-block small text-muted"><?php echo e(__('translate.Téléphone')); ?></span>
                                                <a id="modalTeamPhone" href="tel:" class="fw-semibold"></a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="tg-team-contact-item mb-15">
                                        <div class="d-flex align-items-center">
                                            <div class="tg-team-contact-icon me-3">
                                                <i class="fa-solid fa-envelope"></i>
                                            </div>
                                            <div class="tg-team-contact-details">
                                                <span class="d-block small text-muted"><?php echo e(__('translate.Email')); ?></span>
                                                <a id="modalTeamEmail" href="mailto:" class="fw-semibold"></a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="tg-team-contact-item mb-15">
                                        <div class="d-flex align-items-center">
                                            <div class="tg-team-contact-icon me-3">
                                                <i class="fa-solid fa-location-dot"></i>
                                            </div>
                                            <div class="tg-team-contact-details">
                                                <span class="d-block small text-muted"><?php echo e(__('translate.Adresse')); ?></span>
                                                <span id="modalTeamAddress" class="fw-semibold"></span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="tg-team-contact-item mb-15">
                                        <div class="d-flex align-items-center">
                                            <div class="tg-team-contact-icon me-3">
                                                <i class="fa-solid fa-globe"></i>
                                            </div>
                                            <div class="tg-team-contact-details">
                                                <span class="d-block small text-muted"><?php echo e(__('translate.Site web')); ?></span>
                                                <a id="modalTeamWebsite" href="#" target="_blank" class="fw-semibold"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="tg-team-modal-social">
                                    <h6 class="tg-team-modal-contact-title mb-15"><?php echo e(__('translate.Réseaux sociaux')); ?></h6>
                                    <div class="d-flex gap-2">
                                        <a id="modalTeamFacebook" href="#" target="_blank" class="tg-team-social-link">
                                            <i class="fa-brands fa-facebook-f"></i>
                                        </a>
                                        <a id="modalTeamTwitter" href="#" target="_blank" class="tg-team-social-link">
                                            <i class="fa-brands fa-twitter"></i>
                                        </a>
                                        <a id="modalTeamLinkedin" href="#" target="_blank" class="tg-team-social-link">
                                            <i class="fa-brands fa-linkedin-in"></i>
                                        </a>
                                        <a id="modalTeamInstagram" href="#" target="_blank" class="tg-team-social-link">
                                            <i class="fa-brands fa-instagram"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $__env->startPush('style_section'); ?>
        <style>
            .tg-team-4-card {
                background: #ffffff;
                border-radius: 16px;
                padding: 20px;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
                transition: all 0.3s ease;
                height: 100%;
                cursor: pointer;
                overflow: hidden;
            }

            .tg-team-4-card:hover {
                transform: translateY(-10px);
                box-shadow: 0 8px 30px rgba(124, 55, 255, 0.2);
            }

            .team-avatar {
                transition: all 0.3s ease;
                width: 100%;
                height: 280px;
                object-fit: cover;
                border-radius: 12px;
            }

            .tg-team-4-card:hover .team-avatar {
                transform: scale(1.05);
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
                font-size: 32px;
                font-weight: 700;
                color: #2d3436;
                margin-bottom: 10px;
            }

            .tg-team-section-subtitle {
                font-size: 15px;
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
                background: linear-gradient(135deg, #7C37FF 0%, #9b59b6 100%);
                border: none;
                color: #ffffff;
                font-size: 18px;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: all 0.3s ease;
                box-shadow: 0 4px 15px rgba(124, 55, 255, 0.3);
            }

            .team-slider-prev:hover,
            .team-slider-next:hover {
                transform: scale(1.1);
                box-shadow: 0 6px 20px rgba(124, 55, 255, 0.5);
            }

            .team-slider-prev {
                margin-left: -25px;
            }

            .team-slider-next {
                margin-right: -25px;
            }

            /* Modal Styles */
            .tg-team-modal-content {
                border-radius: 20px;
                border: none;
                box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            }

            .modal-header .btn-close {
                position: absolute;
                top: 15px;
                right: 15px;
                background: rgba(124, 55, 255, 0.1);
                border-radius: 50%;
                width: 40px;
                height: 40px;
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 10;
                transition: all 0.3s ease;
            }

            .modal-header .btn-close:hover {
                background: #7C37FF;
                color: #ffffff;
            }

            .tg-team-modal-thumb img {
                border-radius: 20px 0 0 20px;
            }

            .tg-team-modal-name {
                font-size: 28px;
                font-weight: 700;
                color: #2d3436;
            }

            .tg-team-modal-designation {
                font-size: 16px;
                color: #7C37FF;
                font-weight: 600;
            }

            .tg-team-contact-icon {
                width: 45px;
                height: 45px;
                background: linear-gradient(135deg, #7C37FF 0%, #9b59b6 100%);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #ffffff;
                font-size: 18px;
            }

            .tg-team-contact-item a,
            .tg-team-contact-item span {
                color: #2d3436;
                text-decoration: none;
                transition: color 0.3s ease;
            }

            .tg-team-contact-item a:hover {
                color: #7C37FF;
            }

            .tg-team-social-link {
                width: 40px;
                height: 40px;
                background: #f8f9fa;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #2d3436;
                transition: all 0.3s ease;
            }

            .tg-team-social-link:hover {
                background: #7C37FF;
                color: #ffffff;
                transform: translateY(-3px);
            }

            @media (max-width: 991px) {
                .team-slider-container {
                    padding: 0 40px;
                }

                .tg-team-modal-thumb img {
                    border-radius: 20px 20px 0 0;
                    min-height: 300px;
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

    <?php $__env->startPush('script_section'); ?>
        <script>
            // Team member data
            const teamMembers = {
                <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($team->id); ?>: {
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
                    instagram: "<?php echo e($team->instagram); ?>"
                },
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            };

            // Initialize team slider
            document.addEventListener('DOMContentLoaded', function() {
                const teamSlider = new Swiper('#<?php echo e($uniqueId); ?>', {
                    slidesPerView: 3,
                    spaceBetween: 30,
                    loop: true,
                    autoplay: {
                        delay: 5000,
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: '.team-slider-next',
                        prevEl: '.team-slider-prev',
                    },
                    breakpoints: {
                        0: {
                            slidesPerView: 1,
                            spaceBetween: 20,
                        },
                        576: {
                            slidesPerView: 2,
                            spaceBetween: 20,
                        },
                        992: {
                            slidesPerView: 3,
                            spaceBetween: 30,
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

                // Manual navigation button handlers
                const nextBtn = document.querySelector('.team-slider-next');
                const prevBtn = document.querySelector('.team-slider-prev');
                
                if (nextBtn) {
                    nextBtn.addEventListener('click', function(e) {
                        e.preventDefault();
                        teamSlider.slideNext();
                    });
                }
                
                if (prevBtn) {
                    prevBtn.addEventListener('click', function(e) {
                        e.preventDefault();
                        teamSlider.slidePrev();
                    });
                }
            });

            function showTeamMemberDetails(teamId) {
                const member = teamMembers[teamId];
                if (!member) return;

                // Update modal content
                document.getElementById('modalTeamImage').src = member.image;
                document.getElementById('modalTeamName').textContent = member.name;
                document.getElementById('modalTeamDesignation').textContent = member.designation;
                
                const phoneLink = document.getElementById('modalTeamPhone');
                phoneLink.textContent = member.phone || 'Non disponible';
                phoneLink.href = member.phone ? `tel:${member.phone}` : '#';
                
                const emailLink = document.getElementById('modalTeamEmail');
                emailLink.textContent = member.email || 'Non disponible';
                emailLink.href = member.email ? `mailto:${member.email}` : '#';
                
                document.getElementById('modalTeamAddress').textContent = member.address || 'Non disponible';
                
                const websiteLink = document.getElementById('modalTeamWebsite');
                websiteLink.textContent = member.website || 'Non disponible';
                websiteLink.href = member.website || '#';
                
                // Update social links
                const facebookLink = document.getElementById('modalTeamFacebook');
                facebookLink.href = member.facebook || '#';
                facebookLink.style.display = member.facebook ? 'flex' : 'none';
                
                const twitterLink = document.getElementById('modalTeamTwitter');
                twitterLink.href = member.twitter || '#';
                twitterLink.style.display = member.twitter ? 'flex' : 'none';
                
                const linkedinLink = document.getElementById('modalTeamLinkedin');
                linkedinLink.href = member.linkedin || '#';
                linkedinLink.style.display = member.linkedin ? 'flex' : 'none';
                
                const instagramLink = document.getElementById('modalTeamInstagram');
                instagramLink.href = member.instagram || '#';
                instagramLink.style.display = member.instagram ? 'flex' : 'none';
                
                // Show modal
                const modal = new bootstrap.Modal(document.getElementById('teamMemberModal'));
                modal.show();
            }
        </script>
    <?php $__env->stopPush(); ?>

<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\archive\archive\Cms/themes/theme3/views/components/team.blade.php ENDPATH**/ ?>