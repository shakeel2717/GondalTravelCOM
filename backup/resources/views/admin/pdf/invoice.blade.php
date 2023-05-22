@php use App\Models\Airport; @endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GT{{ $ticket->id*2 }}{{ $ticket->id }} {{ $passenger->name }} {{ $passenger->surname }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        ul {
            list-style-type: none;
        }

        p {
            margin-bottom: 0;
        }

        .notice-text {
            font-size: 10px;
        }

        ul {
            padding: 0;
            margin: 0;
        }
    </style>
</head>


<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <img src="/images/logo.png" alt="Logo">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td>
                                <h3>Gondal Travel</h3>
                                <p>89 Avenue du Groupe Manouchian</p>
                                <p>94400 Vitry - sur- Seine</p>
                                <p>Telephone: +33 187653786</p>
                                <p>Email: hello@gondaltravel.com</p>
                            </td>
                            <td>
                                <h3>Adresse de facturation</h3>
                                <p>{{ $passenger->name }} {{ $passenger->surname }}</p>
                                <p>Email: {{ $passenger->email }}</p>
                                <p>Telephone: {{ $passenger->contact_no }}</p>
                                <p>Country: {{ $passenger->country }}</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered mb-0">
                    <tbody>
                        <tr>
                            <th colspan="2" class="text-center">
                                References
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <ul>
                                    <li>
                                       <b> FACTURE : </b> GT{{ $ticket->id*2 }}{{ $ticket->id }}
                                    </li>
                                    <li>
                                        <b>Commande : </b> GT{{ $ticket->id*4 }}{{ $ticket->id }}G
                                    </li>
                                    <li>
                                        <b>Vendeur Conseil : </b> {{ $ticket->user->name }}
                                    </li>
                                    <li>
                                        <b>Code Interne : </b> {{ $ticket->payment_method }}
                                    </li>
                                </ul>
                            </td>
                            <td>
                                <ul>
                                    <li>
                                       <b> Date de depart : </b> {{ $ticket->departure_date }}
                                    </li>
                                    <li>
                                       <b> Date de Retour : </b> {{ $ticket->return_date }}
                                    </li>
                                    <li>
                                        @php
                                        $data = json_decode($ticket->details,true);
                                        @endphp
                                        
                                        @if(isset($data['flight']))
                                        <b> Pays : </b> {{ Airport::where('iata', end($data['flight'][count($data['flight'])-1]['to']))->first()->country }}
                                        @else
                                        <b> Pays : </b> {{ Airport::where('iata', end($data['to']))->first()->country }}
                                        @endif
                                    </li>
                                    <li>
                                       <b> Devise : </b> EUR
                                    </li>
                                    <li>
                                       <b> PNR : </b> {{ $ticket->prn_no }}
                                    </li>
                                </ul>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered mb-0">
                    <tbody>
                        <tr>
                            <th>Organisme</th>
                            <th>Services</th>
                            <th>Montant</th>
                        </tr>
                        <tr>
                            <td style="width:20%;">
                                <ul>
                                    <li>{{ $ticket->company }}</li>
                                </ul>
                            </td>
                            <td>
                                <ul>
                                    <li>Passager: {{ $passenger->name }} {{ $passenger->surname }}</li>
                                    <li>billet - {{ $ticket->ticket_num }}</li>
                                    <li>{{ $ticket->destination }}</li>
                                    <li>TICKET {{ $ticket->ticket_num }}</li>
                                    <li>Taxes(*) aeriennes et surcharge carburant : 0000 EUR</li>
                                </ul>
                            </td>
                            <td>
                                {{ number_format($ticket->total_amount,2) }} €
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2" class="text-end p-1">total des prestations:</th>
                            <td class="p-1">{{ number_format($ticket->total_amount,2) }} €</td>
                        </tr>
                        <tr>
                            <th colspan="2" class="text-end p-1">Total de la facture : </th>
                            <td class="p-1">{{ number_format($ticket->total_amount,2) }} €</td>
                        </tr>
                        <tr>
                            <th colspan="2" class="text-end p-1">Solde a payer: </th>
                            <td class="p-1">{{ number_format($ticket->total_amount,2) }} €</td>
                        </tr>
                        <tr>
                            <th colspan="2" class="text-end p-1">Le montant restant: </th>
                            <td class="p-1">{{ number_format(0,2) }} €</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p>Solde a regler pour le = {{ $ticket->created_at->format('d-M-Y') }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th colspan="4" class="text-center">
                                Recapitulatif TVA
                            </th>
                        </tr>
                        <tr>
                            <th>Taux</th>
                            <th>Mnt HT</th>
                            <th>Mnt TVA</th>
                            <th>Mnt TTC</th>
                        </tr>
                        <tr>
                            <td>0.00%</td>
                            <td>{{ number_format($ticket->total_amount,2) }} €</td>
                            <td>0.00</td>
                            <td>{{ number_format($ticket->total_amount,2) }} €</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p class="text-start notice-text">(*) en cas d'annulation du transport, une partie des taxes est
                    eligible au remboursement</p>
                <p class="text-start notice-text">(*)Les conditions de changement de date, annulation ou toute autre
                    demande entrainera des frais supplémentaire. </p>
                <h5 class="mb-0">Merci d'avoir choisi GondalTravel.com</h5>
                <p class="notice-text">SASU GUR ELEC-Siret : 90305898000017 - Email : hello@gondaltravel.com</p>
                <p class="notice-text"><a href="#">www.gondaltravel.com</a></p>
                <p class="notice-text">Code Naf : 4778C - TVA Intracommunautair : FR 29 903058980* Adress 89 AV DU
                    GROUPE MANOUCHIAN 94400 VITRY-SUR-SEINE</p>
            </div>
        </div>
    </div>
</body>

</html>