document.addEventListener('DOMContentLoaded', function () {
    const canvas = document.getElementById('wheel');
    const ctx = canvas.getContext('2d');
    const spinButton = document.getElementById('spin-button');
    const resultDisplay = document.getElementById('result');
    const winnerModal = document.getElementById('winner-modal');
    const winnerNameText = document.getElementById('winner-name');
    const removeWinnerBtn = document.getElementById('remove-winner-btn');
    const closeWinnerModal = document.getElementById('close-winner-modal');

    let currentWinner = null;


    document.querySelectorAll('.modal-close-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            console.log('Modal ditutup lewat tombol close');

            if (spinTimeout) {
                clearTimeout(spinTimeout);
                spinTimeout = null;
            }

            isSpinning = false;

            resultDisplay.classList.remove('show');
            resultDisplay.textContent = '';
            spinButton.disabled = false;
            spinButton.classList.remove('pulse', 'disabled');

            drawWheel();
        });
    });



    let options = window.guestsData.map(data => data.guest_name) || [];

    let startAngle = 0;
    let spinTimeout = null;
    let spinTime = 0;
    let spinTimeTotal = 0;
    let currentAngle = 0;
    let wheelInitialized = false;
    let isSpinning = false;

    const colors = [
        '#6366f1', '#8b5cf6', '#ec4899', '#f43f5e',
        '#f97316', '#eab308', '#84cc16', '#10b981',
        '#14b8a6', '#06b6d4', '#0ea5e9', '#3b82f6',
        '#6366f1', '#8b5cf6', '#a855f7', '#d946ef'
    ];

    function drawWheel() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        const centerX = canvas.width / 2;
        const centerY = canvas.height / 2;
        const radius = Math.min(centerX, centerY) - 10;

        if (options.length < 2) {
            // Gambar lingkaran kosong
            ctx.beginPath();
            ctx.arc(centerX, centerY, radius, 0, 2 * Math.PI);
            ctx.fillStyle = '#f1f5f9'; // Warna latar roda kosong
            ctx.fill();
            ctx.strokeStyle = '#ccc';
            ctx.stroke();
            ctx.closePath();

            // Tampilkan pesan di tengah roda
            ctx.fillStyle = '#dc2626'; // Warna teks merah
            ctx.font = 'bold 16px sans-serif';
            ctx.textAlign = 'center';
            ctx.fillText('Minimal 2 opsi', centerX, centerY - 10);
            ctx.fillText('diperlukan untuk memutar', centerX, centerY + 10);

            spinButton.disabled = true;
            return;
        }

        spinButton.disabled = false;

        const arc = 2 * Math.PI / options.length;

        for (let i = 0; i < options.length; i++) {
            const angle = startAngle + i * arc;
            ctx.beginPath();
            ctx.arc(centerX, centerY, radius, angle, angle + arc);
            ctx.lineTo(centerX, centerY);
            ctx.closePath();

            const baseColor = colors[i % colors.length];
            const gradient = ctx.createRadialGradient(centerX, centerY, radius * 0.5, centerX, centerY, radius);
            gradient.addColorStop(0, lightenColor(baseColor, 20));
            gradient.addColorStop(1, baseColor);

            ctx.fillStyle = gradient;
            ctx.fill();
            ctx.strokeStyle = '#e2e8f0';
            ctx.stroke();

            ctx.save();
            ctx.translate(centerX, centerY);
            ctx.rotate(angle + arc / 2);
            ctx.textAlign = 'right';
            ctx.fillStyle = '#ffffff';
            ctx.font = 'bold 14px Poppins';
            ctx.shadowColor = 'rgba(0, 0, 0, 0.3)';
            ctx.shadowBlur = 3;
            ctx.fillText(options[i], radius - 30, 5);
            ctx.restore();
        }

        ctx.beginPath();
        ctx.arc(centerX, centerY, 20, 0, 2 * Math.PI);
        ctx.fillStyle = '#6366f1';
        ctx.fill();
        ctx.beginPath();
        ctx.arc(centerX, centerY, 15, 0, 2 * Math.PI);
        ctx.fillStyle = '#ffffff';
        ctx.fill();
        ctx.beginPath();
        ctx.arc(centerX, centerY, 3, 0, 2 * Math.PI);
        ctx.fillStyle = '#6366f1';
        ctx.fill();

        wheelInitialized = true;
        if (!isSpinning) {
            spinButton.classList.add('pulse');
        }
    }

    function lightenColor(color, percent) {
        const num = parseInt(color.replace('#', ''), 16);
        const amt = Math.round(2.55 * percent);
        const R = (num >> 16) + amt;
        const G = (num >> 8 & 0x00FF) + amt;
        const B = (num & 0x0000FF) + amt;

        return '#' + (
            0x1000000 +
            (R < 255 ? (R < 1 ? 0 : R) : 255) * 0x10000 +
            (G < 255 ? (G < 1 ? 0 : G) : 255) * 0x100 +
            (B < 255 ? (B < 1 ? 0 : B) : 255)
        ).toString(16).slice(1);
    }

    function spin() {
        if (!wheelInitialized || options.length < 2 || isSpinning) return;

        isSpinning = true;
        spinButton.disabled = true; // <-- tombol disabled
        spinButton.classList.add('disabled');
        spinButton.classList.remove('pulse');
        resultDisplay.classList.remove('show');
        resultDisplay.textContent = '';

        // Reset spin values
        spinTime = 0;
        spinTimeTotal = Math.random() * 3000 + 4000;

        // Generate a random target angle (ensures random results)
        const targetAngle = Math.random() * Math.PI * 2;

        // Spin at least 5 full rotations plus the target angle
        const spinVelocity = 5 * Math.PI * 2 + targetAngle;

        rotateWheel(spinVelocity);
    }


    function rotateWheel(spinVelocity) {
        spinTime += 30;

        if (spinTime >= spinTimeTotal) {
            stopRotateWheel();
            return;
        }

        const spinFactor = easeOut(spinTime, 0, 1, spinTimeTotal);
        currentAngle = startAngle + (spinFactor * spinVelocity);

        ctx.save();
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        ctx.translate(canvas.width / 2, canvas.height / 2);
        ctx.rotate(currentAngle);
        ctx.translate(-canvas.width / 2, -canvas.height / 2);
        drawWheel();
        ctx.restore();

        spinTimeout = setTimeout(() => rotateWheel(spinVelocity), 30);
    }

    function easeOut(t, b, c, d) {
        const ts = (t /= d) * t;
        const tc = ts * t;
        return b + c * (tc + -3 * ts + 3 * t);
    }

    function stopRotateWheel() {
        clearTimeout(spinTimeout);

        const degrees = currentAngle * 180 / Math.PI + 90;
        const arcd = 360 / options.length;
        const index = Math.floor((360 - degrees % 360) / arcd);

        currentWinner = options[index];

        // Tampilkan modal pemenang
        winnerNameText.textContent = currentWinner;
        winnerModal.classList.replace('hidden', 'flex');

        // Reset spin state
        startAngle = 0;
        isSpinning = false;
        spinButton.disabled = false;
        spinButton.classList.remove('disabled');

        setTimeout(() => {
            spinButton.classList.add('pulse');
        }, 1000);
    }


    spinButton.addEventListener('click', spin);

    closeWinnerModal.addEventListener('click', () => {
        winnerModal.classList.replace('flex','hidden');
    });

    // Hapus pemenang dari daftar
    removeWinnerBtn.addEventListener('click', () => {
        if (currentWinner) {
            console.log('Pemenang dihapus:', currentWinner);
            console.log('Daftar sebelum penghapusan:', options);
            options = options.filter(name => name !== currentWinner);
            console.log('Daftar setelah penghapusan:', options);

            drawWheel();
        }
        winnerModal.classList.replace('flex','hidden');
    });


    // Inisialisasi awal
    drawWheel();
});
