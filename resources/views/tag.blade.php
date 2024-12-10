<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Etiqueta do Produto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0.2cm;
            padding: 0;
        }

        .container {
            border: 0px solid black;
            padding: 0.2cm;
            width: 100%; /* Tornando a largura 100% para que se ajuste ao tamanho do papel */
            height: auto; /* Deixar a altura flexível */
            text-align: center;
            box-sizing: border-box;
        }

        .section {
            margin-bottom: 0.1cm;
            font-size: 4vw
        }

        .label {
            font-weight: bold;
            font-size: 4vw; /* Responsivo à largura da viewport */
        }

        .quantity-box {
            font-size: 4vw; /* Escala com base na largura da viewport */
            font-weight: bold;
            display: inline-block;
            padding: 0.1cm;
        }

        .barcode {
            font-size: 4vw; /* Escala com base na largura da viewport */
            text-align: center;
            margin-top: 0cm;
            font-family: 'Courier New', Courier, monospace;
        }

        .product-code {
            font-size: 4vw; /* Escala com base na largura da viewport */
        }

        .product-info {
            font-size: 2vw; /* Escala com base na largura da viewport */
        }

    </style>
</head>
<body onload="window.print();">

    <div class="container">
        <div class="section">
            <div class="row d-flex">
                <div class="col-5 text-start"> <span class="label">Cód. Produto</span> </div>
                <div class="col-7 text-end"> <span class="product-code">{{ $product->code }} {{ $product->company->fantasy_name }}</span> </div>
            </div>
           
            
        </div>

        <div class="section">
            <div class="row d-flex">
                <div class="col-6 text-start"><span class="label" style="">Tipo:</span> {{ $product->type }} </div>
                <div class="col-6 text-end"><span class="label" style="">Unidade de Medida:</span> {{ $product->unity_measure }}</div>
            </div>
            
            
        </div>

        <div class="section">
            <div class="row d-flex">
                <div class="col-6 text-start">
                    <span class="label">Dimensão:</span> {{ $product->dimension }} {{ $product->holes }} 
                </div>
            </div>
            
        </div>

        <div class="section">
            <span class="label">Quantidade:</span> 
            <span class="quantity-box">{{ $quantity }}</span> unidades
        </div>

        <div class="barcode">
            <img src="data:image/png;base64,{{ $barcode }}" width="60%" alt="Código de Barras">
        </div>
    </div>

</body>
</html>
