<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Interactive Radial Web Graph</title>
<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        background-color: #f4f4f9;
    }
    canvas {
        background-color: #ffffff;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        cursor: pointer;
    }
</style>
</head>
<body>
<canvas id="radialGraph" width="400" height="400"></canvas>
<script>
    const canvas = document.getElementById("radialGraph");
    const ctx = canvas.getContext("2d");

    const data = [70, 85, 30, 60, 80];
    const labels = ["Skill A", "Skill B", "Skill C", "Skill D", "Skill E"];
    const numAxes = data.length;
    const maxRadius = 150;
    const numLevels = 5;
    const labelPositions = []; // To store label positions for hover detection

    const scaledData = data.map((value) => (value / 100) * maxRadius);

    // Draw concentric circles for levels
    ctx.translate(canvas.width / 2, canvas.height / 2);
    ctx.strokeStyle = "#cccccc";
    for (let level = 1; level <= numLevels; level++) {
        ctx.beginPath();
        ctx.arc(0, 0, (maxRadius / numLevels) * level, 0, 2 * Math.PI);
        ctx.stroke();
    }

    // Draw axes and labels
    ctx.strokeStyle = "#888888";
    ctx.fillStyle = "#000000";
    ctx.font = "12px Arial";
    for (let i = 0; i < numAxes; i++) {
        const angle = (2 * Math.PI / numAxes) * i;
        const x = maxRadius * Math.cos(angle);
        const y = maxRadius * Math.sin(angle);

        // Draw axis line
        ctx.beginPath();
        ctx.moveTo(0, 0);
        ctx.lineTo(x, y);
        ctx.stroke();

        // Label each axis and save its position for hover detection
        const labelX = (maxRadius + 20) * Math.cos(angle);
        const labelY = (maxRadius + 20) * Math.sin(angle);
        ctx.fillText(labels[i], labelX - 15, labelY + 5);

        // Save label position and size
        labelPositions.push({ label: labels[i], x: labelX - 15, y: labelY - 5, width: 40, height: 12 });
    }

    // Draw data polygon
    ctx.beginPath();
    ctx.fillStyle = "rgba(0, 128, 255, 0.3)";
    ctx.strokeStyle = "#0055aa";
    for (let i = 0; i < numAxes; i++) {
        const angle = (2 * Math.PI / numAxes) * i;
        const radius = scaledData[i];
        const x = radius * Math.cos(angle);
        const y = radius * Math.sin(angle);

        if (i === 0) ctx.moveTo(x, y);
        else ctx.lineTo(x, y);
    }
    ctx.closePath();
    ctx.fill();
    ctx.stroke();

    // Hover detection for labels
    canvas.addEventListener("mousemove", (event) => {
        const { offsetX, offsetY } = event;
        const centerX = canvas.width / 2;
        const centerY = canvas.height / 2;

        // Convert to canvas coordinates
        const mouseX = offsetX - centerX;
        const mouseY = offsetY - centerY;

        // Check if mouse is over any label
        labelPositions.forEach((pos) => {
            if (
                mouseX >= pos.x &&
                mouseX <= pos.x + pos.width &&
                mouseY >= pos.y &&
                mouseY <= pos.y + pos.height
            ) {
                console.log(`Hovered on ${pos.label}`);
            }
        });
    });
</script>
</body>
</html>
