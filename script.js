// Smooth scrolling for navigation links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const targetId = this.getAttribute('href');
        const targetElement = document.querySelector(targetId);
        
        if (targetElement) {
            targetElement.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Booking form submission
document.addEventListener('DOMContentLoaded', function() {
    const bookingForm = document.getElementById('bookingForm');
    
    if (bookingForm) {
        bookingForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form data
            const fullName = document.getElementById('fullName').value;
            const email = document.getElementById('email').value;
            const phone = document.getElementById('phone').value;
            const service = document.getElementById('service').value;
            const date = document.getElementById('appointmentDate').value;
            const time = document.getElementById('appointmentTime').value;
            const message = document.getElementById('message').value;
            
            // Validate form
            if (!fullName || !email || !phone || !service || !date || !time) {
                alert('Please fill in all required fields');
                return;
            }
            
            // Create booking data
            const bookingData = {
                fullName: fullName,
                email: email,
                phone: phone,
                service: service,
                appointmentDate: date,
                appointmentTime: time,
                message: message,
                submittedAt: new Date().toISOString()
            };
            
            // Log booking data (in production, this would be sent to a backend)
            console.log('Booking submitted:', bookingData);
            
            // Show success message
            const formContainer = bookingForm.parentElement;
            const successAlert = document.createElement('div');
            successAlert.className = 'alert alert-success';
            successAlert.innerHTML = `
                <strong>Success!</strong> Your appointment has been requested. We'll contact you shortly at ${email} to confirm your booking.
            `;
            
            formContainer.insertBefore(successAlert, bookingForm);
            
            // Reset form
            bookingForm.reset();
            
            // Auto-hide success message after 5 seconds
            setTimeout(() => {
                successAlert.remove();
            }, 5000);
        });
    }
});

// Navbar background on scroll
window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});

// Lazy loading animation for cards and sections
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -100px 0px'
};

const observer = new IntersectionObserver(function(entries) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

// Observe service cards and doctor cards
document.querySelectorAll('.service-card, .doctor-card, .stat-card').forEach(card => {
    card.style.opacity = '0';
    card.style.transform = 'translateY(20px)';
    card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    observer.observe(card);
});

// Add hover effects for interactive elements
document.querySelectorAll('.btn-success').forEach(btn => {
    btn.addEventListener('mouseenter', function() {
        this.style.transform = 'scale(1.05)';
    });
    btn.addEventListener('mouseleave', function() {
        this.style.transform = 'scale(1)';
    });
});

// Auto-counter for statistics
const statsObserver = new IntersectionObserver(function(entries) {
    entries.forEach(entry => {
        if (entry.isIntersecting && !entry.target.classList.contains('counted')) {
            entry.target.classList.add('counted');
            
            // Get all stat numbers in this section
            const statNumbers = entry.target.querySelectorAll('.stat-number');
            
            statNumbers.forEach(stat => {
                const finalValue = parseInt(stat.textContent.replace(/[^0-9]/g, ''));
                const hasPlus = stat.textContent.includes('+');
                let currentValue = 0;
                
                // Calculate increment based on final value
                const increment = Math.ceil(finalValue / 100);
                const duration = 2000; // 2 seconds
                const steps = finalValue / increment;
                const stepDuration = duration / steps;
                
                const counter = setInterval(() => {
                    currentValue += increment;
                    
                    if (currentValue >= finalValue) {
                        currentValue = finalValue;
                        clearInterval(counter);
                    }
                    
                    const displayValue = currentValue.toLocaleString();
                    stat.textContent = displayValue + (hasPlus ? '+' : '');
                }, stepDuration);
            });
            
            statsObserver.unobserve(entry.target);
        }
    });
}, { threshold: 0.5 });

// Observe hero stats section
const heroStats = document.querySelector('.hero-stats');
if (heroStats) {
    statsObserver.observe(heroStats);
}
