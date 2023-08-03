let url = 'fetch.php'
let presencial;

function geraGrafico(data, data2){
    const ctx = document.getElementById('myChart');

    data = [
        parseInt(data.presencial),  parseInt(data.remoto) , parseInt(data.compromisso_pessoal)
    ];
    data2 = [
        parseInt(data2.presencial),parseInt(data2.remoto), parseInt(data2.compromisso_pessoal)
    ];

    let delayed;
    
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Presencial', 'Remoto', 'Compromisso Pessoal'],
            datasets: [{
                label: 'Menor que meio dia',
                data: data,
                backgroundColor: [
                    'rgb(255, 255, 255)'
                ],
                    borderColor: [
                    'rgb(0, 0, 0)'
                ],
                borderWidth: 3
            },
            {
                label: 'Maior que meio dia',
                data: data2,
                backgroundColor: [
                    'rgb(202, 202, 202)'
                ],
                    borderColor: [
                    'rgb(0, 0, 0)'
                ],
                borderWidth: 3
            }
            ]
        },
        options: {
            animation: {
                onComplete: () => {
                    delayed = true;
                },
                delay: (context) => {
                    let delay = 0;
                    if (context.type === 'data' && context.mode === 'default' && !delayed) {
                    delay = context.dataIndex * 300 + context.datasetIndex * 100;
                    }
                    return delay;
                },
            },
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Reuniões Engeline'
                }
            }   
        }
    });
}

async function getPhp(){
     try { 
        fetch(url, 
        {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
            }
        })
        .then((response) => response.json())
        .then((response) => {
            // console.log(response);
            const data1 = response.count1;
            const data2 = response.count2;
            geraGrafico(data1, data2);

            return response;
        });
    }
    catch (error) {
        console.error("Erro na requisição:", error);
    }
   
}


getPhp();
