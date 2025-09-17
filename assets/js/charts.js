/**
 * Charts JavaScript
 * Canvas-based chart functionality for data visualization
 */

/**
 * Initialize revenue pie chart on investment model page
 */
function initRevenueChart() {
    const canvas = document.getElementById('revenueChart');
    if (!canvas) return;
    
    const ctx = canvas.getContext('2d');
    const centerX = canvas.width / 2;
    const centerY = canvas.height / 2;
    const radius = Math.min(centerX, centerY) - 20;
    
    // Revenue data - represents typical revenue structure for battery storage projects
    const data = [
        { label: 'Podpůrné služby', value: 40, color: '#1e3c72' },
        { label: 'Spotový trh', value: 35, color: '#2a5298' },
        { label: 'Dlouhodobé kontrakty', value: 20, color: '#4a7dc7' },
        { label: 'Ostatní služby', value: 5, color: '#7ba7e7' }
    ];
    
    // Draw pie chart
    let currentAngle = -Math.PI / 2; // Start from top
    
    data.forEach(segment => {
        const sliceAngle = (segment.value / 100) * 2 * Math.PI;
        
        // Draw segment
        ctx.beginPath();
        ctx.moveTo(centerX, centerY);
        ctx.arc(centerX, centerY, radius, currentAngle, currentAngle + sliceAngle);
        ctx.closePath();
        ctx.fillStyle = segment.color;
        ctx.fill();
        
        // Draw border
        ctx.strokeStyle = 'white';
        ctx.lineWidth = 2;
        ctx.stroke();
        
        currentAngle += sliceAngle;
    });
}

/**
 * Initialize all charts when DOM is loaded
 */
document.addEventListener('DOMContentLoaded', function() {
    // Initialize revenue chart for investment model page
    initRevenueChart();
    
    // Add future chart initialization functions here as needed
});