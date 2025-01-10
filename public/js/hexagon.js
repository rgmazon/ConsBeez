class HexagonAnimation {
    constructor() {
        this.container = document.getElementById('hexagon-container');
        this.colors = ['rgba(255, 255, 200, 0.5)', 'rgba(200, 255, 200, 0.5)', 'rgba(255, 220, 200, 0.5)'];
        this.sizes = [30, 40, 50, 60];
        this.animationInterval = null;
    }

    createHexagon() {
        const hexagon = document.createElement('div');
        hexagon.className = 'hexagon';
        
        // Random properties
        const size = this.sizes[Math.floor(Math.random() * this.sizes.length)];
        const color = this.colors[Math.floor(Math.random() * this.colors.length)];
        const startX = Math.random() * window.innerWidth;
        const startY = Math.random() * window.innerHeight;
        
        // Set hexagon properties
        hexagon.style.width = `${size}px`;
        hexagon.style.height = `${size * 1.1547}px`; // sqrt(3)/2 ≈ 1.1547
        hexagon.style.left = `${startX}px`;
        hexagon.style.top = `${startY}px`;
        
        // Set the background color using ::before
        const style = document.createElement('style');
        const uniqueClass = `hexagon-${Date.now()}-${Math.random().toString(36).substr(2, 9)}`;
        hexagon.classList.add(uniqueClass);
        style.textContent = `.${uniqueClass}::before { background-color: ${color}; }`;
        document.head.appendChild(style);

        // Animation properties
        const angle = Math.random() * Math.PI * 2;
        const speed = 0.5 + Math.random() * 0.5;
        const dx = Math.cos(angle) * speed;
        const dy = Math.sin(angle) * speed;

        // Add to container
        this.container.appendChild(hexagon);

        // Fade in
        setTimeout(() => {
            hexagon.style.opacity = '1';
        }, 100);

        // Animation
        const animate = () => {
            const currentX = parseFloat(hexagon.style.left);
            const currentY = parseFloat(hexagon.style.top);
            hexagon.style.left = `${currentX + dx}px`;
            hexagon.style.top = `${currentY + dy}px`;
        };

        // Remove after 3 seconds
        setTimeout(() => {
            hexagon.style.opacity = '0';
            setTimeout(() => {
                hexagon.remove();
                style.remove();
            }, 500);
        }, 3000);

        return { hexagon, animate };
    }

    start() {
        // Create new hexagon every 500ms
        this.animationInterval = setInterval(() => {
            const { hexagon, animate } = this.createHexagon();
            
            // Animate the hexagon
            const animationInterval = setInterval(animate, 16); // ~60fps
            
            // Clear animation when hexagon is removed
            setTimeout(() => {
                clearInterval(animationInterval);
            }, 3500); // 3s + 500ms fade out
        }, 500);
    }

    stop() {
        if (this.animationInterval) {
            clearInterval(this.animationInterval);
            this.animationInterval = null;
        }
    }
}

// Initialize and start animation
const hexagonAnimation = new HexagonAnimation();
hexagonAnimation.start();