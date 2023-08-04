<!DOCTYPE html>
<style>
    .button {
        width: 500px;
        height: 50px;
        border: none;
        outline: none;
        color: #fff;
        background: black;
        cursor: pointer;
        position: relative;
        border-radius: 10px;
        font-size: large;
        text-transform: uppercase;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }
    
    canvas{
        height:600px !important;
    }

    .container {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
    }

</style>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="container">
    <button id="grafico_barra" class="button" type="button">Gráfico de Barra</button>
    <button id="grafico_linha" class="button" type="button">Gráfico de Linha</button>
</div>
<div class="container">
    <div id="chart" style="display:none">
        <canvas id="myChart"></canvas>
    </div>
</div>
<div class="container">
    <div id="chart-line" style="display:none">
        <canvas id="myChart2"></canvas>
    </div>
</div>
<script src="index.js"></script>