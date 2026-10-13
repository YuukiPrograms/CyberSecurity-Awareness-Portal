<?php
$pageTitle = 'Cyber Safety Quiz - National Cybersecurity Awareness Portal';
require_once 'includes/header.php';
require_once 'includes/database.php';

$conn = getDBConnection();

// Fetch quiz questions (each has 4 options + correct answer)
$questions = [];
try {
    $stmt = $conn->query("SELECT id, question, option_a, option_b, option_c, option_d, correct_answer 
                          FROM quiz_questions ORDER BY id");
    $questions = $stmt->fetchAll();
} catch (PDOException $e) {
    error_log("Quiz fetch error: " . $e->getMessage());
}
?>

<section class="quiz-section py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="mb-3">Cyber Safety Quiz</h1>
            <p class="lead">Test your cybersecurity awareness. Answer all questions to see your score.</p>
        </div>

        <?php if (empty($questions)): ?>
            <div class="alert alert-info text-center">
                <i class="fas fa-info-circle me-2"></i>
                No quiz questions available yet. Please check back later.
            </div>
        <?php else: ?>

        <!-- Progress bar -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <span>Question <span id="currentNum">1</span> of <?php echo count($questions); ?></span>
                    <span>Score: <span id="liveScore">0</span></span>
                </div>
                <div style="height: 8px; background: rgba(255,255,255,0.1); border-radius: 4px; overflow: hidden;">
                    <div id="quizProgress" style="height: 100%; width: 0%; background: linear-gradient(135deg, #00d4ff, #3498db); border-radius: 4px; transition: width 0.35s ease;"></div>
                </div>
            </div>
        </div>

        <!-- Quiz form -->
        <form id="quizForm">
            <?php foreach ($questions as $index => $q): ?>
                <div class="card quiz-question mb-4" data-question-index="<?php echo $index; ?>" 
                     data-correct="<?php echo htmlspecialchars($q['correct_answer']); ?>" 
                     data-id="<?php echo (int)$q['id']; ?>"
                     style="<?php echo $index > 0 ? 'display:none;' : ''; ?>">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <span class="badge" style="background: rgba(0, 212, 255, 0.2); color: #00d4ff; padding: 0.5rem 0.9rem; border-radius: 8px; font-weight: 700;">
                                <?php echo $index + 1; ?> / <?php echo count($questions); ?>
                            </span>
                        </div>
                        <h4 class="mb-4"><?php echo e($q['question']); ?></h4>

                        <?php
                        $options = [
                            'A' => $q['option_a'],
                            'B' => $q['option_b'],
                            'C' => $q['option_c'],
                            'D' => $q['option_d'],
                        ];
                        foreach ($options as $letter => $text):
                        ?>
                            <label class="quiz-option d-block mb-2" style="cursor: pointer;">
                                <input type="radio" 
                                       name="question_<?php echo $index; ?>" 
                                       value="<?php echo $letter; ?>" 
                                       class="quiz-radio" 
                                       style="display: none;">
                                <div class="quiz-option-inner" style="
                                    display: flex; align-items: center; gap: 12px;
                                    background: rgba(255,255,255,0.04);
                                    border: 1px solid rgba(255,255,255,0.15);
                                    border-radius: 12px;
                                    padding: 0.85rem 1rem;
                                    transition: all 0.2s ease;
                                ">
                                    <span style="
                                        display: inline-flex; align-items: center; justify-content: center;
                                        width: 32px; height: 32px; border-radius: 50%;
                                        background: rgba(255,255,255,0.08);
                                        border: 1px solid rgba(255,255,255,0.2);
                                        font-weight: 700; color: #00d4ff; flex-shrink: 0;
                                    "><?php echo $letter; ?></span>
                                    <span><?php echo e($text); ?></span>
                                </div>
                            </label>
                        <?php endforeach; ?>

                        <div class="quiz-feedback mt-3"></div>

                        <div class="d-flex justify-content-between mt-4">
                            <button type="button" class="btn btn-outline-light nav-btn" data-action="prev"
                                    <?php echo $index === 0 ? 'disabled style="opacity:0.4;cursor:not-allowed;"' : ''; ?>>
                                <i class="fas fa-arrow-left me-1"></i> Previous
                            </button>

                            <?php if ($index < count($questions) - 1): ?>
                                <button type="button" class="btn btn-primary nav-btn" data-action="next">
                                    Next <i class="fas fa-arrow-right ms-1"></i>
                                </button>
                            <?php else: ?>
                                <button type="button" class="btn btn-primary" id="submitQuiz">
                                    <i class="fas fa-check-circle me-1"></i> Submit Quiz
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </form>

        <!-- Results -->
        <div id="quizResults" class="card" style="display:none;">
            <div class="card-body text-center py-5">
                <div style="font-size: 4rem; line-height: 1;" id="resultEmoji">🎉</div>
                <h2 class="mt-3">Your Cyber Safety Score</h2>
                <div style="font-size: 3rem; font-weight: 800; color: #00d4ff; margin: 1rem 0;">
                    <span id="finalScore">0</span> / <?php echo count($questions); ?>
                </div>
                <div style="font-size: 1.5rem; font-weight: 700;" id="resultPercentage">0%</div>
                <p class="lead mt-3" id="resultMessage"></p>

                <div class="mt-4 d-flex justify-content-center gap-3 flex-wrap">
                    <button type="button" class="btn btn-primary" onclick="location.reload()">
                        <i class="fas fa-redo me-2"></i>Retake Quiz
                    </button>
                    <a href="index.php" class="btn btn-outline-light">
                        <i class="fas fa-home me-2"></i>Back to Home
                    </a>
                </div>
            </div>
        </div>

        <?php endif; ?>
    </div>
</section>

<script>
(function() {
    const questionCards = Array.from(document.querySelectorAll('.quiz-question'));
    const total = questionCards.length;
    if (total === 0) return;

    let currentIndex = 0;
    let score = 0;
    const answered = {};  // { questionIndex: { value, correct } }

    // -------- Option highlight on click --------
    questionCards.forEach((card, idx) => {
        const radios = card.querySelectorAll('.quiz-radio');
        radios.forEach(radio => {
            radio.addEventListener('change', () => {
                // Reset all options in this card
                card.querySelectorAll('.quiz-option-inner').forEach(inner => {
                    inner.style.background = 'rgba(255,255,255,0.04)';
                    inner.style.borderColor = 'rgba(255,255,255,0.15)';
                });

                // Highlight selected
                const inner = radio.closest('.quiz-option').querySelector('.quiz-option-inner');
                inner.style.background = 'rgba(0, 212, 255, 0.12)';
                inner.style.borderColor = '#00d4ff';

                // Record answer (first time only)
                const correct = card.getAttribute('data-correct');
                if (!answered[idx]) {
                    answered[idx] = { value: radio.value, correct: (radio.value === correct) };
                    if (radio.value === correct) score++;
                    updateLiveScore();
                } else {
                    // Allow changing before submit — adjust score
                    const wasCorrect = answered[idx].correct;
                    const nowCorrect = (radio.value === correct);
                    if (wasCorrect && !nowCorrect) score--;
                    if (!wasCorrect && nowCorrect) score++;
                    answered[idx] = { value: radio.value, correct: nowCorrect };
                    updateLiveScore();
                }

                // Show feedback
                const feedback = card.querySelector('.quiz-feedback');
                if (radio.value === correct) {
                    feedback.innerHTML = '<div style="color: #10b981; font-weight: 600;"><i class="fas fa-check-circle me-2"></i>Correct!</div>';
                } else {
                    feedback.innerHTML = '<div style="color: #ef4444; font-weight: 600;"><i class="fas fa-times-circle me-2"></i>That\'s not quite right.</div>';
                }
            });
        });
    });

    // -------- Navigation --------
    document.querySelectorAll('.nav-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const action = btn.getAttribute('data-action');
            goTo(action === 'next' ? currentIndex + 1 : currentIndex - 1);
        });
    });

    function goTo(index) {
        if (index < 0 || index >= total) return;
        questionCards[currentIndex].style.display = 'none';
        currentIndex = index;
        questionCards[currentIndex].style.display = 'block';
        document.getElementById('currentNum').textContent = currentIndex + 1;
        updateProgress();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function updateProgress() {
        const pct = ((currentIndex + 1) / total) * 100;
        document.getElementById('quizProgress').style.width = pct + '%';
    }

    function updateLiveScore() {
        document.getElementById('liveScore').textContent = score;
    }

    // -------- Submit --------
    const submitBtn = document.getElementById('submitQuiz');
    if (submitBtn) {
        submitBtn.addEventListener('click', () => {
            const unanswered = total - Object.keys(answered).length;
            if (unanswered > 0) {
                const proceed = confirm(`You have ${unanswered} unanswered question(s). Submit anyway?`);
                if (!proceed) return;
            }
            showResults();
        });
    }

    function showResults() {
        document.getElementById('quizForm').style.display = 'none';
        document.querySelectorAll('.quiz-question').forEach(c => c.style.display = 'none');
        const resultsBox = document.getElementById('quizResults');
        resultsBox.style.display = 'block';

        const pct = Math.round((score / total) * 100);
        document.getElementById('finalScore').textContent = score;
        document.getElementById('resultPercentage').textContent = pct + '%';

        let emoji = '🎉', msg = '';
        if (pct === 100) {
            emoji = '🏆'; msg = 'Perfect score! You are a cybersecurity pro.';
        } else if (pct >= 80) {
            emoji = '🎉'; msg = 'Excellent! You have strong cybersecurity awareness.';
        } else if (pct >= 60) {
            emoji = '👍'; msg = 'Good job! Review the topics you missed to improve further.';
        } else if (pct >= 40) {
            emoji = '📚'; msg = 'Fair effort. Explore our learning pages to strengthen your knowledge.';
        } else {
            emoji = '⚠️'; msg = 'Please review our cybersecurity content — there are important topics to learn.';
        }
        document.getElementById('resultEmoji').textContent = emoji;
        document.getElementById('resultMessage').textContent = msg;

        // Save result (best effort — no error if it fails)
        try {
            fetch('save_quiz_result.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    score: score,
                    total_questions: total
                })
            }).catch(() => {});
        } catch (e) { /* ignore */ }
    }

    updateProgress();
    updateLiveScore();
})();
</script>

<?php require_once 'includes/footer.php'; ?>