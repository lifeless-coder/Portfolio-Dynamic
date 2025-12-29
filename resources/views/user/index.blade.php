<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('user/userStylesheet.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">

    <link id='favicon' rel="shortcut icon" href="./assets/images/favicon.png" type="image/x-png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <title>Portfolio</title>


</head>

<body style="font-family: 'Roboto', sans-serif;">

    <!-- Navigation -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top navbar-custom">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="#">Adrita Hasan</a>

            <!-- Toggler button for mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links aligned to right -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="#hero">Home</a>
                    <a class="nav-item nav-link" href="#about">About</a>
                    <a class="nav-item nav-link" href="#skills">Skills</a>
                    <a class="nav-item nav-link" href="#edu">Education</a>
                    <a class="nav-item nav-link" href="#projects">Projects</a>
                    <a class="nav-item nav-link" href="#experience">Experience</a>
                    <a class="nav-item nav-link" href="#achivement">Achievements</a>
                    <a class="nav-item nav-link" href="#contact">Contact</a>
                </div>
            </div>
        </div>
    </nav>






    <!-- hero Sections -->
    <section id="hero">
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="text-align: left;">
                    <div class="hero-text">
                        <h2 style="font-family: 'Paytone One', sans-serif; color: #072d55; font-size: 50px;">Hi There,<br>
                            I'm Adrita Hasan</h2>
                        <p style="color: #9d151e;"><strong>I am into Web Development</strong></p>
                        <button type="button" class="btn"><a href="#about" style="text-decoration: none; color: white;"> About me</a></button>
                    </div>
                    <div class="socials">
                        <a href="https://github.com/lifeless-coder"><i class="bi bi-github"></i></a>
                        <a href="https://www.linkedin.com/in/adrita-hasan/"><i class="bi bi-linkedin"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="{{ 'img/' . $heroimages->first()->path }}" alt="">
                </div>
            </div>
        </div>

    </section>

    <!-- About me -->
    <section id="about">
        <h1 style="text-align: center; color:black;"><i class="bi bi-person-fill"></i><strong>About Me</strong> </h1>
        <div class="container">
            <div class="side-by-side">
                <div class="left">
                    <h2>Left Side</h2>
                    <img src="{{ 'img/' . $about_image->first()->path }}" alt="">
                </div>
                <div class="right" style="padding-top: 70px;">
                    <div style="color: black; font-family: 'Lexend Deca', sans-serif;">
                        <strong>
                            <h4>{{ $about->first()->title }}</h4>
                            <h6>{{ $about->first()->subtitle }}</h6>
                        </strong>
                    </div>
                    <div class="about-me-body">
                        <p>{{ $about->first()->description }}</p>
                        <button><a href="https://drive.google.com/file/d/1NTmg-eo9zteA3bzIcFy2KAM-dTYnyirz/view?usp=sharing" style="text-decoration: none; color: white;">Resume</a></button>
                    </div>

                </div>
            </div>
        </div>

    </section>

    <section id="skills">
        <h1 style="text-align: center; color:white; text-shadow: 0 0 6px #6184aaff;"><i class="fa-solid fa-code"></i><strong> Skills & Abilities</strong> </h1>
        <div class="skills-container">
            @foreach ($skills as $skill)
            <div class="skill-card">
                <img src="{{ asset('img/' . $skill->image) }}" alt="{{ $skill->name }}">
                <p>{{ $skill->name }}</p>
            </div>
            @endforeach
        </div>
    </section>


    <!-- Education -->
    <section id="edu">
        <h1 style="text-align: center; color:black;"><i class="bi bi-mortarboard-fill"></i><strong> My Education</strong> </h1>
        <p style="text-align: center; color:black; font-size: 15px;">Educated by books, refined by practice.</p>
        
        @foreach ($educations as $education)
        <div class="edu-container">
            <div class="edu-card">
                <img src="{{ asset('img/' . $education->image) }}" class="edu-img" alt="Education Image">
                <div class="edu-details">
                    <h4 style="color: #072d55;"><strong>{{ $education->degree }}</strong></h5>
                        <h6>{{ $education->institution }}</h6>
                        <p style="font-size: 13px;">{{ $education->years }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </section>

    <!-- Projects -->
    <section id="projects">
        <h1 style="text-align: center; color:white;"><i class="fa-solid fa-laptop-code"></i><strong> Projects I Made</strong> </h1>

        <div class="projects-grid">
            @foreach($project as $project)
            <div class="project-card">
                <div class="card-image">
                    <img src="{{ asset('img/'.$project->image) }}" alt="{{ $project->title }}">

                    {{-- Hover overlay --}}
                    <div class="card-overlay">

                        <h3><strong>{{ $project->title }}</strong></h3>
                        <p>{{ $project->description }}</p>
                        <a href="{{ $project->project_url }}" class="btn">Code &lt;/&gt;</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>


    </section>

    <!-- Experience -->
    <section class="experience" id="experience">
        <h1 style="text-align: center; color:black;"><i class="bi bi-mortarboard-fill"></i><strong> Experience</strong> </h1>
        <div class="ex-conteiner">
            <div class="ex-card">
                <div class="ex-details" style="text-align: center;">
                    <h4 style="color: #000000ff;"><strong>Trainee Developer</strong></h5>
                        <h6>Softtech Solution LTD</h6>
                        <p style="font-size: 13px;">1 Oct 2025 - Present</p>

                </div>
            </div>
        </div>
    </section>

    <!-- Contact -->
    <section id="contact">
        <h1 style="text-align: center; color:black;"><i class="bi bi-envelope-fill"></i><strong> Contact Me</strong> </h1>
        <div class="contact-container">
            <div class="side-by-side">
                <div class="left">
                    <img src="\img\contact.jpeg" alt="">
                </div>
                <div class="right">
                    <form id="contactForm" class="contact-form" action="{{ route('portfolio.store') }}" method="POST">
                        @csrf
                        <input type="text" name="sender" placeholder="Your Name" required class="input-box">
                        <input type="email" name="email" placeholder="Your Email" required class="input-box">
                        <textarea name="message" placeholder="Your Message" required class="input-box"></textarea>
                        <button type="submit">Send Message</button>
                    </form>
                </div>

            </div>

        </div>
    </section>

</body>
<footer class="bg-dark text-light pt-5 pb-3">
    <div class="container">
        <div class="row">

            <!-- Left: Paragraph -->
            <div class="col-md-4 mb-4">
                <p class="">{{ $footertext->first()->text }}</p>
            </div>

            <!-- Middle: Quick Links -->
            <div class="col-md-4 mb-4 text-md-center">
                <h6 class="fw-bold"><strong>Quick Links</strong></h6>
                <ul class="list-unstyled">
                    @foreach ($quicklinks as $quicklink)
                    <li><a href="{{ $quicklink->url }}" class="text-light text-decoration-none">{{ $quicklink->name }}</a></li>
                    @endforeach
                </ul>
            </div>

            <!-- Right: Contact Info -->
            <div class="col-md-4 mb-4 text-md-end">
                <h6 class="fw-bold"><strong>Contact</strong></h6>
                @foreach ($fcontacts as $contact)
                <p class="mb-1 small">{{ $contact->text }}</p>
                @endforeach

                        <a href="https://github.com/lifeless-coder"><i class="bi bi-github"></i></a>
                        <a href="https://www.linkedin.com/in/adrita-hasan/"><i class="bi bi-linkedin"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                    
            </div>

        </div>

        <hr class="border-secondary">

        <div class="text-center small">
            © 2025 Adrita Hasan. All rights reserved.
        </div>
    </div>
</footer>

<script
    type="text/javascript"
    src="https://cdn.jsdelivr.net/npm/emailjs-com@3/dist/email.min.js"></script>

</html>