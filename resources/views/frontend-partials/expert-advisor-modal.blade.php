<style>
    /* Expert Advisor Modal - Site-consistent design */
    .expert-advisor-modal {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(4px);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 2000;
        padding: 20px;
        visibility: hidden;
        opacity: 0;
        transition: opacity 0.3s ease, visibility 0.3s ease;
    }

    .expert-advisor-modal.active {
        visibility: visible;
        opacity: 1;
    }

    .expert-advisor-modal-content {
        background: white;
        border-radius: 24px;
        max-width: 1000px;
        width: 100%;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0;
        box-shadow: 0 20px 60px rgba(102, 126, 234, 0.25);
        overflow: hidden;
        animation: modalSlideIn 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    @keyframes modalSlideIn {
        from {
            opacity: 0;
            transform: scale(0.95);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .expert-advisor-left {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 60px 40px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .expert-advisor-left::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 300px;
        height: 300px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
    }

    .expert-advisor-left > * {
        position: relative;
        z-index: 2;
    }

    .expert-advisor-left h2 {
        font-size: 28px;
        font-weight: 900;
        color: white;
        line-height: 1.3;
        margin-bottom: 20px;
        letter-spacing: -0.5px;
    }

    .expert-advisor-left .highlight {
        color: #FFD700;
        font-weight: 900;
    }

    .expert-advisor-left p {
        font-size: 15px;
        color: rgba(255, 255, 255, 0.9);
        line-height: 1.6;
        margin-bottom: 30px;
    }

    .expert-advisor-illustration {
        width: 100%;
        max-width: 280px;
        margin: 0 auto;
    }

    .expert-advisor-illustration img {
        width: 100%;
        height: auto;
        display: block;
    }

    .expert-advisor-right {
        padding: 60px 40px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        background: #fafafa;
    }

    .expert-advisor-right h3 {
        font-size: 20px;
        font-weight: 800;
        color: #333;
        margin-bottom: 30px;
        text-align: center;
    }

    .expert-advisor-form {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .expert-advisor-form-group {
        display: flex;
        flex-direction: column;
    }

    .expert-advisor-form-group label {
        font-size: 12px;
        font-weight: 600;
        color: #666;
        margin-bottom: 8px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .expert-advisor-form-group input,
    .expert-advisor-form-group select {
        width: 100%;
        padding: 12px 16px;
        border: 2px solid #e0e0e0 !important;
        border-radius: 12px;
        font-size: 14px;
        font-family: inherit;
        transition: all 0.3s ease;
        background: white !important;
        color: #333 !important;
        box-sizing: border-box;
    }

    .expert-advisor-form-group select {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        cursor: pointer;
    }

    .expert-advisor-form-group input:focus,
    .expert-advisor-form-group select:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .expert-advisor-form-group input::placeholder {
        color: #999;
    }

    .expert-advisor-checkbox {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 13px;
        color: #555;
        margin-top: 8px;
    }

    .expert-advisor-checkbox input[type="checkbox"] {
        width: 18px;
        height: 18px;
        cursor: pointer;
        accent-color: #667eea;
    }

    .expert-advisor-submit {
        padding: 14px 28px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        border-radius: 12px;
        font-weight: 700;
        font-size: 15px;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 10px;
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.25);
    }

    .expert-advisor-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 35px rgba(102, 126, 234, 0.35);
    }

    .expert-advisor-submit:active {
        transform: translateY(0);
    }

    .expert-advisor-close {
        position: absolute;
        top: 20px;
        right: 20px;
        background: none;
        border: none;
        font-size: 28px;
        color: white;
        cursor: pointer;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        z-index: 10;
    }

    .expert-advisor-close:hover {
        transform: rotate(90deg);
        color: #FFD700;
    }

    /* Mobile responsive */
    @media (max-width: 768px) {
        .expert-advisor-modal-content {
            grid-template-columns: 1fr;
            max-width: 100%;
        }

        .expert-advisor-left {
            padding: 40px 30px;
        }

        .expert-advisor-left h2 {
            font-size: 22px;
        }

        .expert-advisor-left p {
            font-size: 13px;
            margin-bottom: 20px;
        }

        .expert-advisor-illustration {
            max-width: 200px;
        }

        .expert-advisor-right {
            padding: 40px 30px;
        }

        .expert-advisor-right h3 {
            font-size: 18px;
        }
    }
</style>

<!-- Modal Dialog -->
<div class="expert-advisor-modal" id="expertAdvisorModal">
    <div class="expert-advisor-modal-content">
        <!-- Left Panel -->
        <div class="expert-advisor-left">
            <button type="button" class="expert-advisor-close" onclick="closeExpertAdvisorModal()" aria-label="Close modal">×</button>
            
            <h2>Our experts can turn your study-<span class="highlight">abroad dream</span> into a reality</h2>
            <p>Get personalized guidance from our experienced counselors to find the perfect course and university for your goals.</p>
            
            <div class="expert-advisor-illustration">
                <svg viewBox="0 0 280 240" xmlns="http://www.w3.org/2000/svg">
                    <!-- Graduation cap -->
                    <g transform="translate(100, 40)">
                        <rect x="-50" y="0" width="100" height="20" fill="white" rx="2"/>
                        <polygon points="0,20 -70,50 70,50" fill="white"/>
                        <circle cx="0" cy="55" r="8" fill="#FFD700"/>
                    </g>
                    <!-- Person -->
                    <circle cx="180" cy="60" r="20" fill="white"/>
                    <rect x="160" y="85" width="40" height="35" fill="white" rx="4"/>
                    <rect x="150" y="125" width="15" height="45" fill="white"/>
                    <rect x="185" y="125" width="15" height="45" fill="white"/>
                    <!-- Ribbon -->
                    <path d="M 60 120 Q 40 140 30 160" stroke="#FFD700" stroke-width="8" fill="none" stroke-linecap="round"/>
                    <polygon points="30,160 20,150 35,155" fill="#FFD700"/>
                    <!-- Certificate -->
                    <rect x="80" y="150" width="60" height="40" fill="white" stroke="white" stroke-width="2" rx="4"/>
                    <line x1="85" y1="160" x2="135" y2="160" stroke="#FFD700" stroke-width="2"/>
                    <line x1="85" y1="170" x2="135" y2="170" stroke="#FFD700" stroke-width="2"/>
                </svg>
            </div>
        </div>

        <!-- Right Panel - Form -->
        <div class="expert-advisor-right">
            <h3>Connect with our experts</h3>
            <form class="expert-advisor-form" id="expertAdvisorForm">
                <div class="expert-advisor-form-group">
                    <label for="fullname">Full Name</label>
                    <input type="text" id="fullname" name="fullname" placeholder="Your full name" required>
                </div>

                <div class="expert-advisor-form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" placeholder="+1 (555) 000-0000" required>
                </div>

                <div class="expert-advisor-form-group">
                    <label for="email">Email ID</label>
                    <input type="email" id="email" name="email" placeholder="your@email.com" required>
                </div>

                <div class="expert-advisor-form-group">
                    <label for="country_live">Country you live in</label>
                    <select id="country_live" name="country_live" required>
                        <option value="">Select country</option>
                        <option value="USA">United States</option>
                        <option value="UK">United Kingdom</option>
                        <option value="Canada">Canada</option>
                        <option value="Australia">Australia</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <div class="expert-advisor-form-group">
                    <label for="destination">Destination to study</label>
                    <select id="destination" name="destination" required>
                        <option value="">Select destination</option>
                        <option value="USA">United States</option>
                        <option value="UK">United Kingdom</option>
                        <option value="Canada">Canada</option>
                        <option value="Australia">Australia</option>
                        <option value="Europe">Europe</option>
                    </select>
                </div>

                <div class="expert-advisor-checkbox">
                    <input type="checkbox" id="marketing" name="marketing" checked>
                    <label for="marketing">I want to receive updates about study opportunities</label>
                </div>

                <button type="submit" class="expert-advisor-submit">Connect with Expert</button>
            </form>
        </div>
    </div>
</div>

<script>
    function openExpertAdvisorModal() {
        const modal = document.getElementById('expertAdvisorModal');
        if (modal) {
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
    }

    function closeExpertAdvisorModal() {
        const modal = document.getElementById('expertAdvisorModal');
        if (modal) {
            modal.classList.remove('active');
            document.body.style.overflow = '';
        }
    }

    // Close on outside click
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('expertAdvisorModal');
        if (modal) {
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    closeExpertAdvisorModal();
                }
            });
        }

        // Close on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeExpertAdvisorModal();
            }
        });

        // Handle form submission
        const form = document.getElementById('expertAdvisorForm');
        if (form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                // Here you would typically send the form data to your backend
                console.log('Form submitted:', new FormData(this));
                // Show success message or redirect
                alert('Thank you! Our expert will contact you soon.');
                closeExpertAdvisorModal();
                form.reset();
            });
        }
    });
</script>
