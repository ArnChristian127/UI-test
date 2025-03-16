function ui_pie() {
    const ctx = document.getElementById('pieChart');
    const data = {
        labels: [
            'Red',
            'Green',
            'Yellow',
            'Grey',
            'Blue'
        ],
        datasets: [{
            label: 'My First Dataset',
            data: [11, 16, 7, 3, 14],
            backgroundColor: [
              'rgb(255, 99, 132)',
              'rgb(75, 192, 192)',
              'rgb(255, 205, 86)',
              'rgb(201, 203, 207)',
              'rgb(54, 162, 235)'
            ]
        }]
    };
    new Chart(ctx, {
        type: 'pie',
        data: data,
        responsive: true,
        maintainAspectRatio: false
    });
}
function ui_pie2() {
    const ctx = document.getElementById('pieChart2');
    const data = {
        labels: [
            'Red',
            'Green',
            'Yellow',
            'Grey',
            'Blue'
        ],
        datasets: [{
            label: 'My First Dataset',
            data: [11, 16, 7, 3, 14],
            backgroundColor: [
              'rgb(255, 99, 132)',
              'rgb(75, 192, 192)',
              'rgb(255, 205, 86)',
              'rgb(201, 203, 207)',
              'rgb(54, 162, 235)'
            ]
        }]
    };
    new Chart(ctx, {
        type: 'pie',
        data: data,
        responsive: true,
        maintainAspectRatio: false
    });
}
function ui_bar() {
    const ctx = document.getElementById('barChart');
    const data =  {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            borderWidth: 1
        }]
    };
    const option = {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
    new Chart(ctx, {
        type: 'bar',
        data: data,
        options: option,
        responsive: true,
        maintainAspectRatio: false
    });
}
ui_bar();
ui_pie();
ui_pie2();