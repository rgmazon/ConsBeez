<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <?php
    include 'public/components/head.php'; 
    ?>

    <!-- Glide.js CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@glidejs/glide@3.5.2/dist/css/glide.core.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@glidejs/glide@3.5.2/dist/css/glide.theme.min.css">
</head>

<body>
    <?php include 'public/components/navbar.php'; ?>
    
    
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
        <span class="mini-title mb-2 d-block">Careers</span>
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="display-5 fw-bold mb-4">Nurturing top talent with a focus on employee well-being and work-life balance.</h2>
                    <p class="lead mb-4 text-muted">Our people are at the heart of our success. We foster a culture of inclusion and diversity, where you can be your authentic self and thrive. We offer rewarding careers, not just jobs, with competitive compensation, ongoing development opportunities, and a clear path for advancement. Because we believe happy, motivated employees are our most valuable asset.</p>
                    <div class="d-flex gap-3">
                        <a href="contact.php" class="btn btn-lg btn-yellow">Get Started</a>
                        <a href="services.php" class="btn btn-lg btn-orange">Explore Solutions</a>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Section With Animated BG -->
    <section class="with-animated-bg py-5">
    <?php include 'public/components/hexagon.php'; ?>

        <!-- Vision, Mission, Values -->
        <div class="container">

            <div class="values-section">
                <h2 class="fw-bold mb-4 display-6 values-title">
                    We want <span class="highlight-orange">curious</span>, <span class="highlight-orange">open</span>, and
                    <span class="highlight-orange">positive</span> people to join us in empowering brands and creating meaningful experiences for everyone.
                </h2>
            </div>
            
        </div>


        <div class="container why-join-us-container py-5">
            <div class="why-join-us-section">
                <h2 class="fw-bold mb-4 display-4 values-title text-center">
                    Why <span class="highlight-orange">Join</span> Us?
                </h2>
                <p class="description lead text-muted text-center">
                "Elevate your career with ConsBeez. Our supportive culture, attractive benefits, and numerous growth opportunities create the ideal environment for professional development. Join us today and unlock your full potential."
                </p>
            </div>
        </div>

        <!-- Why Join Us Cards -->
        <div class="container py-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="section section-orange text-start">
                        <h2 class="box-title-join">Develop Strong Communication Skills</h2>
                        <p class="text-muted">
                            A call center environment at ConsBeez is an excellent platform to enhance communication skills. 
                            You'll engage with diverse customers, resolve issues, and develop effective communication, 
                            active listening, and professionalism—skills valuable across various careers.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="section section-green text-start">
                        <h2 class="box-title-join">Build Customer Service Expertise</h2>
                        <p class="text-muted">
                            ConsBeez is dedicated to delivering exceptional customer service. Joining our team provides 
                            valuable experience in customer interaction and problem-solving. You'll master handling 
                            inquiries, complaints, and requests efficiently, ensuring timely and satisfactory resolutions. 
                            These skills foster a customer-centric mindset, highly valued across industries, and open 
                            doors to diverse career opportunities.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="section section-yellow text-start">
                        <h2 class="box-title-join">Career Advancement Opportunities</h2>
                        <p class="text-muted">
                            ConsBeez offers clear career growth, from customer service roles to leadership positions, 
                            supported by training programs. Skills like problem-solving, conflict resolution, and 
                            multitasking gained here are highly transferable across industries.
                        </p>
                    </div>
                </div>
            </div>
        </div>


        <!-- Top Talents Section -->
         <div class="container top-talents-container">
            <h2 class="fw-bold mb-4 mt-5 display-5 text-center">ConsBeez <span class="highlight">Top</span> Talent</h2>
            <p class="lead text-muted text-center">At ConsBeez, we take pride in our innovative thinking and problem-solving expertise. If you're committed to success and focused on growing your business, ConsBeez is your ideal partner!</p>
            
            
            <!-- Top Talents Carousel -->
            <?php include 'public/components/top-talents-carousel.php'; ?>
         </div>

    </section>


    





    


    <!-- Call to Action Section -->
    <section class="cta-section-story py-5 text-center">
        <div class="container py-5">
            <h2 class="fw-bold mb-4 display-5 cta-title">Empower Your Business Now!</h2>
            <p class="mb-4 lead text-muted">Unlock tailored digital solutions that drive success. Let's get started on transforming your business now!</p>
            <div class="d-flex justify-content-center gap-3 cta-button-container">
                <!-- <button class="btn btn-primary btn-lg">Learn More</button> -->
                <a href="contact.php" class="btn btn-lg btn-primary">Learn More</a>
                <a href="services.php" class="btn btn-lg btn-second">Explore →</a>
                <!-- <button class="btn btn-second btn-lg">Explore →</button> -->
            </div>
        </div>
    </section>

    <?php include 'public/components/footer.php'; ?>

    <script src="public/js/scroll.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> -->

</body>