<!DOCTYPE html>
<html>
<head>
    <title>Preview Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <form method="POST" action="{{ route('pdf.generateWithChart', [$project_id, $wellinfo_id]) }}">
        @csrf
        <canvas id="oocChart" width="400" height="300" style="display: none;"></canvas>
        <img id="oocChartImg" src="" style="width: 400px; border:1px solid #aaa;" />
        <input type="hidden" name="chartBase64" id="chartBase64">
        <br><br>
        <button type="submit">Generate PDF</button>
    </form>

    <script>
        const ctx = document.getElementById('oocChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Shakers', 'Dryer', 'C’fuge 1', 'C’fuge 2', 'C’fuge 3'],
                datasets: [{
                    label: '% Oil-on-Cuttings',
                    data: [
                        {{ $retorts->rt_sh_ooc ?? '0' }},
                        {{ $retorts->rt_cdu_ooc ?? '0' }},
                        {{ $retorts->rt_cf1_ooc ?? '0' }},
                        {{ $retorts->rt_cf2_ooc ?? '0' }},
                        {{ $retorts->rt_cf3_ooc ?? '0' }}
                    ],
                    backgroundColor: 'rgba(43, 117, 68, 1)'
                }]
            },
            options: {
                responsive: false,
                scales: {
                    y: { beginAtZero: true, max: 1, ticks: { stepSize: 0.1 } }
                }
            }
        });

        setTimeout(() => {
            const base64Image = document.getElementById('oocChart').toDataURL('image/png');
            document.getElementById('oocChartImg').src = base64Image;
            document.getElementById('chartBase64').value = base64Image;
        }, 1000);
    </script>
</body>
</html>
