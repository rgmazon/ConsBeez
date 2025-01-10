<div id="floating-shapes-container" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; overflow: hidden; z-index: -1;">
</div>
<style>
    .shape-animation-layer {
    position: relative;
    overflow: hidden;
    z-index: 1;
}

.floating-shape {
    position: absolute;
    width: 50px;
    height: 57.735px;
    opacity: 0;
    transition: opacity 0.5s ease-in-out;
}

.floating-shape::before {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
}

</style>
<script>
    class FloatingShapesAnimation {
    constructor() {
        this.animationContainer = document.getElementById('floating-shapes-container');
        this.shapeColors = ['rgba(255, 255, 200, 0.1)', 'rgba(200, 255, 200, 0.1)', 'rgba(255, 220, 200, 0.1)', 'rgba(255, 0, 0, 0.1)', 'rgba(255, 165, 0, 0.1)', 'rgba(220, 255, 178, 0.1)'];
        this.shapeSizes = [30, 40, 50, 60, 70, 80];
        this.activeShapes = new Set();
        this.minimumShapeCount = 35;
    }

    createShape() {
        const newShape = document.createElement('div');
        newShape.className = 'floating-shape';

        // Random properties
        const shapeSize = this.shapeSizes[Math.floor(Math.random() * this.shapeSizes.length)];
        const shapeColor = this.shapeColors[Math.floor(Math.random() * this.shapeColors.length)];
        const shapeStartX = Math.random() * this.animationContainer.offsetWidth;
        const shapeStartY = Math.random() * this.animationContainer.offsetHeight;

        // Set shape properties
        newShape.style.width = `${shapeSize}px`;
        newShape.style.height = `${shapeSize * 1.1547}px`;
        newShape.style.left = `${shapeStartX}px`;
        newShape.style.top = `${shapeStartY}px`;

        // Set the background color using ::before
        const dynamicStyle = document.createElement('style');
        const uniqueClassName = `floating-shape-${Date.now()}-${Math.random().toString(36).substr(2, 9)}`;
        newShape.classList.add(uniqueClassName);
        dynamicStyle.textContent = `.${uniqueClassName}::before { background-color: ${shapeColor}; }`;
        document.head.appendChild(dynamicStyle);

        // Add to container and active shapes set
        this.animationContainer.appendChild(newShape);
        this.activeShapes.add(newShape);

        // Fade in after a random delay
        setTimeout(() => {
            newShape.style.opacity = '1';
        }, Math.random() * 1000);

        // Random lifetime between 3 and 7 seconds
        const shapeLifetime = 3000 + Math.random() * 4000;

        // Remove after the random lifetime
        setTimeout(() => {
            newShape.style.opacity = '0';
            setTimeout(() => {
                newShape.remove();
                dynamicStyle.remove();
                this.activeShapes.delete(newShape);
            }, 500);
        }, shapeLifetime);

        return newShape;
    }

    maintainShapeCount() {
        const currentShapeCount = this.activeShapes.size;
        if (currentShapeCount < this.minimumShapeCount) {
            for (let i = 0; i < this.minimumShapeCount - currentShapeCount; i++) {
                this.createShape();
            }
        }
    }

    start() {
        // Periodically check and maintain the required number of shapes
        this.shapeMaintenanceInterval = setInterval(() => {
            this.maintainShapeCount();
        }, 500);
    }

    stop() {
        if (this.shapeMaintenanceInterval) {
            clearInterval(this.shapeMaintenanceInterval);
            this.shapeMaintenanceInterval = null;
        }
    }
}

// Initialize and start animation when document is ready
document.addEventListener('DOMContentLoaded', () => {
    const shapeAnimationInstance = new FloatingShapesAnimation();
    shapeAnimationInstance.start();
});

</script>