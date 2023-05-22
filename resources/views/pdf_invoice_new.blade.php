<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="author" content="https://logixbit.com">
    <title>Gondal Travel Invoice</title>
    <style>
      /* @font-face {
  font-family: SourceSansPro;
  src: url('../../SourceSansPro-Regular.ttf');
} */

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #000;
  text-decoration: none;
}

body {
  position: relative;
  width:8.15in;
  height:11.5in; 
  margin: 0 auto; 
  color: #000;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 14px; 
  font-family: SourceSansPro;
}

header {
  padding: 10px 0;
  margin-bottom: 20px;
  border-bottom: 1px solid #AAAAAA;
  width:99%;
}
main, footer{
  width:99%;
}

#logo {
  float: left;
  margin-top: 8px;
}

#logo img {
  height: 90px;
}

#company {
  float: right;
  text-align: right;
  width:50%;
  margin-bottom: 15px;
}
.to , .address{
  font-size:1.2em;
}

#details {
  margin-bottom: 10px;
}

#client {
  padding-left: 6px;
  /* border-left: 6px solid #000; */
  float: left;
}

#client .to {
  color: #000;
}

h2.name {
  font-size: 1.4em;
  font-weight: normal;
  margin: 0;
  text-transform: uppercase;
}
h3.name {
  font-size: 1.4em;
  font-weight: normal;
  margin: 0;
}

#invoice {
  float: right;
  text-align: left;
  width:65%;
  padding-top:25px;
}

#invoice h1 {
  color: #000;
  font-size: 2.0em;
  line-height: 1em;
  font-weight: normal;
  /* margin: 0  0 10px 0; */
}

#invoice .date {
  font-size: 1.1em;
  color: #000;
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table th,
table td {
  padding: 20px;
  background: #EEEEEE;
  text-align: center;
  border-bottom: 1px solid #FFFFFF;
}

table th {
  white-space: nowrap;        
  font-weight: normal;
}

table td {
  text-align: right;
}

table td h3{
  /* color: #57B223; */
  font-size: 1.2em;
  font-weight: normal;
  margin: 0 0 0.2em 0;
}

table .no {
  /* color: #FFFFFF; */
  font-size: 1.6em;
  background: #57B223;
}

table .desc {
  text-align: left;
}
table th.desc, th.total, th.unit{
  text-transform: uppercase;
}

table .desc p{
  text-align: left;
  font-size:18px;
  margin:0;
  padding:0;
}

table .unit {
  /* background: #DDDDDD; */
  text-align: left;
  width: 30%;
}

table .qty {
}

table .total {
  text-align:right;
  /* background: #57B223;
  color: #FFFFFF; */
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table tbody tr:last-child td {
  border: none;
}

table tfoot td {
  padding: 10px 20px;
  background: #FFFFFF;
  border-bottom: none;
  font-size: 1.2em;
  white-space: nowrap; 
  border-top: 1px solid #efef; 
}

table tfoot tr:first-child td {
  border-top: none; 
}

table tfoot tr:last-child td {
  color: #000;
  font-size: 1.4em;
  border-top: 1px solid #000; 

}

table tfoot tr td:first-child {
  border: none;
}
#invoice-date{
  width:100%;
  font-size: 1.3em;
  margin-bottom: 50px;
  text-align:right;
}
#thanks{
  font-size: 1.2em;
  margin-bottom: 50px;
  text-align:center;
}

#notices{
  padding-left: 6px;
  /* border-left: 6px solid #000;   */
}

#notices .notice {
  font-size: 1em;
}

footer {
  color: #000;
  width: 99%;
  height: 30px;
  position: absolute;
  bottom: 0;
  padding: 5px 0 25px 0;
  text-align: center;
}
footer>.aboverow{
  border-bottom: 1px solid #AAAAAA;
}
footer>.aboverow span{
  font-size:1.2em;
  width: 32.5%;
  display: inline-block;
}
footer>.aboverow span:first-child{
  text-align:left;
}
footer>.aboverow span:last-child{
  text-align:right;
}
footer>.row span{
  font-size:1.0em;
  padding:10px;
}
@page{size:A4;margin:.5em;}
@media print{
  html,body{width:8.20in;height:11.5in}
  main{margin:0;border:initial;border-radius:initial;width:initial;min-height:initial;box-shadow:initial;background:initial;page-break-after:always}
  /* .row{margin:0;padding:0;flex-wrap:unset}.container{padding:0} */
}
    </style>
  </head>
<?php
$coll_cash = App\Models\CashCollector::where('prn_no',$ticket->prn_no)->first();

$invoice_year = date('y',strtotime($coll_cash->created_at));
$invoice_month = date('m',strtotime($coll_cash->created_at));
$invoice_date = date('d',strtotime($coll_cash->created_at));
$invoice_date_formate = date('Y/m/d - H:i',strtotime($coll_cash->created_at));
$invoice_id = $invoice_year.$invoice_month.$invoice_date.$coll_cash->id;

$count_to = count($data['to']) - 1;
//echo '<pre>';print_r($passengers);exit;
$pass_count = sizeof($passengers);
$departure_date = date('Y-m-d',strtotime($data['fromDate'][0]));


?>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="https://gondaltravel.com/images/logo.png">
      </div>
      <div id="invoice">
        <h1 class="name">FACTURE/INVOICE</h1>
        <!-- <h2 class="name">{{$invoice_id}}</h3>
        <div class="date">Date: {{$invoice_date_formate}}</div> -->
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">FACTURER À:</div>
          <h2 class="name">{{$passengers[0]->name}} {{$passengers[0]->surname}}</h2>
          <div class="address">{{$passengers[0]->contact_no}}</div>
          <div class="email"><a href="mailto:{{$passengers[0]->email}}">{{$passengers[0]->email}}</a></div>
        </div>
        <div id="company">
          <h2 class="name">FACTURE: {{$invoice_id}}</h2>
          <!-- <h2 class="name">{{$ticket->prn_no}}</h2> -->
          <div class="to"><br/>Réservé par:</div>
          <h2 class="name">{{$username->name}}</h2>
          <div class="address">Telephone: {{$username->phone}}</div>
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="unit">Organisme</th>
            <th class="desc">Services</th>
            <th class="total">Montant</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="unit"><h3>{{$data['name'][0]}}</h3></td>
            <td class="desc">
              <h3>{{$data['type']}} - {{$data['class']}}</h3>
              <p>[{{$data['from'][0]}}] to [{{$data['to'][$count_to]}}]</p>
              <p>Departure Date: {{$departure_date}}</p>
              <p>Passanger - {{$pass_count}}</p>
              <p>PNR - {{$ticket->prn_no}}</p>
            </td>
            <td class="total">&euro; {{number_format($invoice->collected_cash,2)}}</td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2">Total des prestations</td>
            <td>&euro; {{number_format($invoice->collected_cash,2)}}</td>
          </tr>
          <tr>
            <td colspan="2">Taux %</td>
            <td>&euro; 00.00</td>
          </tr>
          <tr>
            <td colspan="2">Mnt HT</td>
            <td>&euro; {{number_format($invoice->collected_cash,2)}}</td>
          </tr>
          <tr>
            <td colspan="2">Mnt TVA</td>
            <td>&euro; 00.00</td>
          </tr>
          <tr>
            <td colspan="2">Mnt TTC</td>
            <td>&euro; {{number_format($invoice->collected_cash,2)}}</td>
          </tr>
          <tr>
            <td colspan="2">Total de la facture</td>
            <td>&euro; {{number_format($invoice->collected_cash,2)}}</td>
          </tr>
        </tfoot>
      </table>
      <div id="invoice-date">Solde a regler pour le : {{$invoice_date_formate}}</div>
      <div id="thanks">Merci d'avoir choisi GondalTravel.com !</div>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice"> L'achat de voyages, séjours ou autres prestations, entraîne l'adhésion du client aux conditions générales de vente et l'acceptation sans réserve del'intégralité de leurs dispositions, affichées dans les locaux.Toute annulation/remboursement de réservation sera traité au cas par cas en fonction des conditions générales de la compagnie aérienneet de l'agence.</div>
      </div>
    </main>
    <footer>
      <div class="aboverow">
        <span>hello@gondaltravel.com</span>
        <span>www.gondaltravel.com</span>
        <span>0033950379906</span>
      </div>
      <div class="row">
        <span>SASU GUR ELEC-Siret: 90305898000017</span>
        <span>Code Naf:4778C</span>
        <span>TVA Intracommunautair: FR 29 903058980</span>
      </div>
      <div class="row">
        <span>Adress 89 AV DU GROUPE MANOUCHIAN 94400 VITRY-SUR-SEINE</span>
      </div>
    </footer>
  </body>
</html>