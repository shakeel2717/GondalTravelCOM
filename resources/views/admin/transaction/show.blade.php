<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finance Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @livewireStyles
    @powerGridStyles
</head>

<body>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <div class="dashboard-main-content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-8 mx-auto mb-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="my-2">
                                                <h2 class="card-title my-4">Finance Management</h2>
                                                <a href="/dashboard/admin" class="btn btn-primary btn-sm">Admin Dashboard</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 mx-auto mb-4">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="my-2">
                                                        <h4 class="card-title my-4">Total Credit</h4>
                                                        <h2 class="card-title my-4">{{ number_format($collector->transactions->where('sum', true)->sum('amount'),2) }}</h2>
    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="my-2">
                                                        <h4 class="card-title my-4">Total Debit</h4>
                                                        <h2 class="card-title my-4">{{ number_format($collector->transactions->where('sum', false)->sum('amount'),2) }}</h2>
    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="my-2">
                                                        <h4 class="card-title my-4">Current Due</h4>
                                                        <h2 class="card-title my-4">{{ number_format($collector->transactions->where('sum', false)->sum('amount') - $collector->transactions->where('sum', true)->sum('amount'),2) }}</h2>
    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 mx-auto">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="my-2">
                                                <h2 class="card-title my-4">{{ $collector->name }} Finance Record</h2>
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Type</th>
                                                            <th scope="col">Description</th>
                                                            <th scope="col">SUM</th>
                                                            <th scope="col">Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($collector->transactions as $transaction)
                                                        <tr>
                                                            <th scope="row">{{ $loop->iteration }}</th>
                                                            <td>{{ $transaction->type }}</td>
                                                            <td>{{ $transaction->description }}</td>
                                                            <td>{{ $transaction->sum ? "Credit" : "Debit" }}</td>
                                                            <td>{{ number_format($transaction->amount,2) }}</td>
                                                        </tr>
                                                        @empty
                                                        <tr>
                                                            <td colspan="5">No Record Found</td>
                                                        </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    @livewireScripts
    @powerGridScripts
</body>

</html>