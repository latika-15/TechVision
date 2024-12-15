<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprehensive App Development Guide</title>
    <style>
        /* General Styles */
body {
    margin: 0;
    font-family: Arial, sans-serif;
    color: #333;
    line-height: 1.6;
}

.container {
    width: 90%;
    max-width: 1200px;
    margin: 0 auto;
}

/* Header and Navbar */
.header {
    background: linear-gradient(to right, #77bcb7, #278aab);
    color: white;
    padding: 10px 20px;
    position: sticky;
    top: 0;
    z-index: 1000;
}

.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.navbar .logo h1 {
    margin: 0;
    font-size: 1.8rem;
}

.navbar nav ul {
    list-style: none;
    display: flex;
    margin: 0;
    padding: 0;
}

.navbar nav ul li {
    margin-left: 20px;
}

.navbar nav ul li a {
    color: white;
    text-decoration: none;
    font-weight: bold;
}

.navbar nav ul li a:hover {
    text-decoration: underline;
}

/* Content Headings */
.intro h2, .flowchart h2, .learning-path h2, .resources h2, .footer h2 {
    font-size: 2rem;
    color: #444;
    margin-bottom: 15px;
    text-align: center;
}

/* Table Styling */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table th, table td {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: left;
}

table th {
    background: #f4f4f4;
    color: #444;
    font-weight: bold;
}

/* Footer Styling */
.footer {
    background: linear-gradient(to right, #77bcb7, #278aab);
    color: white;
    padding: 20px;
    text-align: center;
}

    </style>
</head>
<body>
    <!-- Header with Navbar -->
    <header class="header">
        <div class="navbar">
            <div class="logo">
                <h1>AppDev Guide</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="#intro">Introduction</a></li>
                    <li><a href="#flowchart">Flowchart</a></li>
                    <li><a href="#learning-path">Learning Path</a></li>
                    <li><a href="#resources">Resources</a></li>
                 
                </ul>
            </nav>
        </div>
    </header>

    <!-- Introduction Section -->
    <section id="intro" class="intro">
        <div class="container">
            <h2>Introduction</h2>
            <p>App development is a journey that combines creativity, logic, and problem-solving skills. Whether you aim to develop mobile apps for Android, iOS, or cross-platform, this guide will lead you through every stage, from the basics to deployment.</p>
        </div>
    </section>

    <!-- Flowchart Section -->
    <section id="flowchart" class="flowchart">
        <div class="container">
            <h2>Learning Path Flowchart</h2>
            <p>This flowchart visually represents the step-by-step learning path for becoming a proficient app developer.</p>
            <img src="flowchart.png" alt="App Development Learning Path">
        </div>
    </section>

    <!-- Learning Path -->
    <section id="learning-path" class="learning-path">
        <div class="container">
            <h2>Detailed Learning Path</h2>
            <table>
                <thead>
                    <tr>
                        <th>Stage</th>
                        <th>Description</th>
                        <th>Time Duration</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1. Introduction to Programming</td>
                        <td>Learn programming basics using Python, JavaScript, or Java. Understand variables, loops, and functions.</td>
                        <td>2-3 Months</td>
                    </tr>
                    <tr>
                        <td>2. Understanding App Development</td>
                        <td>Explore native and cross-platform development. Familiarize yourself with Android Studio, Xcode, or Flutter.</td>
                        <td>1-2 Months</td>
                    </tr>
                    <tr>
                        <td>3. UI/UX Design</td>
                        <td>Understand user-centered design principles. Learn tools like Figma and Adobe XD to create wireframes and prototypes.</td>
                        <td>1-2 Months</td>
                    </tr>
                    <tr>
                        <td>4. Intermediate Concepts</td>
                        <td>Learn APIs, integrating databases, and basic security measures. Build small projects to implement your knowledge.</td>
                        <td>2-3 Months</td>
                    </tr>
                    <tr>
                        <td>5. Advanced Topics</td>
                        <td>Master advanced animations, performance optimization, and backend integration with tools like Firebase or Node.js.</td>
                        <td>2-4 Months</td>
                    </tr>
                    <tr>
                        <td>6. Testing and Debugging</td>
                        <td>Learn to test and debug your apps. Use tools like Espresso for Android or XCTest for iOS apps.</td>
                        <td>1-2 Months</td>
                    </tr>
                    <tr>
                        <td>7. Deployment and Monetization</td>
                        <td>Understand how to deploy apps on Google Play Store or Apple App Store. Learn app monetization techniques like ads and subscriptions.</td>
                        <td>1 Month</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Footer -->
    <footer id="footer" class="footer">
        <div class="container">
            <h2>About App Development</h2>
            <p>App development is a continuously evolving field. To succeed, stay updated with the latest tools and trends.</p>
            <div class="footer-links">
                <h3>Useful Links</h3>
                <ul>
                    <li><a href="https://developer.android.com/">Android Developer</a></li>
                    <li><a href="https://developer.apple.com/">iOS Developer</a></li>
                    <li><a href="https://flutter.dev/">Flutter Framework</a></li>
                </ul>
            </div>
            <div class="footer-contact">
                <h3>Contact Us</h3>
                <p>Email: techvision@gmail.com</p>
                <p>Phone: +xxx xxx xxxx</p>
                
            </div>
            <p>© 2024 TechVision. Empowering students to achieve more.</p>
        </div>

    </footer>
</body>
</html>
