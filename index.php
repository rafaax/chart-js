<!DOCTYPE html>
<style>
.button {
        width: 220px;
        height: 50px;
        border: none;
        outline: none;
        color: #fff;
        background: #111;
        cursor: pointer;
        position: relative;
        border-radius: 10px;
    }
    canvas{
        width:1000px !important;
        height:600px !important;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<button id="grafico_barra" class="button" type="button">Gráfico de Barra</button>
<div id="chart" style="display:none">
  <canvas id="myChart"></canvas>
</div>
<script src="index.js"></script>