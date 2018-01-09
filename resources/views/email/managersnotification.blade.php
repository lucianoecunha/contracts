Olá {{ $manager->name }}, 

<br><br>

Informamos que o Contrato <b> nº {{ $contract->number}}</b> que tem como objeto: <b>{{ $contract->object }}</b> irá vencer no dia {{ date('d/m/y', strtotime($contract->validity)) }}.
<br>
Caso seja interesse da sua Secretaria realizar a renovação do mesmo, inicie o processo de renovação.

<br><br>

Obrigado pela Colaboração!

<br><br>

Att,
<br>
Departamento de Contratos e Convenios
<br>
Prefeitura Municipal de Lagoa Santa/MG