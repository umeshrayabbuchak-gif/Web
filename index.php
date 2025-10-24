<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Prem & Ruchika Connection</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Playfair+Display:ital@0;1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <audio id="bgm-player" loop>
        <source src="bgm.mp3" type="audio/mp3">
        Your browser does not support the audio element.
    </audio>

    <div id="loading-screen" class="visible">
        <div class="loader-content">
            <div class="loader-spinner">P & R</div>
            <h2 id="welcome-message">Hello, Ruchika!</h2>
            <p>Tap anywhere to begin your animated experience...</p>
        </div>
    </div>

    <nav>
        <div class="logo">P & R</div>
        <ul>
            <li><a href="#welcome">Welcome</a></li>
            <li><a href="#story">My Reason</a></li>
            <li><a href="#quiz">The Quiz</a></li>
            <li><a href="#message">A Note</a></li>
        </ul>
    </nav>

    <section id="welcome" class="hero-section">
        <div class="hero-content">
            <h1>Welcome, Ruchika.</h1>
            <p>This is a digital expression of everything you mean to Prem Prakash.</p>
            <a href="#story" class="cta-button">Start the Journey &rarr;</a>
            <div class="animated-icon">💖</div>
        </div>
    </section>

    <section id="story" class="reasons-section">
        <h2>Why I Built This for You</h2>
        <div class="reasons-container">
            <p style="font-size: 1.2rem; margin-bottom: 20px;">
                Ruchika, I know we haven't had a chance to speak yet, but watching you in class has always inspired me.
            </p>
            <p style="font-size: 1.2rem; margin-bottom: 20px;">
                I built this website to show you how much I admire your **hard work and dedication**. It's a digital way of saying hello and showing you my passion—**programming**—in a way that's dedicated entirely to you.
            </p>
            <p style="font-size: 1.2rem; font-style: italic; color: var(--primary-color);">
                I hope this creative project is the start of our actual story.
            </p>
        </div>
    </section>

    <section id="quiz" class="quiz-section">
        <h2>The Ruchika Quiz: Unlocking the Secret Heart</h2>
        <p>This is a game built just for you. Please fill in your answers, and I'll learn more about the amazing person you are.</p>
        
        <div id="quiz-container">
            <p id="quiz-status">Click 'Start Quiz' to begin!</p>
            <button id="start-quiz-btn">Start Quiz</button>
        </div>

        <div id="quiz-results" class="hidden">
            <h3>Thank You!</h3>
            <p id="score-text">Your answers have been securely logged. I can't wait to read them!</p>
        </div>
    </section>

    <section id="message" class="message-section">
        <h2>A Personal Note</h2>
        <p class="personal-letter">
            Ruchika, I built this website not just for us, but also to show you what I'm truly passionate about. Every detail about you matters to me. I hope this makes you smile. <br><br>
            I also wanted to share some of my professional projects. Take a peek below! <br><br>
            – With all my heart, Prem Prakash
        </p>
        
        <ul class="project-list">
            <li>
                <a href="https://cosmicweb.wuaze.com" target="_blank" class="project-link">
                    &bull; Prem's Professional Services: Cosmic Web &bull;
                </a>
            </li>
            <li>
                <a href="https://anime-infinity.wuaze.com" target="_blank" class="project-link">
                    &bull; Project: Anime Infinity &bull;
                </a>
            </li>
            <li>
                <a href="https://cosmic-e-commerce.wuaze.com" target="_blank" class="project-link">
                    &bull; Project: Cosmic E-Commerce &bull;
                </a>
            </li>
            <li>
                <a href="https://cosmic-gang.wuaze.com" target="_blank" class="project-link">
                    &bull; Project: Cosmic Gang &bull;
                </a>
            </li>
        </ul>

        <a href="mailto:Webcosmic1@gmail.com?subject=I%20loved%20the%20website%20Prem!" class="cta-button message-button">
            Message Prem &rarr;
        </a>
    </section>

    <footer>
        &copy; 2024 Prem Prakash's Dedication.
    </footer>

    <button id="back-to-top" title="Go to top">
        &uarr;
    </button>

    <script src="script.js"></script>
</body>
</html>
