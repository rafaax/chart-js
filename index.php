<?php 
include_once 'conexao.php';

$sql = "SELECT formato, hour(start_time) as hora from calendario.events ORDER BY id desc";
$query = mysqli_query($conexao, $sql);

$array1 = array();
$array2 = array();

while ($row = mysqli_fetch_assoc($query)) {
    
    if($row['hora'] >= 12){
        $array2[] = $row;
    }else{
        $array1[] = $row;
    }

}

$presencial = 0;
$remoto = 0;
$compromisso_pessoal = 0;

foreach($array1 as $c){
    if($c['formato'] == 'Presencial'){
        $presencial += 1;
    }else if($c['formato'] == 'Remoto'){
        $remoto += 1;
    }else if($c['formato'] == 'Compromisso Pessoal'){
        $compromisso_pessoal +=  1;
    }
}

$count = array(
    'presencial' => $presencial,
    'remoto'=> $remoto,
    'compromisso_pessoal'=> $compromisso_pessoal 
);

$presencial2 = 0;
$remoto2 = 0;
$compromisso_pessoal2 = 0;


foreach($array2 as $c){
    if($c['formato'] == 'Presencial'){
        $presencial2 += 1;
    }else if($c['formato'] == 'Remoto'){
        $remoto2 += 1;
    }else if($c['formato'] == 'Compromisso Pessoal'){
        $compromisso_pessoal2 +=  1;
    }
}

$count2 = array(
    'presencial' => $presencial2,
    'remoto'=> $remoto2,
    'compromisso_pessoal'=> $compromisso_pessoal2 
);

?>
<!DOCTYPE html>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div>
  <canvas id="myChart" style="width:900px; height: 300px;"></canvas>
</div>

<script>

  const ctx = document.getElementById('myChart');

    var data = [
        <?php echo $count['presencial'].','.$count['remoto'].','.$count['compromisso_pessoal']?>
    ];

    var data2 = [
        <?php echo $count2['presencial'].','.$count2['remoto'].','.$count2['compromisso_pessoal']?>
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
</script>
 