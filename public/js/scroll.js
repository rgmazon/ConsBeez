document.addEventListener('DOMContentLoaded', function() {
        // Function to add scroll animation to elements
        function addScrollAnimation(elements, options = {}) {
            const defaultOptions = {
                threshold: 0.1,
                stagger: 0,
                rootMargin: '0px'
            };
            const finalOptions = { ...defaultOptions, ...options };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry, index) => {
                    if (entry.isIntersecting) {
                        setTimeout(() => {
                            entry.target.classList.add('visible');
                        }, index * finalOptions.stagger);
                    } else {
                        entry.target.classList.remove('visible');
                    }
                });
            }, {
                threshold: finalOptions.threshold,
                rootMargin: finalOptions.rootMargin
            });

            elements.forEach(el => {
                el.classList.add('scroll-animate');
                observer.observe(el);
            });
        }

        // Apply animation to main sections
        addScrollAnimation(document.querySelectorAll('.hero-section, .services, .why-choose-us'));

        // Apply animation to service cards with staggered effect
        addScrollAnimation(document.querySelectorAll('.services .services-card'), { stagger: 100 });

        // Apply animation to buttons in services section
        addScrollAnimation(document.querySelectorAll('.services-buttons'));

        // Apply animation to all headings
        addScrollAnimation(document.querySelectorAll('h1, h2, h3, h4, h5, h6'));

        // Apply animation to all paragraphs
        addScrollAnimation(document.querySelectorAll('p'));

        // Apply animation to all buttons
        addScrollAnimation(document.querySelectorAll('.btn'));

        // Apply animation to all images
        addScrollAnimation(document.querySelectorAll('img'));

        // You can add more specific selectors here as needed
    });