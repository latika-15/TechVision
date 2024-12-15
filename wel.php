<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if user is not logged in
    header('Location: login.php');
    exit();
}

$firstName = $_SESSION['first_name'];
$lastName = $_SESSION['last_name'];
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Study Path Helper</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <!-- Navigation Bar -->
    <header class="header">
        <div class="top-bar">
            <a href="#" class="logo">
                <img src="final_logo.png" alt="LOGO">
            </a>
            <nav class="navigation">
                <a href="#features">Features</a>
                <a href="#about">About</a>
                <a href="#contact">Contact</a>
                <a href="dashboard.php" class="dashboard-button">Dashboard</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="content">
            <p id="typewriter" class="wel"></p>
        </div>

        <section class="welcome-section">
            <div class="welcome-content">
                <h1>Welcome, <?php echo htmlspecialchars($firstName . ' ' . $lastName); ?>!</h1>
                <p>Email: <?php echo htmlspecialchars($email); ?></p>
                <p>Explore our recommended courses below!</p>
                <a href="dashboard.php" class="get-started-button">Go to Dashboard</a>
            </div>
        </section>
        <p>Your ultimate guide to acing your college journey with the perfect blend of tech and non-tech courses, gaining the right skills, certifications, and training — one semester at a time!</p>
    </section>

    <!-- Sliding Courses Section -->
    <section id="courses" class="courses-section">
        <h2>Recommended Courses</h2>
        <div class="courses-slider">
            <div class="course-item">
                <h3>Data Structures</h3>
                <p>Master core data structures and algorithms.</p>
            </div>
            <div class="course-item">
                <h3>Web Development</h3>
                <p>Build dynamic and responsive websites.</p>
            </div>
            <div class="course-item">
                <h3>AI & ML Basics</h3>
                <p>Learn fundamentals of Artificial Intelligence.</p>
            </div>
            <div class="course-item">
                <h3>Cybersecurity</h3>
                <p>Protect systems from cyber threats.</p>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features-section">
        <h2>Features</h2>
        <div class="features-container">
            <div class="feature-item">
                <h3>Course Recommendations</h3>
                <p>Get course suggestions tailored to your academic background and interests.</p>
            </div>
            <div class="feature-item">
                <h3>Progress Tracking Dashboard</h3>
                <p>Monitor your progress with a detailed dashboard, including certifications and skills.</p>
            </div>
            <div class="feature-item">
                <h3>Peer Community</h3>
                <p>Connect with peers and mentors to exchange ideas and solve doubts.</p>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="about" class="about-section">
        <h2>About Us</h2>
        <p>TechVision is a platform designed to empower college students by providing structured guidance on semester-wise planning, courses, and certifications. Our mission is to simplify your academic journey, enabling you to focus on achieving your dreams.</p>
        <div class="how-it-works">
            <h3>How It Works:</h3>
            <div class="steps">
                <div class="step">
                    <h4>1. Create Your Profile</h4>
                    <p>Sign up to get started and customize your learning journey.</p>
                </div>
                <div class="step">
                    <h4>2. Plan Your Semester</h4>
                    <p>Get semester-wise course recommendations tailored to your goals.</p>
                </div>
                <div class="step">
                    <h4>3. Track Your Progress</h4>
                    <p>Monitor your certifications, courses, and achievements easily.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact-section">
        <h2>Contact Us</h2>
        <form class="contact-form" action="submit.php" method="POST">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="message" placeholder="Your Message" rows="5" required></textarea>
            <button type="submit">Send Message</button>
        </form>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h4>TechVision</h4>
                <p>techvision@gmail.com</p>
                <p>+xxx xxx xxxx</p>
                <ul class="social-icons">
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Blog</h4>
                <ul>
                    <li><a href="#">Website</a></li>
                    <li><a href="#">Career</a></li>
                    <li><a href="#">How it works</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>About</h4>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contacts</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Our Team</a></li>
                    <li><a href="#">Terms of Service</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Content</h4>
                <ul>
                    <li><a href="#">Terms of Use</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Log In</a></li>
                </ul>
            </div>
        </div>
        <p>© 2024 TechVision. Empowering students to achieve more.</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>
