document.addEventListener('DOMContentLoaded', () => {
    const canvas = document.createElement('canvas');
    canvas.id = 'stars';
    document.body.appendChild(canvas); // ✅ On l'ajoute à la fin, pas au début
    const ctx = canvas.getContext('2d');

    let stars = [];

    const resize = () => {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
        stars = Array.from({ length: 120 }, () => ({
            x: Math.random() * canvas.width,
            y: Math.random() * canvas.height,
            r: Math.random() * 1.3 + 0.2,
            s: Math.random() * 0.3 + 0.1
        }));
    };

    const animate = () => {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        stars.forEach(star => {
            ctx.beginPath();
            ctx.arc(star.x, star.y, star.r, 0, Math.PI * 2);
            ctx.fillStyle = 'rgba(255,255,255,0.7)';
            ctx.fill();
            star.y += star.s;
            if (star.y > canvas.height) star.y = 0;
        });
        requestAnimationFrame(animate);
    };

    resize();
    animate();
    window.addEventListener('resize', resize);
});
