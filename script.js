// Define the quiz questions (Unchanged from previous update)
const quizQuestions = [
    {
        question: "Ruchika, when Prem 'stares' in class, what is he actually focused on? (What small thing does he notice the most?)",
        name: "stare_in_class"
    },
    {
        question: "What is the full name of the 'most important man' in your life (your father)?",
        name: "father_name"
    },
    {
        question: "If you had an entire free weekend, what is the ONE activity you would choose (your main hobby)?",
        name: "hobby"
    },
    {
        question: "If Prem needed to drop you home, what is the name of the main road or closest major landmark to your house?",
        name: "home_location"
    },
    {
        question: "If we ever get a chance to talk for the first time, what is the first topic you would want to discuss?",
        name: "first_topic"
    },
    {
        question: "To confirm my notes, please type your primary phone number below:",
        name: "phone_number"
    }
];

const quizContainer = document.getElementById('quiz-container');
const startButton = document.getElementById('start-quiz-btn');
const quizResults = document.getElementById('quiz-results');

// --------------------------------------
// --- 1. QUIZ LOGIC (UNCHANGED) ---
// --------------------------------------

function startQuiz() {
    startButton.classList.add('hidden');
    document.getElementById('quiz-status').classList.add('hidden');
    quizResults.classList.add('hidden');
    buildQuizForm();
}

function buildQuizForm() {
    let formHTML = '<form id="answer-form">';
    
    quizQuestions.forEach((q, index) => {
        formHTML += `
            <div class="question-card fade-in">
                <p><strong>Question ${index + 1} of ${quizQuestions.length}:</strong></p>
                <h3>${q.question}</h3>
                <input type="text" name="${q.name}" placeholder="Type your answer here..." required>
            </div>
        `;
    });

    formHTML += '<button type="submit" id="quiz-submit-btn">Submit My Secret Answers &rarr;</button></form>';
    quizContainer.innerHTML = formHTML;

    document.getElementById('answer-form').addEventListener('submit', handleFormSubmit);
}

function handleFormSubmit(event) {
    event.preventDefault(); 
    
    const form = event.target;
    const formData = new FormData(form);
    const answers = [];

    quizQuestions.forEach(q => {
        answers.push({
            question: q.question,
            answer: formData.get(q.name)
        });
    });

    fetch('save_answers.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(answers) 
    })
    .then(response => response.text())
    .then(data => {
        quizContainer.innerHTML = '';
        quizResults.classList.remove('hidden');
        document.getElementById('score-text').innerHTML = 'Your answers have been securely logged. I can\'t wait to read them!';
    })
    .catch(error => {
        console.error('Error submitting answers:', error);
        quizContainer.innerHTML = '<p style="color:red;">Error submitting answers. Please try again!</p>';
    });
}

startButton.addEventListener('click', startQuiz);


// --------------------------------------
// --- 2. ANIMATION & INTERACTION LOGIC ---
// --------------------------------------

const loadingScreen = document.getElementById('loading-screen');
const bgmPlayer = document.getElementById('bgm-player');
const backToTopButton = document.getElementById('back-to-top');

// Logic for the Loading Screen and BGM Start
loadingScreen.addEventListener('click', () => {
    // 1. Start BGM (requires user interaction)
    bgmPlayer.play().catch(error => {
        // console.log("BGM autoplay prevented. User must interact again.");
    });

    // 2. Fade out the loading screen
    loadingScreen.classList.add('hidden');
    // 3. Remove the element entirely after fade transition
    setTimeout(() => {
        loadingScreen.style.display = 'none';
    }, 1000); 
});

// Logic for the Back to Top Button
window.onscroll = function() { scrollFunction() };

function scrollFunction() {
    if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400) {
        backToTopButton.classList.add('show');
    } else {
        backToTopButton.classList.remove('show');
    }
}

backToTopButton.addEventListener('click', () => {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
});

// Simple animation utility for fade-in effect on quiz questions
const style = document.createElement('style');
style.textContent = `
    .fade-in {
        animation: fadeIn 0.5s ease-out;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
`;
document.head.appendChild(style);
