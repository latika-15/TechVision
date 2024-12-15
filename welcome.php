<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if user is not logged in
    header('Location: login.php');
    exit();
}

// Fetch user details from session
$firstName = $_SESSION['first_name'];
$lastName = $_SESSION['last_name'];
$email = $_SESSION['email'];
?>


$firstName = $_SESSION['first_name'];
$lastName = $_SESSION['last_name'];
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - TechVision</title>
    <style>
        /* General Styling */
body, html {
    margin: 0;
    padding: 0;
    height: 100%;
    font-family: 'Arial', sans-serif;
}

/* Welcome Section */
.welcome-section {
    text-align: center;
    background: linear-gradient(to right, #003C43, #3A1078);
    color: white;
    padding: 70px 10px 30px 10px;
}

.welcome-content h1 {
    font-size: 3em;
    margin-bottom: 20px;
}

.welcome-content p {
    font-size: 1.2em;
    margin-bottom: 30px;
}

.get-started-button {
    background-color: #f39c12;
    padding: 10px 20px;
    text-decoration: none;
    color: white;
    border-radius: 5px;
}

/* Container for the Courses Section */
.courses-section {
    display: flex;
    overflow-x: auto;  /* Enables horizontal scrolling */
    gap: 20px;  /* Space between the course boxes */
    padding: 20px;
    width: 100%;
    background-color: #f4f4f4;
    box-sizing: border-box;
}

/* Each Course Box */
.course-box {
    background-color: #278aab;
    color: white;
    width: 250px;
    height: 300px;  /* Fixed height for consistent box size */
    border-radius: 10px;
    padding: 20px;
    text-align: center;
    box-sizing: border-box;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

/* Hover Effect for Course Box */
.course-box:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
}

/* Course Title */
.course-box h2 {
    font-size: 1.5em;
    margin: 0;
}

/* Course Description */
.course-box p {
    font-size: 1em;
    line-height: 1.4em;
    margin-top: 10px;
    text-overflow: ellipsis;
    overflow: hidden;
    height: 160px;  /* Limiting height of the text */
    display: -webkit-box;
    -webkit-line-clamp: 2;  /* Display only 2 lines of text */
    -webkit-box-orient: vertical;
}

/* Optional: Add scrollbar for when the content overflows */
.courses-section::-webkit-scrollbar {
    height: 8px;
}

.courses-section::-webkit-scrollbar-thumb {
    background-color: #278aab;
    border-radius: 4px;
}

.courses-section::-webkit-scrollbar-track {
    background-color: #e1e1e1;
}

/* Scroll Buttons */
/* .scroll-button {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 1.5em;
    z-index: 10;
}

.scroll-button:hover {
    background: rgba(0, 0, 0, 0.8);
}

.scroll-button-left {
    left: 10px;
}

.scroll-button-right {
    right: 10px;
} */

/* Header */
.header {
    background: linear-gradient(to right, #77bcb7, #278aab);
    color: white;
    padding: 1rem;
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 1000;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
}

.top-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.logo img {
    height: 50px;
}

.navigation a {
    margin: 0 1rem;
    color: white;
    font-weight: bold;
    
}
#course h2 {
            font-size: 2rem;
            color: #1f6981;
            margin-bottom: 1.5rem;
           }


        .wel{
  font-family: monospace;
  text-align: center;
  background-color: none;
}

#typewriter {
  font-size: 3em;
  color: #74b2cb;
} 
.content {
        padding: 20px;
        text-align: center;
    }
/* Contact Section */
.contact {
            background: #f4f4f9;
            padding: 4rem 2rem;
            text-align: center;
        }

        .contact h2 {
            font-size: 2rem;
            color: #1f6981;
            margin-bottom: 1.5rem;
        }

        .contact-form {
            max-width: 600px;
            margin: 0 auto;
            text-align: left;
        }

        .contact-form input, 
        .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
        }

        .contact-form button {
            background: #278aab;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        /* Footer */

footer {
    text-align: center;
    padding: 1rem;
    background: linear-gradient(to right, #77bcb7, #278aab);
    color: white;
    font-size: 0.9rem;
    margin-top: 2rem;
}

footer a {
    color: white;
    text-decoration: none;
}

footer a:hover {
    text-decoration: underline; 
}

.footer-content {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
}

.footer-section {
    margin-right: 30px;
}

.footer-section h4 {
    margin-bottom: 15px;
}

.footer-section ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-section ul li {
    margin-bottom: 10px;
}

.footer-section   
 ul li a {
    color: #fff;
}

.social-icons, .app-store-icons {
    display: flex;
}

.social-icons li, .app-store-icons li {
    margin-right: 10px;
}

.social-icons li a, .app-store-icons li a {
    color: #fff;
    font-size: 20px;
}

.copyright {
    text-align: center;
    margin-top: 20px;
}
/* Logout Button Styling */
.logout-button {
    background-color:  #03DAC5;  /* Red color for logout */
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    margin-left: 20px; /* Space between other navigation links */
}

.logout-button:hover {
    background-color: #3A1078; /* Darker red when hovered */
    transition: background-color 0.3s ease;
}
.profile {
  display: inline;
  align-items: center;
  
}

.profile-logo {
  width: 80px;
  height: 50px;
  border-radius: 50%;
 
  cursor: pointer;
  transition: transform 0.3s;
}

.profile-logo:hover {
  transform: scale(1.1);
}
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <!-- Header Section -->
<header class="header">
    <div class="top-bar">
        <a href="#" class="logo">
            <img src="final_logo.png" alt="LOGO">
        </a>
        <nav class="navigation">
            <a href="#course">Courses</a>
            <a href="certify.php">Certifications</a>
            <a href="dashboard.php">Dashboard</a>
            <a href="#contact">Contact</a>

            <!-- Logout Button -->
            <a href="logout.php" class="logout-button">Logout</a>
            <!-- <div class="profile">
        <a href="profile.php">
          <img src="assets/profile_logo.png" alt="Profile" class="profile-logo">
        </a>
      </div> -->
        </nav>
    </div>
</header>

    <!-- Welcome Section -->
    <section class="welcome-section">
        <div class="welcome-content">
            <h1>Welcome, <?php echo htmlspecialchars($firstName . ' ' . $lastName); ?>!</h1>
            <p>Email: <?php echo htmlspecialchars($email); ?></p>
            <div class="content">
            <p id="typewriter" class="wel"></p>
        </div>
        <p>Your ultimate guide to acing your college journey with the perfect blend of tech courses, gaining right skills, certifications, and training -- One semester at a time!.</p>
            <a href="sem.php" class="get-started-button">Semester-Wise</a>
            <p>Explore our recommended courses below!</p>
        </div>
    </section>

    

    <!-- Course Section -->
    <section class="courses-section" id="course">
        <h2>Courses</h2>
       
    <div class="course-box" onclick="location.href='developer.html';">
        <h2>Web Development</h2>
        <p>Creating websites and web applications using languages like HTML, CSS, JavaScript, and backend frameworks.</p>
    </div>
    <div class="course-box" onclick="location.href='app.php';">
        <h2>App Development</h2>
        <p>Designing and building software applications for mobile and desktop platforms using programming languages and frameworks.</p>
    </div>
    <div class="course-box" onclick="location.href='cloud.php';">
        <h2>Cloud Computing</h2>
        <p>Explore the world of cloud technologies, infrastructure, and services.</p>
    </div>
    <div class="course-box" onclick="location.href='Aiml.php';">
        <h2>AI/ML</h2>
        <p>Developing systems that can learn and make decisions from data through machine learning algorithms and artificial intelligence techniques.</p>
</div>
    <div class="course-box" onclick="location.href='prog.php';">
        <h2>Programming Languages</h2>
        <p>Writing software code using languages to develop applications, from system-level programs to complex software solutions.</p>
    </div>
    <div class="course-box" onclick="location.href='graphic.php';">
        <h2>Graphic Designing</h2>
        <p>Creating visual content such as logos, illustrations, and layouts using design tools like Photoshop and Illustrator.</p>
    </div>
    <div class="course-box" onclick="location.href='cyber.php';">
        <h2>Cybersecurity</h2>
        <p>Protecting systems, networks, and data from cyber threats and attacks through encryption, firewalls, and other security measures.</p>
    </div>
</section>

      
    </section>
    <section class="contact" id="contact">
    <h2>Contact Us</h2>
    <form class="contact-form" action="submit.php" method="POST">
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <textarea name="message" placeholder="Your Message" rows="5" required></textarea>
        <button type="submit">Send Message</button>
    </form>
</section>

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
                    <li><a href="#">Terms of use</a></li>
                    <li><a href="#">Privacy policy</a></li>
                    <li><a href="#">Log In</a></li>
                </ul>
            </div>
    
        </div>
    
        
            <p>© 2024 TechVision. Empowering students to achieve more.</p>
      
    </footer>

    <script>
        


        const typewriter = document.getElementById('typewriter');
const text = "Shaping Engineers for future";

async function typeWriter() {
  for (const char of text) {
    await new Promise(resolve => setTimeout(resolve, 100)); // Adjust delay as needed
    typewriter.textContent += char;
  }
}

typeWriter();

const welcomeElement = document.getElementById('welcome');
let isFloating = true;

window.addEventListener('scroll', () => {
  const scrollPosition = window.scrollY;

  if (scrollPosition > 100 && isFloating) { // Adjust the scroll threshold as needed
    welcomeElement.style.animation = 'none';
    isFloating = false;
  } else if (scrollPosition < 100 && !isFloating) {
    welcomeElement.style.animation = 'floatIn 2s ease-in-out';
    isFloating = true;
  }
});

    </script>
</body>
</html>
