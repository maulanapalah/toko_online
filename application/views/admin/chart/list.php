<!DOCTYPE html>
<html>
<head>
    <?php 
        foreach ($data as $data) {
            $tanggal_bayar[] = $data->tanggal_bayar;
            $jumlah_bayar[]  = $data->jumlah_bayar;
        }
    ?>  
</head>
<body>
    <h1 class="text-center">Grafik Pendapatan</h1>
    <canvas id="canvas" width="1000" height="280"></canvas>

    <!--Load chart js-->
    <script type="text/javascript" src="<?php echo base_url().'assets/chartjs/chart.min.js'?>"></script>

    <script>

        var lineChartData = {
            labels : <?php echo json_encode($tanggal_bayar);?>,
            datasets : [
                
                {
                    fillColor: "rgba(60,141,188,0.9)",
                    strokeColor: "rgba(60,141,188,0.8)",
                    pointColor: "#3b8bba",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(152,235,239,1)",
                    data : <?php echo json_encode($jumlah_bayar);?>
                }

            ]
            
        }

        var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);
        
    </script>

    <!-- -->
</body>
</html>